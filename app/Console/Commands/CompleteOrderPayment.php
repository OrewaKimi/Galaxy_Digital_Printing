<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;

class CompleteOrderPayment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:complete-payment {order_number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manually complete payment for an order (for fixing missed Midtrans callbacks)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $orderNumber = $this->argument('order_number');

        $order = Order::where('order_number', $orderNumber)->first();

        if (!$order) {
            $this->error("Order not found: {$orderNumber}");
            return 1;
        }

        if ($order->remaining_amount <= 0) {
            $this->warn("Order {$orderNumber} is already fully paid.");
            return 0;
        }

        $this->info("Order: {$order->order_number}");
        $this->info("Customer: {$order->customer_name}");
        $this->info("Total: Rp " . number_format($order->total_price, 0, ',', '.'));
        $this->info("Paid: Rp " . number_format($order->paid_amount, 0, ',', '.'));
        $this->info("Remaining: Rp " . number_format($order->remaining_amount, 0, ',', '.'));

        if (!$this->confirm('Do you want to mark this order as fully paid?')) {
            $this->info('Cancelled.');
            return 0;
        }

        DB::beginTransaction();

        try {
            // Update order
            $order->update([
                'status_id' => 2,
                'paid_amount' => $order->total_price,
                'remaining_amount' => 0,
                'notes' => ($order->notes ?? '') . ' | Payment completed manually via command',
            ]);

            // Create payment record
            $payment = Payment::create([
                'payment_number' => 'PAY-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6)),
                'order_id' => $order->order_id,
                'payment_type_id' => 1,
                'amount' => $order->total_price,
                'payment_method' => 'e-wallet',
                'payment_status' => 'completed',
                'payment_date' => now(),
                'transaction_reference' => $order->transaction_id,
                'notes' => 'Payment completed via Midtrans - Manual completion (callback was missed)',
                'verified_by' => null,
                'verification_date' => now(),
            ]);

            DB::commit();

            $this->info('✓ Order payment completed successfully!');
            $this->info("✓ Payment record created: {$payment->payment_number}");
            $this->info('✓ PaymentObserver will automatically create InventoryTransactions (if materials assigned)');

            return 0;

        } catch (\Exception $e) {
            DB::rollBack();
            $this->error('Error completing payment: ' . $e->getMessage());
            return 1;
        }
    }
}
