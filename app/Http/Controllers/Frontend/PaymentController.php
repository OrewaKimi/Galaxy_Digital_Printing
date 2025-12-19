<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use Midtrans\Transaction;


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
                'callbacks' => [
                    'finish' => url('/orders/' . $order->order_id),
                ],
            ];

            // Add notification URL if APP_URL is set
            $appUrl = config('app.url');
            if ($appUrl && $appUrl !== 'http://localhost') {
                $params['callbacks']['notification'] = $appUrl . '/payment/midtrans/callback';
            }

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
            \Log::info('=== Midtrans Callback Received (PaymentController) ===');
            \Log::info('Request Data:', $request->all());
            
            $this->initMidtrans();
            $notif = new Notification();

            $orderId = $notif->order_id;
            $transactionStatus = $notif->transaction_status;
            $fraudStatus = $notif->fraud_status ?? null;
            $paymentType = $notif->payment_type;
            $transactionId = $notif->transaction_id;

            \Log::info('Parsed Notification:', [
                'order_id' => $orderId,
                'transaction_status' => $transactionStatus,
                'payment_type' => $paymentType,
                'transaction_id' => $transactionId,
            ]);

            $order = Order::where('order_number', $orderId)->first();

            if (!$order) {
                \Log::warning('Order not found', ['order_number' => $orderId]);
                return response()->json(['message' => 'Order not found'], 404);
            }

            \Log::info('Order found', ['order_id' => $order->order_id, 'order_number' => $order->order_number]);

            // Update transaction ID
            $order->update(['transaction_id' => $transactionId]);

            // Tentukan payment_type_id berdasarkan payment_type
            $defaultPaymentTypeId = 1;

            // Handle transaction status
            if ($transactionStatus == 'capture') {
                if ($fraudStatus == 'accept') {
                    \Log::info('Payment captured and accepted', ['order_id' => $order->order_id]);
                    $this->updateOrderPaymentSuccess($order, $paymentType, $defaultPaymentTypeId);
                }
            } elseif ($transactionStatus == 'settlement') {
                \Log::info('Payment settled', ['order_id' => $order->order_id]);
                $this->updateOrderPaymentSuccess($order, $paymentType, $defaultPaymentTypeId);
            } elseif ($transactionStatus == 'pending') {
                \Log::info('Payment pending', ['order_id' => $order->order_id]);
                $order->update([
                    'notes' => 'Menunggu pembayaran Midtrans - ' . $paymentType
                ]);
            } elseif (in_array($transactionStatus, ['deny', 'expire', 'cancel'])) {
                \Log::warning('Payment failed/cancelled', ['order_id' => $order->order_id, 'status' => $transactionStatus]);
                $order->update([
                    'notes' => 'Pembayaran gagal/dibatalkan - ' . $transactionStatus
                ]);
            }

            \Log::info('=== Midtrans Callback Processed Successfully ===');
            return response()->json(['message' => 'Notification processed successfully']);

        } catch (\Exception $e) {
            \Log::error('Midtrans Callback Error (PaymentController)', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
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
        \Log::info('Updating order payment success', [
            'order_id' => $order->order_id,
            'total_price' => $order->total_price,
        ]);

        // Update order
        $order->update([
            'paid_amount' => $order->total_price,
            'remaining_amount' => 0,
            'status_id' => 2,
        ]);

        \Log::info('Order updated', [
            'paid_amount' => $order->paid_amount,
            'remaining_amount' => $order->remaining_amount,
            'status_id' => $order->status_id,
        ]);

        // Map Midtrans payment type to our enum
        $methodMap = [
            'credit_card' => 'credit_card',
            'bank_transfer' => 'transfer',
            'echannel' => 'transfer',
            'gopay' => 'e-wallet',
            'shopeepay' => 'e-wallet',
            'qris' => 'e-wallet',
        ];
        $mappedMethod = $methodMap[$paymentType] ?? 'other';

        // Create payment record
        $payment = Payment::create([
            'payment_number' => 'PAY-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6)),
            'order_id' => $order->order_id,
            'payment_type_id' => $paymentTypeId,
            'amount' => $order->total_price,
            'payment_method' => $mappedMethod,
            'payment_status' => 'completed',
            'payment_date' => now(),
            'transaction_reference' => $order->transaction_id,
            'notes' => 'Payment via Midtrans (' . $paymentType . ')',
            'verified_by' => null,
            'verification_date' => now(),
        ]);

        \Log::info('Payment record created', ['payment_id' => $payment->payment_id]);
    }
     public function paymentSuccess(Request $request)
    {
        $orderId = $request->query('order_id');

        if (!$orderId) {
            return redirect()->route('home')->with('error', 'Invalid payment data');
        }

        try {
            $this->initMidtrans();
            $status = Transaction::status($orderId);
            $transactionStatus = $status->transaction_status;
            $paymentType = $status->payment_type;
            $fraudStatus = $status->fraud_status ?? null;

            $order = Order::where('order_number', $orderId)->first();

            if ($order) {
                if ($transactionStatus == 'capture') {
                    if ($fraudStatus == 'accept') {
                        $this->updateOrderPaymentSuccess($order, $paymentType, 1);
                    }
                } else if ($transactionStatus == 'settlement') {
                    $this->updateOrderPaymentSuccess($order, $paymentType, 1);
                }
                
                return redirect()->route('orders.show', $order->id)->with('success', 'Pembayaran berhasil!');
            }

            return redirect()->route('home')->with('error', 'Order not found');

        } catch (\Exception $e) {
            \Log::error('Payment Success Error: ' . $e->getMessage());
            return redirect()->route('home')->with('error', 'Gagal memverifikasi pembayaran');
        }
    }
}