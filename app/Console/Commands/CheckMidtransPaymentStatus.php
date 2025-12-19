<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\Payment;
use Midtrans\Config;
use Midtrans\Transaction;

class CheckMidtransPaymentStatus extends Command
{
    protected $signature = 'midtrans:check-payment {orderNumber}';

    protected $description = 'Check Midtrans payment status by order number';

    public function handle()
    {
        $orderNumber = $this->argument('orderNumber');
        
        $order = Order::where('order_number', $orderNumber)->first();
        
        if (!$order) {
            $this->error("Order not found: {$orderNumber}");
            return 1;
        }
        
        $this->info("Order found: {$order->order_number} (ID: {$order->order_id})");
        $this->info("Current status: Paid={$order->paid_amount}, Remaining={$order->remaining_amount}");
        
        if (!$order->snap_token) {
            $this->error("Order has no Midtrans transaction.");
            return 1;
        }
        
        try {
            Config::$serverKey = config('midtrans.server_key');
            Config::$isProduction = config('midtrans.is_production');
            
            $this->info("Checking Midtrans status...");
            $status = Transaction::status($order->order_number);
            
            $this->info("Transaction Status: {$status->transaction_status}");
            $this->info("Payment Type: " . ($status->payment_type ?? 'N/A'));
            
            if (in_array($status->transaction_status, ['capture', 'settlement'])) {
                $existingPayment = Payment::where('order_id', $order->order_id)
                    ->where('payment_status', 'completed')
                    ->first();
                
                if ($existingPayment) {
                    $this->info("Payment already recorded!");
                    return 0;
                }
                
                $order->update([
                    'status_id' => 2,
                    'paid_amount' => $order->total_price,
                    'remaining_amount' => 0,
                    'transaction_id' => $status->transaction_id ?? null,
                    'notes' => 'Pembayaran berhasil via Midtrans - ' . ($status->payment_type ?? 'unknown'),
                ]);
                
                $methodMap = [
                    'credit_card' => 'credit_card',
                    'bank_transfer' => 'transfer',
                    'echannel' => 'transfer',
                    'gopay' => 'e-wallet',
                    'shopeepay' => 'e-wallet',
                    'qris' => 'e-wallet',
                ];
                $mappedMethod = $methodMap[$status->payment_type] ?? 'other';
                
                $payment = Payment::create([
                    'payment_number' => 'PAY-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6)),
                    'order_id' => $order->order_id,
                    'payment_type_id' => 1,
                    'amount' => $order->total_price,
                    'payment_method' => $mappedMethod,
                    'payment_status' => 'completed',
                    'payment_date' => now(),
                    'transaction_reference' => $status->transaction_id ?? null,
                    'notes' => 'Payment via Midtrans (' . ($status->payment_type ?? 'unknown') . ')',
                    'verified_by' => null,
                    'verification_date' => now(),
                ]);
                
                $this->info("✓ Payment created: {$payment->payment_number}");
                $this->info("✓ Order updated successfully!");
                $this->info("✓ Inventory transactions will be created by PaymentObserver");
                
                return 0;
            } else {
                $this->warn("Payment not yet completed. Status: {$status->transaction_status}");
                return 1;
            }
            
        } catch (\Exception $e) {
            $this->error("Error: " . $e->getMessage());
            return 1;
        }
    }
}
