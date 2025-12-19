<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Log;

class TestMidtransCallback extends Command
{
    protected $signature = 'test:midtrans-callback {order_number}';
    protected $description = 'Test Midtrans callback for an order';

    public function handle()
    {
        $orderNumber = $this->argument('order_number');
        
        $order = Order::where('order_number', $orderNumber)->first();
        
        if (!$order) {
            $this->error("Order {$orderNumber} not found!");
            return 1;
        }

        $this->info("Testing callback for order: {$orderNumber}");
        $this->info("Current order status:");
        $this->info("- Total: Rp " . number_format($order->total_price, 0, ',', '.'));
        $this->info("- Paid: Rp " . number_format($order->paid_amount, 0, ',', '.'));
        $this->info("- Remaining: Rp " . number_format($order->remaining_amount, 0, ',', '.'));
        
        $this->info("\nSimulating successful payment...");
        
        $order->update([
            'status_id' => 2,
            'paid_amount' => $order->total_price,
            'remaining_amount' => 0,
            'notes' => 'Pembayaran berhasil via Midtrans - TEST',
        ]);
        
        $methodMap = [
            'gopay' => 'e-wallet',
            'shopeepay' => 'e-wallet',
            'qris' => 'e-wallet',
        ];
        $paymentType = 'gopay';
        $mappedMethod = $methodMap[$paymentType] ?? 'other';
        
        Payment::create([
            'payment_number' => 'PAY-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6)),
            'order_id' => $order->order_id,
            'payment_type_id' => 1,
            'amount' => $order->total_price,
            'payment_method' => $mappedMethod,
            'payment_status' => 'completed',
            'payment_date' => now(),
            'transaction_reference' => 'TEST-' . uniqid(),
            'notes' => 'Test Payment via Midtrans',
            'verified_by' => null,
            'verification_date' => now(),
        ]);
        
        $order->refresh();
        
        $this->info("\nOrder updated successfully!");
        $this->info("New order status:");
        $this->info("- Total: Rp " . number_format($order->total_price, 0, ',', '.'));
        $this->info("- Paid: Rp " . number_format($order->paid_amount, 0, ',', '.'));
        $this->info("- Remaining: Rp " . number_format($order->remaining_amount, 0, ',', '.'));
        $this->info("- Status ID: {$order->status_id}");
        
        return 0;
    }
}
