<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'product_id' => 'required|exists:products,product_id',
                'price' => 'required|numeric|min:0',
            ]);

            // Ambil product
            $product = Product::findOrFail($request->product_id);
            
            // Buat order_id unik
            $orderId = 'ORDER-' . time() . '-' . rand(1000, 9999);

            // Buat transaksi
            $transaction = Transaction::create([
                'user_id' => Auth::id() ?? null,
                'product_id' => $request->product_id,
                'price' => $request->price,
                'status' => 'pending',
                'order_id' => $orderId,
            ]);

            Log::info('Transaction Created', ['transaction_id' => $transaction->id]);

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
                    'order_id' => $orderId,
                    'gross_amount' => (int) $request->price,
                ),
                'customer_details' => array(
                    'first_name' => Auth::check() ? (Auth::user()->full_name ?? 'Customer') : 'Guest',
                    'email' => Auth::check() ? Auth::user()->email : 'guest@example.com',
                ),
                'item_details' => array(
                    array(
                        'id' => $product->product_id,
                        'price' => (int) $request->price,
                        'quantity' => 1,
                        'name' => $product->product_name,
                    )
                ),
            );

            Log::info('Midtrans Params Prepared', $params);

            // Dapatkan Snap Token dari Midtrans
            try {
                $snapToken = \Midtrans\Snap::getSnapToken($params);
                Log::info('Snap Token Generated', ['token' => $snapToken]);
            } catch (\Exception $snapError) {
                Log::error('Midtrans Snap Error', [
                    'message' => $snapError->getMessage(),
                    'code' => $snapError->getCode()
                ]);
                throw new \Exception('Gagal mendapatkan token pembayaran: ' . $snapError->getMessage());
            }

            // Simpan snap token ke database
            $transaction->snap_token = $snapToken;
            $transaction->save();

            Log::info('Transaction Updated with Snap Token');

            return redirect()->route('checkout', $transaction->id);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation Error', ['errors' => $e->errors()]);
            return back()
                ->withErrors($e->errors())
                ->withInput()
                ->with('error', 'Data tidak valid. Silakan coba lagi.');

        } catch (\Exception $e) {
            Log::error('Checkout Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            // Hapus transaksi jika ada error
            if (isset($transaction) && $transaction->id) {
                $transaction->delete();
            }
            
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