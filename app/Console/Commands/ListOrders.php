<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;

class ListOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:list {--limit=10}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List recent orders';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $limit = $this->option('limit');

        $orders = Order::with('status')
            ->latest('created_at')
            ->limit($limit)
            ->get();

        if ($orders->isEmpty()) {
            $this->warn('No orders found.');
            return 0;
        }

        $data = [];
        foreach ($orders as $order) {
            $data[] = [
                'Order Number' => $order->order_number,
                'Customer' => $order->customer_name ?? 'N/A',
                'Total' => 'Rp ' . number_format($order->total_price, 0, ',', '.'),
                'Paid' => 'Rp ' . number_format($order->paid_amount, 0, ',', '.'),
                'Remaining' => 'Rp ' . number_format($order->remaining_amount, 0, ',', '.'),
                'Status' => $order->status->status_name ?? 'N/A',
                'Date' => $order->order_date->format('Y-m-d H:i'),
            ];
        }

        $this->table(
            ['Order Number', 'Customer', 'Total', 'Paid', 'Remaining', 'Status', 'Date'],
            $data
        );

        return 0;
    }
}
