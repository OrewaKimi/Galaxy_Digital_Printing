<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;

class PaymentController extends Controller
{
    /**
     * Inisialisasi konfigurasi Midtrans
     */
    private function initMidtrans()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    /**
     * Tampilkan halaman pembayaran manual
     */
    public function show($orderId)
    {
        $order = Order::with('orderItems.product')->findOrFail($orderId);
        return view('frontend.payments.show', compact('order'));
    }

    /**
     * Proses upload bukti pembayaran manual
     */
    public function store(Request $request, $orderId)
    {
        $request->validate([
            'payment_method' => 'required|string',
            'amount' => 'required|numeric|min:1000',
            'bank_name' => 'nullable|string|max:100',
            'account_name' => 'nullable|string|max:100',
            'payment_proof' => 'required|file|mimes:jpg,jpeg,png,pdf|max:5120',
        ]);

        $order = Order::findOrFail($orderId);

        // Upload file bukti
        $file = $request->file('payment_proof');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $filePath = $file->storeAs('payment_proofs', $fileName, 'public');

        // Buat payment record dengan payment_type_id default
        $defaultPaymentTypeId = 1; // Sesuaikan dengan data di tabel payment_types
        
        Payment::create([
            'payment_number' => 'PAY-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6)),
            'order_id' => $order->order_id,
            'payment_type_id' => $defaultPaymentTypeId,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'payment_status' => 'pending',
            'payment_date' => now(),
            'bank_name' => $request->bank_name,
            'account_name' => $request->account_name,
            'payment_proof' => $filePath,
            'notes' => 'Pembayaran manual - menunggu verifikasi admin',
        ]);

        return redirect()->route('orders.show', $order->order_id)
            ->with('success', 'Bukti pembayaran berhasil diupload. Menunggu verifikasi admin.');
    }

    /**
     * Proses pembayaran dengan Midtrans
     */
    public function payWithMidtrans($orderId)
    {
        try {
            $order = Order::with(['orderItems.product', 'customer'])->findOrFail($orderId);
            
            // Pastikan order belum lunas
            if ($order->remaining_amount <= 0) {
                return redirect()->route('orders.show', $order->order_id)
                    ->with('error', 'Pesanan ini sudah lunas.');
            }

            $this->initMidtrans();

            // Prepare item details
            $itemDetails = [];
            foreach ($order->orderItems as $item) {
                $itemDetails[] = [
                    'id' => $item->product_id,
                    'price' => (int) $item->unit_price,
                    'quantity' => (int) $item->quantity,
                    'name' => substr($item->product->product_name, 0, 50),
                ];
            }

            // Prepare transaction params
            $params = [
                'transaction_details' => [
                    'order_id' => $order->order_number,
                    'gross_amount' => (int) $order->total_price,
                ],
                'customer_details' => [
                    'first_name' => $order->customer_name ?? 'Customer',
                    'email' => $order->email ?? 'customer@example.com',
                    'phone' => $order->customer->phone ?? '08123456789',
                    'billing_address' => [
                        'address' => $order->address ?? 'Alamat tidak tersedia',
                    ],
                ],
                'item_details' => $itemDetails,
                'enabled_payments' => [
                    'credit_card', 'bca_va', 'bni_va', 'bri_va', 
                    'permata_va', 'other_va', 'gopay', 'shopeepay'
                ],
            ];

            // Get snap token
            $snapToken = Snap::getSnapToken($params);

            // Save snap token ke database
            $order->update(['snap_token' => $snapToken]);

            return view('frontend.payments.midtrans', compact('order', 'snapToken'));

        } catch (\Exception $e) {
            return redirect()->route('orders.show', $orderId)
                ->with('error', 'Terjadi kesalahan saat membuat pembayaran: ' . $e->getMessage());
        }
    }

    /**
     * Handle callback dari Midtrans (Webhook)
     */
    public function handleCallback(Request $request)
    {
        try {
            $this->initMidtrans();
            $notif = new Notification();

            $orderId = $notif->order_id;
            $transactionStatus = $notif->transaction_status;
            $fraudStatus = $notif->fraud_status ?? null;
            $paymentType = $notif->payment_type;
            $transactionId = $notif->transaction_id;

            $order = Order::where('order_number', $orderId)->first();

            if (!$order) {
                return response()->json(['message' => 'Order not found'], 404);
            }

            // Update transaction ID
            $order->update(['transaction_id' => $transactionId]);

            // Tentukan payment_type_id berdasarkan payment_type
            $defaultPaymentTypeId = 1;

            // Handle transaction status
            if ($transactionStatus == 'capture') {
                if ($fraudStatus == 'accept') {
                    $this->updateOrderPaymentSuccess($order, $paymentType, $defaultPaymentTypeId);
                }
            } elseif ($transactionStatus == 'settlement') {
                $this->updateOrderPaymentSuccess($order, $paymentType, $defaultPaymentTypeId);
            } elseif ($transactionStatus == 'pending') {
                $order->update([
                    'notes' => 'Menunggu pembayaran Midtrans - ' . $paymentType
                ]);
            } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
                $order->update([
                    'notes' => 'Pembayaran gagal/dibatalkan - ' . $transactionStatus
                ]);
            }

            return response()->json(['message' => 'Notification processed successfully']);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error processing notification',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update order ketika pembayaran sukses
     */
    private function updateOrderPaymentSuccess($order, $paymentType, $paymentTypeId)
    {
        // Update order
        $order->update([
            'paid_amount' => $order->total_price,
            'remaining_amount' => 0,
            'status_id' => 2, // Pastikan status_id 2 = "Paid" di tabel order_statuses
        ]);

        // Create payment record
        Payment::create([
            'payment_number' => 'PAY-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6)),
            'order_id' => $order->order_id,
            'payment_type_id' => $paymentTypeId,
            'amount' => $order->total_price,
            'payment_method' => $paymentType,
            'payment_status' => 'completed',
            'payment_date' => now(),
            'transaction_reference' => $order->transaction_id,
            'notes' => 'Payment via Midtrans (' . $paymentType . ')',
            'verified_by' => null, // Auto-verified by Midtrans
            'verification_date' => now(),
        ]);
    }
}