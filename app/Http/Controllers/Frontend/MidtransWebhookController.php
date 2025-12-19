<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Midtrans\Notification;

class MidtransWebhookController extends Controller
{
    /**
     * Handle Midtrans webhook callback
     * 
     * Endpoint ini menerima notifikasi dari Midtrans setiap kali ada perubahan status pembayaran.
     * PENTING: Endpoint ini HARUS didaftarkan di Midtrans Dashboard
     * Settings → Configuration → Payment Notification URL
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle(Request $request)
    {
        $requestId = uniqid('webhook_', true);
        
        try {
            Log::info("=== Midtrans Webhook Start ($requestId) ===");
            Log::info('Raw Request Data:', $request->all());

            // Step 1: Verifikasi request dari Midtrans
            $this->verifySignature($request);

            // Step 2: Parse notifikasi dari Midtrans
            $notification = new Notification();
            $parsedData = $this->parseNotification($notification);

            Log::info("Parsed Notification ($requestId):", $parsedData);

            // Step 3: Cari order di database
            $order = Order::where('order_number', $parsedData['order_id'])->first();
            
            if (!$order) {
                Log::warning("Order not found ($requestId)", ['order_number' => $parsedData['order_id']]);
                return response()->json([
                    'status' => 'error',
                    'message' => 'Order not found',
                    'request_id' => $requestId
                ], 404);
            }

            Log::info("Order found ($requestId)", [
                'order_id' => $order->order_id,
                'order_number' => $order->order_number,
                'current_status' => $order->notes ?? 'N/A',
            ]);

            // Step 4: Process pembayaran berdasarkan transaction status
            $this->processPayment($order, $parsedData, $requestId);

            Log::info("=== Midtrans Webhook End ($requestId) - Success ===");
            
            return response()->json([
                'status' => 'success',
                'message' => 'Webhook processed successfully',
                'request_id' => $requestId,
                'order_id' => $order->order_id,
                'transaction_status' => $parsedData['transaction_status']
            ]);

        } catch (\Exception $e) {
            Log::error("Midtrans Webhook Error ($requestId)", [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'request_id' => $requestId
            ], 500);
        }
    }

    /**
     * Verifikasi signature dari Midtrans
     * Memastikan request benar-benar dari Midtrans, bukan dari pihak lain
     * 
     * Signature = SHA512(order_id + status_code + gross_amount + server_key)
     */
    private function verifySignature(Request $request)
    {
        $signatureKey = $request->input('signature_key');
        $orderId = $request->input('order_id');
        $statusCode = $request->input('status_code');
        $grossAmount = $request->input('gross_amount');
        $serverKey = config('midtrans.server_key');

        // Validasi field yang diperlukan ada
        if (!$signatureKey || !$orderId || !$statusCode || !$grossAmount) {
            throw new \Exception('Missing required fields: signature_key, order_id, status_code, or gross_amount');
        }

        // Validasi server key ada
        if (!$serverKey) {
            throw new \Exception('MIDTRANS_SERVER_KEY tidak dikonfigurasi di .env');
        }

        // Generate signature yang diharapkan
        $expectedSignature = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

        // Bandingkan dengan signature dari request
        if (hash_equals($expectedSignature, $signatureKey) === false) {
            Log::warning('Invalid signature received', [
                'order_id' => $orderId,
                'expected' => substr($expectedSignature, 0, 20) . '...',
                'received' => substr($signatureKey, 0, 20) . '...',
            ]);
            throw new \Exception('Invalid signature - request tidak dari Midtrans');
        }

        Log::info('Signature verified successfully', ['order_id' => $orderId]);
    }

    /**
     * Parse data dari Midtrans Notification object
     */
    private function parseNotification(Notification $notification): array
    {
        return [
            'order_id' => $notification->order_id,
            'transaction_id' => $notification->transaction_id,
            'transaction_status' => $notification->transaction_status, // capture, settlement, pending, deny, cancel, expire
            'payment_type' => $notification->payment_type, // credit_card, bank_transfer, gopay, dll
            'fraud_status' => $notification->fraud_status ?? 'accept', // accept atau challenge
            'gross_amount' => (int) $notification->gross_amount,
            'settlement_time' => $notification->settlement_time ?? null,
        ];
    }

    /**
     * Process pembayaran berdasarkan status dari Midtrans
     */
    private function processPayment(Order $order, array $data, string $requestId)
    {
        $transactionStatus = $data['transaction_status'];
        $paymentType = $data['payment_type'];
        $transactionId = $data['transaction_id'];
        $fraudStatus = $data['fraud_status'];

        // Update transaction_id di order
        if ($transactionId && !$order->transaction_id) {
            $order->update(['transaction_id' => $transactionId]);
        }

        // Handle berbagai status pembayaran
        switch ($transactionStatus) {
            case 'settlement':
            case 'capture':
                // Jika capture, pastikan tidak ada fraud
                if ($transactionStatus === 'capture' && $fraudStatus !== 'accept') {
                    Log::warning("Payment marked as fraud ($requestId)", ['order_id' => $order->order_id]);
                    $this->handlePaymentPending($order, $paymentType);
                    break;
                }
                
                Log::info("Payment successful ($requestId)", ['order_id' => $order->order_id]);
                $this->handlePaymentSuccess($order, $paymentType, $transactionId, $data['gross_amount']);
                break;

            case 'pending':
                Log::info("Payment pending ($requestId)", ['order_id' => $order->order_id]);
                $this->handlePaymentPending($order, $paymentType);
                break;

            case 'deny':
            case 'cancel':
            case 'expire':
                Log::warning("Payment failed/cancelled ($requestId) - Status: $transactionStatus", ['order_id' => $order->order_id]);
                $this->handlePaymentFailed($order, $transactionStatus);
                break;

            default:
                Log::warning("Unknown transaction status ($requestId): $transactionStatus", ['order_id' => $order->order_id]);
        }
    }

    /**
     * Handle pembayaran BERHASIL (settlement/capture)
     * Update order dan buat payment record
     */
    private function handlePaymentSuccess(Order $order, string $paymentType, string $transactionId, int $grossAmount)
    {
        try {
            DB::beginTransaction();

            // Map payment type dari Midtrans ke enum kita
            $methodMap = [
                'credit_card' => 'credit_card',
                'bank_transfer' => 'transfer',
                'echannel' => 'transfer',
                'permata_va' => 'transfer',
                'bca_va' => 'transfer',
                'bni_va' => 'transfer',
                'bri_va' => 'transfer',
                'other_va' => 'transfer',
                'gopay' => 'e-wallet',
                'shopeepay' => 'e-wallet',
                'qris' => 'e-wallet',
            ];
            
            $paymentMethod = $methodMap[$paymentType] ?? 'other';

            // 1. Update order
            $order->update([
                'status_id' => 2, // Status "Pembayaran Diterima" - sesuaikan dengan enum kamu
                'paid_amount' => $order->total_price,
                'remaining_amount' => 0,
                'notes' => "Pembayaran berhasil via Midtrans ($paymentType) pada " . now()->format('d/m/Y H:i:s'),
            ]);

            Log::info('Order updated for payment success', [
                'order_id' => $order->order_id,
                'paid_amount' => $order->paid_amount,
                'remaining_amount' => $order->remaining_amount,
            ]);

            // 2. Buat Payment record
            $payment = Payment::create([
                'payment_number' => 'MTR-' . date('YmdHis') . '-' . strtoupper(substr(uniqid(), -6)),
                'order_id' => $order->order_id,
                'payment_type_id' => 1, // Sesuaikan dengan payment type ID untuk Midtrans
                'amount' => $grossAmount,
                'payment_method' => $paymentMethod,
                'payment_status' => 'completed',
                'payment_date' => now(),
                'transaction_reference' => $transactionId,
                'notes' => "Midtrans payment ($paymentType)",
                'verified_by' => null, // Auto-verified dari Midtrans
                'verification_date' => now(),
            ]);

            Log::info('Payment record created', [
                'payment_id' => $payment->payment_id,
                'payment_number' => $payment->payment_number,
                'amount' => $payment->amount,
                'transaction_reference' => $transactionId,
            ]);

            DB::commit();

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error handling payment success', [
                'order_id' => $order->order_id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            throw $e;
        }
    }

    /**
     * Handle pembayaran PENDING (user belum transfer, menunggu input user)
     */
    private function handlePaymentPending(Order $order, string $paymentType)
    {
        $order->update([
            'notes' => "Pembayaran dalam proses ($paymentType) - menunggu verifikasi Midtrans",
        ]);

        Log::info('Order payment set to pending', [
            'order_id' => $order->order_id,
            'payment_type' => $paymentType,
        ]);
    }

    /**
     * Handle pembayaran GAGAL/DIBATALKAN (deny, expire, cancel)
     */
    private function handlePaymentFailed(Order $order, string $transactionStatus)
    {
        $failureReasons = [
            'deny' => 'Pembayaran ditolak oleh sistem',
            'expire' => 'Pembayaran kadaluarsa - segera lakukan pembayaran ulang',
            'cancel' => 'Pembayaran dibatalkan',
        ];

        $reason = $failureReasons[$transactionStatus] ?? 'Pembayaran gagal';

        $order->update([
            'notes' => $reason,
        ]);

        Log::warning('Order payment failed', [
            'order_id' => $order->order_id,
            'transaction_status' => $transactionStatus,
            'reason' => $reason,
        ]);
    }
}
