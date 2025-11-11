<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use Midtrans\Notification;

class MidtransCallbackController extends Controller
{
    public function handle(Request $request)
    {
        $notification = new Notification();

        $orderId = $notification->order_id ?? null;
        $transactionStatus = $notification->transaction_status ?? null;
        $paymentType = $notification->payment_type ?? null;
        $fraudStatus = $notification->fraud_status ?? null;

        if (!$orderId) {
            return response()->json(['message' => 'Invalid callback data'], 400);
        }

        $order = Order::where('order_number', $orderId)->first();

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        if (in_array($transactionStatus, ['capture', 'settlement'])) {
            $order->update([
                'paid_amount' => $order->total_price,
                'remaining_amount' => 0,
            ]);

            Payment::create([
                'order_id' => $order->order_id,
                'amount' => $order->total_price,
                'payment_method' => $paymentType,
                'payment_status' => 'completed',
                'payment_date' => now(),
                'notes' => 'Payment via Midtrans (' . $paymentType . ')',
            ]);
        } elseif ($transactionStatus === 'pending') {
            $order->update(['notes' => 'Menunggu pembayaran Midtrans']);
        } elseif (in_array($transactionStatus, ['deny', 'cancel', 'expire'])) {
            $order->update(['notes' => 'Pembayaran gagal atau dibatalkan']);
        }

        return response()->json(['message' => 'Notification processed successfully']);
    }
}
