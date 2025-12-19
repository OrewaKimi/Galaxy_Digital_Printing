<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'product_id' => 'required|exists:products,product_id',
                'price' => 'required|numeric|min:0',
                'quantity' => 'nullable|integer|min:1',
                'width' => 'nullable|numeric|min:0',
                'height' => 'nullable|numeric|min:0',
            ]);

            DB::beginTransaction();

            // Ambil product
            $product = Product::findOrFail($request->product_id);
            
            // Buat order_number unik
            $orderNumber = 'ORDER-' . time() . '-' . rand(1000, 9999);

            // Get atau buat customer untuk user yang login
            $customerId = null;
            $customerName = 'Guest';
            $email = 'guest@example.com';
            $address = null;

            if (Auth::check()) {
                $user = Auth::user();
                $customerName = $user->full_name ?? $user->name ?? 'Customer';
                $email = $user->email;
                
                // Coba ambil customer yang sudah ada
                $customer = Customer::where('user_id', $user->user_id)->first();
                
                if (!$customer) {
                    // Buat customer baru
                    $customer = Customer::create([
                        'user_id' => $user->user_id,
                        'name' => $customerName,
                        'email' => $email,
                        'phone' => $user->phone ?? null,
                        'customer_type' => 'personal',
                    ]);
                }
                
                $customerId = $customer->customer_id;
                $address = $customer->address;
            }

            // Hitung nilai order
            $quantity = $request->quantity ?? 1;
            $width = $request->width ?? 0;
            $height = $request->height ?? 0;
            $area = ($width && $height) ? ($width * $height) / 10000 : 1;
            
            $unitPrice = $request->price;
            $subtotal = $unitPrice * $quantity;

            // Buat Order
            $order = Order::create([
                'order_number' => $orderNumber,
                'customer_id' => $customerId,
                'customer_name' => $customerName,
                'email' => $email,
                'address' => $address,
                'status_id' => 1, // Default status (Pending/New Order)
                'order_date' => now(),
                'subtotal' => $subtotal,
                'discount_amount' => 0,
                'discount_percentage' => 0,
                'tax_amount' => 0,
                'tax_percentage' => 0,
                'total_price' => $subtotal,
                'paid_amount' => 0,
                'remaining_amount' => $subtotal,
                'notes' => 'Order from website - Pending payment',
                'customer_notes' => $request->notes ?? null,
                'created_by' => Auth::id(),
            ]);

            // Buat OrderItem
            $orderItem = OrderItem::create([
                'order_id' => $order->order_id,
                'product_id' => $product->product_id,
                'material_id' => null, // Bisa diisi nanti oleh admin/production
                'width' => $width,
                'height' => $height,
                'area' => $area,
                'quantity' => $quantity,
                'unit' => $product->unit ?? 'pcs',
                'unit_price' => $unitPrice,
                'material_cost' => 0,
                'production_cost' => 0,
                'subtotal' => $subtotal,
                'specifications' => $request->specifications ?? null,
                'notes' => $request->item_notes ?? null,
            ]);

            // Buat transaksi untuk backward compatibility
            $transaction = Transaction::create([
                'user_id' => Auth::id() ?? null,
                'product_id' => $request->product_id,
                'price' => $request->price,
                'status' => 'pending',
                'order_id' => $orderNumber,
            ]);

            Log::info('Order Created', [
                'order_id' => $order->order_id,
                'order_number' => $orderNumber,
                'transaction_id' => $transaction->id
            ]);

            // Konfigurasi Midtrans
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = config('midtrans.is_production', false);
            \Midtrans\Config::$isSanitized = config('midtrans.is_sanitized', true);
            \Midtrans\Config::$is3ds = config('midtrans.is_3ds', true);
            
            // Set CURL options untuk bypass SSL (hanya untuk development)
            if (!config('midtrans.is_production')) {
                \Midtrans\Config::$curlOptions = array(
                    CURLOPT_SSL_VERIFYHOST => 0,
                    CURLOPT_SSL_VERIFYPEER => 0,
                    CURLOPT_HTTPHEADER => array(),
                );
            }
            
            Log::info('Midtrans Config Set');

            // Parameter untuk Midtrans
            $params = array(
                'transaction_details' => array(
                    'order_id' => $orderNumber,
                    'gross_amount' => (int) $subtotal,
                ),
                'customer_details' => array(
                    'first_name' => $customerName,
                    'email' => $email,
                ),
                'item_details' => array(
                    array(
                        'id' => $product->product_id,
                        'price' => (int) $unitPrice,
                        'quantity' => $quantity,
                        'name' => $product->product_name,
                    )
                ),
                'callbacks' => array(
                    'finish' => url('/checkout/' . $orderNumber),
                ),
            );
            
            // Add notification URL if APP_URL is set
            $appUrl = config('app.url');
            if ($appUrl && $appUrl !== 'http://localhost') {
                $params['callbacks']['notification'] = $appUrl . '/payment/midtrans/callback';
                Log::info('Notification URL set', ['url' => $params['callbacks']['notification']]);
            } else {
                Log::warning('APP_URL not configured or is localhost. Midtrans callbacks may not work.');
            }

            Log::info('Midtrans Params Prepared', $params);

            // Dapatkan Snap Token dari Midtrans
            try {
                $snapToken = \Midtrans\Snap::getSnapToken($params);
                Log::info('Snap Token Generated', ['token' => $snapToken]);
            } catch (\Exception $snapError) {
                DB::rollBack();
                Log::error('Midtrans Snap Error', [
                    'message' => $snapError->getMessage(),
                    'code' => $snapError->getCode()
                ]);
                throw new \Exception('Gagal mendapatkan token pembayaran: ' . $snapError->getMessage());
            }

            // Simpan snap token ke database (di Order dan Transaction)
            $order->snap_token = $snapToken;
            $order->save();
            
            $transaction->snap_token = $snapToken;
            $transaction->save();

            DB::commit();

            Log::info('Order and Transaction Updated with Snap Token');

            return redirect()->route('checkout', $transaction->id);

        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            Log::error('Validation Error', ['errors' => $e->errors()]);
            return back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Data tidak valid. Silakan coba lagi.');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Checkout Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function checkout(Transaction $transaction)
    {
        try {
            // Cek apakah snap token sudah ada
            if (!$transaction->snap_token) {
                return redirect()->route('home')
                    ->with('error', 'Token pembayaran tidak valid');
            }

            // Ambil data produk
            $product = Product::findOrFail($transaction->product_id);

            return view('layouts.checkout', compact('transaction', 'product'));

        } catch (\Exception $e) {
            Log::error('Checkout Page Error', [
                'message' => $e->getMessage()
            ]);

            return redirect()->route('home')
                ->with('error', 'Terjadi kesalahan saat membuka halaman pembayaran');
        }
    }
}