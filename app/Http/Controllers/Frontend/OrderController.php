<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Transaction as MidtransTransaction;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('frontend.orders.index', compact('orders'));
    }

    public function create()
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('products.index')->with('error', 'Keranjang Anda kosong');
        }

        return view('frontend.orders.create', compact('cart'));
    }

    public function store(Request $request)
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('products.index')->with('error', 'Keranjang Anda kosong');
        }

        $request->validate([
            'customer_name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'address' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        DB::beginTransaction();

        try {
            // ===========================
            // 1. Buat atau ambil customer
            // ===========================
            $customer = Customer::firstOrCreate(
                ['email' => $request->email],
                [
                    'name' => $request->customer_name,
                    'address' => $request->address,
                    'phone' => $request->phone ?? '-',
                    'customer_type' => 'personal',
                ]
            );

            // ===========================
            // 2. Hitung total harga
            // ===========================
            $total = 0;
            foreach ($cart as $item) {
                $total += ($item['price'] ?? 0) * ($item['quantity'] ?? 0);
            }

            // ===========================
            // 3. Buat nomor pesanan unik
            // ===========================
            $orderNumber = 'ORD-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6));

            // ===========================
            // 4. Simpan data pesanan
            // ===========================
            $order = Order::create([
                'order_number' => $orderNumber,
                'customer_id' => $customer->customer_id, // ✅ fix utama
                'customer_name' => $request->customer_name,
                'email' => $request->email,
                'address' => $request->address,
                'total_price' => $total,
                'paid_amount' => 0,
                'remaining_amount' => $total,
                'status_id' => 1, // misalnya: 1 = Pending
                'order_date' => now(),
            ]);

            // ===========================
            // 5. Simpan item pesanan
            // ===========================
            foreach ($cart as $productId => $item) {
                OrderItem::create([
                    'order_id' => $order->order_id,
                    'product_id' => $productId,
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['price'],
                    'subtotal' => $item['price'] * $item['quantity'],
                ]);
            }

            // ===========================
            // 6. Hapus keranjang
            // ===========================
            Session::forget('cart');

            DB::commit();

            return redirect()->route('orders.show', $order->order_id)
                ->with('success', 'Pesanan berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $order = Order::with(['orderItems.product', 'status'])->findOrFail($id);
        
        if ($order->snap_token && $order->remaining_amount > 0) {
            $this->checkMidtransPaymentStatus($order);
            $order->refresh();
        }
        
        return view('frontend.orders.show', compact('order'));
    }

    private function checkMidtransPaymentStatus($order)
    {
        try {
            Config::$serverKey = config('midtrans.server_key');
            Config::$isProduction = config('midtrans.is_production');

            Log::info('Checking payment status for order', ['order_number' => $order->order_number]);

            $status = MidtransTransaction::status($order->order_number);

            Log::info('Midtrans status response', [
                'order_number' => $order->order_number,
                'transaction_status' => $status->transaction_status,
                'payment_type' => $status->payment_type ?? null,
            ]);

            if (in_array($status->transaction_status, ['capture', 'settlement'])) {
                $existingPayment = Payment::where('order_id', $order->order_id)
                    ->where('payment_status', 'completed')
                    ->first();

                if (!$existingPayment) {
                    $order->update([
                        'status_id' => 2,
                        'paid_amount' => $order->total_price,
                        'remaining_amount' => 0,
                        'transaction_id' => $status->transaction_id ?? null,
                        'notes' => 'Pembayaran berhasil via Midtrans - ' . ($status->payment_type ?? 'unknown'),
                    ]);

                    $methodMap = [
                        'credit_card' => 'credit_card',
                        'bank_transfer' => 'transfer',
                        'echannel' => 'transfer',
                        'gopay' => 'e-wallet',
                        'shopeepay' => 'e-wallet',
                        'qris' => 'e-wallet',
                    ];
                    $mappedMethod = $methodMap[$status->payment_type] ?? 'other';

                    Payment::create([
                        'payment_number' => 'PAY-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6)),
                        'order_id' => $order->order_id,
                        'payment_type_id' => 1,
                        'amount' => $order->total_price,
                        'payment_method' => $mappedMethod,
                        'payment_status' => 'completed',
                        'payment_date' => now(),
                        'transaction_reference' => $status->transaction_id ?? null,
                        'notes' => 'Payment via Midtrans (' . ($status->payment_type ?? 'unknown') . ')',
                        'verified_by' => null,
                        'verification_date' => now(),
                    ]);

                    Log::info('Payment and inventory updated from finish callback', [
                        'order_id' => $order->order_id,
                    ]);
                }
            }
        } catch (\Exception $e) {
            Log::error('Failed to check Midtrans payment status', [
                'order_id' => $order->order_id,
                'error' => $e->getMessage(),
            ]);
        }
    }

    public function checkPayment($id)
    {
        $order = Order::findOrFail($id);
        
        if ($order->snap_token) {
            $this->checkMidtransPaymentStatus($order);
            $order->refresh();
            
            if ($order->remaining_amount <= 0) {
                return redirect()->route('orders.show', $order->order_id)
                    ->with('success', 'Pembayaran berhasil dikonfirmasi!');
            } else {
                return redirect()->route('orders.show', $order->order_id)
                    ->with('info', 'Pembayaran belum terdeteksi atau masih dalam proses.');
            }
        }
        
        return redirect()->route('orders.show', $order->order_id)
            ->with('error', 'Order ini tidak memiliki transaksi Midtrans.');
    }

    public function uploadDesign(Request $request, $id)
    {
        $request->validate([
            'design_file' => 'required|file|mimes:jpg,jpeg,png,pdf,ai,psd|max:5120',
        ]);

        $order = Order::findOrFail($id);
        $file = $request->file('design_file');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('order_designs', $fileName, 'public');

        $order->update(['design_file' => $filePath]);

        return redirect()->route('orders.show', $order->order_id)
            ->with('success', 'Desain berhasil diupload.');
    }
}
