<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Console\Command;

class TestMidtransWebhook extends Command
{
    protected $signature = 'midtrans:webhook-test {order_id? : Order number} {status? : Transaction status}';
    protected $description = 'Test Midtrans webhook processing locally';

    public function handle()
    {
        $orderId = $this->argument('order_id');
        $status = $this->argument('status') ?? 'settlement';

        if (!$orderId) {
            // Lihat orders yang tersedia
            $orders = Order::select('order_id', 'order_number', 'total_price', 'paid_amount', 'notes')
                ->orderBy('created_at', 'desc')
                ->take(10)
                ->get();

            if ($orders->isEmpty()) {
                $this->error('No orders found. Buat order terlebih dahulu!');
                return;
            }

            $this->info('Available orders:');
            $this->table(
                ['Order ID', 'Order Number', 'Total', 'Paid', 'Notes'],
                $orders->map(fn($o) => [
                    $o->order_id,
                    $o->order_number,
                    'Rp ' . number_format($o->total_price, 0),
                    'Rp ' . number_format($o->paid_amount, 0),
                    substr($o->notes, 0, 30),
                ])
            );

            $this->info("\nUsage: php artisan midtrans:webhook-test ORD-001 settlement");
            return;
        }

        $order = Order::where('order_number', $orderId)->first();
        if (!$order) {
            $this->error("Order $orderId tidak ditemukan!");
            return;
        }

        // Generate signature
        $serverKey = config('midtrans.server_key');
        $statusCode = $status === 'settlement' ? '200' : '402';
        $grossAmount = (int) $order->total_price;
        $signature = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

        $this->info("=== Testing Midtrans Webhook ===");
        $this->info("Order: $orderId");
        $this->info("Status: $status");
        $this->info("Amount: Rp " . number_format($grossAmount, 0));
        $this->info("Signature: " . substr($signature, 0, 20) . "...");

        $payload = [
            'order_id' => $orderId,
            'status_code' => $statusCode,
            'gross_amount' => $grossAmount,
            'signature_key' => $signature,
            'transaction_status' => $status,
            'payment_type' => 'bank_transfer',
            'transaction_id' => 'TEST-' . uniqid(),
            'fraud_status' => 'accept',
        ];

        $this->info("\nPayload:");
        $this->table(
            ['Key', 'Value'],
            collect($payload)->map(fn($v, $k) => [$k, substr($v, 0, 50)])->toArray()
        );

        if (!$this->confirm('Proceed with test?')) {
            $this->warn('Test cancelled');
            return;
        }

        try {
            // Simulasi callback
            $this->call('tinker', [
                '--execute' => "
                    \Illuminate\Support\Facades\Log::info('=== Manual Test Midtrans Webhook ===');
                    
                    \$request = new \Illuminate\Http\Request();
                    \$request->initialize([], " . json_encode($payload) . ");
                    
                    \$controller = new \App\Http\Controllers\Frontend\MidtransWebhookController();
                    \$response = \$controller->handle(\$request);
                    
                    dd(\$response->getData());
                "
            ]);

            // Check hasil
            $updatedOrder = $order->fresh();
            
            $this->info("\n✅ Webhook processed!");
            $this->table(
                ['Field', 'Before', 'After'],
                [
                    ['Status', $order->status_id, $updatedOrder->status_id],
                    ['Paid Amount', 'Rp ' . number_format($order->paid_amount, 0), 'Rp ' . number_format($updatedOrder->paid_amount, 0)],
                    ['Remaining', 'Rp ' . number_format($order->remaining_amount, 0), 'Rp ' . number_format($updatedOrder->remaining_amount, 0)],
                ]
            );

            $payment = Payment::where('order_id', $order->order_id)->latest()->first();
            if ($payment) {
                $this->info("\nPayment record created:");
                $this->table(
                    ['Field', 'Value'],
                    [
                        ['Payment Number', $payment->payment_number],
                        ['Amount', 'Rp ' . number_format($payment->amount, 0)],
                        ['Status', $payment->payment_status],
                        ['Method', $payment->payment_method],
                        ['Reference', $payment->transaction_reference],
                    ]
                );
            }

        } catch (\Exception $e) {
            $this->error('Test failed: ' . $e->getMessage());
            \Illuminate\Support\Facades\Log::error($e);
        }
    }
}
