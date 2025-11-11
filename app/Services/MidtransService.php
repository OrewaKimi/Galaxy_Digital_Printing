<?php

namespace App\Services;

use Midtrans\Config;
use Midtrans\Snap;

class MidtransService
{
    public function __construct()
    {
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function createTransaction($order)
    {
        $params = [
            'transaction_details' => [
                'order_id' => $order->order_number,
                'gross_amount' => (int) $order->total_price,
            ],
            'customer_details' => [
                'first_name' => $order->customer->name,
                'email' => $order->customer->email,
                'phone' => $order->customer->phone,
            ],
            'item_details' => $order->orderItems->map(function ($item) {
                return [
                    'id' => $item->product_id,
                    'price' => (int) $item->unit_price,
                    'quantity' => (int) $item->quantity,
                    'name' => substr($item->product->product_name, 0, 50),
                ];
            })->toArray(),
        ];

        return Snap::createTransaction($params)->redirect_url;
    }
}
