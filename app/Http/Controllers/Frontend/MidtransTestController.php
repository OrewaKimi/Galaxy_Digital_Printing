<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Controller ini HANYA untuk testing/development
 * Hapus setelah production atau ganti dengan proper testing
 */
class MidtransTestController extends Controller
{
    /**
     * Simulasi callback dari Midtrans untuk testing
     * Endpoint ini digunakan saat development untuk test flow tanpa perlu bayar asli
     * 
     * Usage: 
     * POST /webhook/midtrans/test?order_id=ORD001&status=settlement
     */
    public function simulateCallback(Request $request)
    {
        $orderId = $request->input('order_id');
        $status = $request->input('status', 'settlement'); // settlement, pending, deny, dll
        $paymentType = $request->input('payment_type', 'bank_transfer');
        $grossAmount = $request->input('gross_amount', 100000);

        if (!$orderId) {
            return response()->json([
                'error' => 'order_id is required',
                'example_url' => '/webhook/midtrans/test?order_id=ORD001&status=settlement'
            ], 400);
        }

        try {
            // Generate signature yang valid
            $serverKey = config('midtrans.server_key');
            $statusCode = $status === 'settlement' ? '200' : ($status === 'pending' ? '200' : '402');
            $signature = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

            // Buat payload yang mirip dengan Midtrans
            $payload = [
                'order_id' => $orderId,
                'status_code' => $statusCode,
                'gross_amount' => $grossAmount,
                'signature_key' => $signature,
                'transaction_status' => $status,
                'payment_type' => $paymentType,
                'transaction_id' => 'TEST-' . uniqid(),
                'fraud_status' => 'accept',
                'settlement_time' => now()->toIso8601String(),
            ];

            Log::info('=== Testing Midtrans Webhook ===');
            Log::info('Payload:', $payload);

            // Kirim ke webhook endpoint
            $client = new \GuzzleHttp\Client();
            $response = $client->post(route('webhook.midtrans', [], false), [
                'form_params' => $payload,
                'http_errors' => false,
            ]);

            $responseData = json_decode($response->getBody(), true);

            return response()->json([
                'success' => true,
                'message' => 'Test webhook sent successfully',
                'payload' => $payload,
                'webhook_response' => $responseData,
                'status_code' => $response->getStatusCode(),
            ]);

        } catch (\Exception $e) {
            Log::error('Test webhook error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Lihat daftar orders untuk testing
     * GET /webhook/midtrans/test/orders
     */
    public function listOrders()
    {
        $orders = Order::select(['order_id', 'order_number', 'total_price', 'paid_amount', 'status_id', 'notes', 'created_at'])
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();

        return response()->json([
            'total' => $orders->count(),
            'orders' => $orders,
            'test_webhook_url' => route('test.webhook.midtrans'),
        ]);
    }

    /**
     * Cek status pembayaran order tertentu
     * GET /webhook/midtrans/test/orders/{order_number}
     */
    public function checkOrder($orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)->first();

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        return response()->json([
            'order_id' => $order->order_id,
            'order_number' => $order->order_number,
            'total_price' => $order->total_price,
            'paid_amount' => $order->paid_amount,
            'remaining_amount' => $order->remaining_amount,
            'status_id' => $order->status_id,
            'transaction_id' => $order->transaction_id,
            'notes' => $order->notes,
            'created_at' => $order->created_at->toIso8601String(),
        ]);
    }
}
