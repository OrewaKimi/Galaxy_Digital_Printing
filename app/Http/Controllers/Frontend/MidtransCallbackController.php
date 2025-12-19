<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Transaction;
use Midtrans\Notification;
use Illuminate\Support\Facades\Log;

class MidtransCallbackController extends Controller
{
    public function handle(Request $request)
    {
        try {
            Log::info('=== Midtrans Callback Received (MidtransCallbackController) ===');
            Log::info('Request Data:', $request->all());
            
            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = config('midtrans.is_production');
            
            // Verifikasi signature Midtrans
            $signatureKey = $request->input('signature_key');
            $orderId = $request->input('order_id');
            $statusCode = $request->input('status_code');
            $grossAmount = $request->input('gross_amount');
            $serverKey = config('midtrans.server_key');
            
            if (!$signatureKey || !$orderId || !$statusCode || !$grossAmount) {
                Log::warning('Missing required fields for signature verification', $request->all());
                return response()->json(['message' => 'Invalid callback data - missing signature fields'], 400);
            }
            
            $expectedSignature = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);
            
            if ($expectedSignature !== $signatureKey) {
                Log::warning('Invalid signature', [
                    'expected' => $expectedSignature,
                    'received' => $signatureKey,
                    'order_id' => $orderId
                ]);
                return response()->json(['message' => 'Invalid signature'], 403);
            }
            
            Log::info('Signature verified successfully', ['order_id' => $orderId]);
            
            $notification = new Notification();

            $orderNumber = $notification->order_id ?? null;
            $transactionStatus = $notification->transaction_status ?? null;
            $paymentType = $notification->payment_type ?? null;
            $fraudStatus = $notification->fraud_status ?? null;
            $transactionId = $notification->transaction_id ?? null;

            Log::info('Parsed Notification:', [
                'order_number' => $orderNumber,
                'transaction_status' => $transactionStatus,
                'payment_type' => $paymentType,
                'transaction_id' => $transactionId,
                'fraud_status' => $fraudStatus,
            ]);

            if (!$orderNumber) {
                return response()->json(['message' => 'Invalid callback data'], 400);
            }

            $order = Order::where('order_number', $orderNumber)->first();

            if (!$order) {
                Log::warning('Order not found in callback', ['order_number' => $orderNumber]);
                return response()->json(['message' => 'Order not found'], 404);
            }

            Log::info('Order found', [
                'order_id' => $order->order_id,
                'order_number' => $order->order_number,
                'current_paid_amount' => $order->paid_amount,
                'total_price' => $order->total_price,
            ]);

            // Update transaction_id
            if ($transactionId) {
                $order->update(['transaction_id' => $transactionId]);
            }

            // Update Transaction model status
            Transaction::where('order_id', $orderNumber)->update([
                'status' => $transactionStatus === 'settlement' || $transactionStatus === 'capture' ? 'success' : $transactionStatus
            ]);

            if (in_array($transactionStatus, ['capture', 'settlement'])) {
                Log::info('Processing payment success', ['status' => $transactionStatus]);
                
                // Update order status
                $order->update([
                    'status_id' => 2, // Status "Paid" atau sesuaikan dengan status di database
                    'paid_amount' => $order->total_price,
                    'remaining_amount' => 0,
                    'notes' => 'Pembayaran berhasil via Midtrans - ' . $paymentType,
                ]);

                Log::info('Order updated with payment', [
                    'order_id' => $order->order_id,
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

                // Buat Payment record
                $payment = Payment::create([
                    'payment_number' => 'PAY-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6)),
                    'order_id' => $order->order_id,
                    'payment_type_id' => 1,
                    'amount' => $order->total_price,
                    'payment_method' => $mappedMethod,
                    'payment_status' => 'completed',
                    'payment_date' => now(),
                    'transaction_reference' => $transactionId,
                    'notes' => 'Payment via Midtrans (' . $paymentType . ')',
                    'verified_by' => null,
                    'verification_date' => now(),
                ]);

                Log::info('Payment record created', [
                    'payment_id' => $payment->payment_id,
                    'payment_number' => $payment->payment_number,
                    'amount' => $payment->amount,
                ]);

                Log::info('Payment completed successfully', [
                    'order_id' => $order->order_id,
                    'order_number' => $orderNumber,
                ]);
            } elseif ($transactionStatus === 'pending') {
                Log::info('Payment pending', ['order_id' => $order->order_id]);
                $order->update(['notes' => 'Menunggu pembayaran Midtrans - ' . $paymentType]);
            } elseif (in_array($transactionStatus, ['deny', 'cancel', 'expire'])) {
                Log::warning('Payment failed/cancelled', ['order_id' => $order->order_id, 'status' => $transactionStatus]);
                $order->update([
                    'notes' => 'Pembayaran gagal/dibatalkan - ' . $transactionStatus
                ]);
            }

            Log::info('=== Midtrans Callback Processed Successfully ===');
            return response()->json(['message' => 'Notification processed successfully']);
        } catch (\Exception $e) {
            Log::error('Midtrans Callback Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return response()->json([
                'message' => 'Error processing callback',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
