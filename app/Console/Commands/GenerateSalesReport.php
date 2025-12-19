<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\SalesReport;
use App\Models\Order;
use App\Models\Customer;
use Carbon\Carbon;

class GenerateSalesReport extends Command
{
    protected $signature = 'sales:generate 
                            {period=daily : Report period (daily, weekly, monthly, yearly)}
                            {date? : Specific date (Y-m-d format)}';

    protected $description = 'Generate sales report for specified period';

    public function handle()
    {
        $period = $this->argument('period');
        $date = $this->argument('date') ? Carbon::parse($this->argument('date')) : Carbon::now();

        [$periodStart, $periodEnd] = $this->getPeriodDates($period, $date);

        $this->info("Generating {$period} sales report from {$periodStart->toDateString()} to {$periodEnd->toDateString()}");

        // Get orders in period
        $orders = Order::whereBetween('order_date', [$periodStart, $periodEnd])->get();

        $totalSales = $orders->sum('total_price');
        $totalCost = $orders->sum(function($order) {
            return $order->orderItems->sum(function($item) {
                return $item->material_cost + $item->production_cost;
            });
        });
        $totalProfit = $totalSales - $totalCost;
        $totalDiscount = $orders->sum('discount_amount');
        $totalTax = $orders->sum('tax_amount');
        
        $totalOrders = $orders->count();
        $completedOrders = $orders->where('status.status_code', 'COMPLETED')->count();
        $cancelledOrders = $orders->where('status.status_code', 'CANCELLED')->count();
        $pendingOrders = $orders->where('status.status_code', 'PENDING')->count();

        // Get customer stats
        $customerIds = $orders->pluck('customer_id')->unique();
        $totalCustomers = $customerIds->count();
        $newCustomers = Customer::whereIn('customer_id', $customerIds)
            ->whereBetween('created_at', [$periodStart, $periodEnd])
            ->count();

        // Generate report number
        $reportNumber = 'RPT-' . strtoupper($period) . '-' . $date->format('Ymd') . '-' . strtoupper(substr(uniqid(), -4));

        // Create report
        $report = SalesReport::create([
            'report_number' => $reportNumber,
            'report_date' => Carbon::now(),
            'period_start' => $periodStart,
            'period_end' => $periodEnd,
            'report_period' => $period,
            'total_sales' => $totalSales,
            'total_cost' => $totalCost,
            'total_profit' => $totalProfit,
            'total_discount' => $totalDiscount,
            'total_tax' => $totalTax,
            'total_orders' => $totalOrders,
            'completed_orders' => $completedOrders,
            'cancelled_orders' => $cancelledOrders,
            'pending_orders' => $pendingOrders,
            'total_customers' => $totalCustomers,
            'new_customers' => $newCustomers,
            'generated_by' => 1, // System generated
            'notes' => "Auto-generated {$period} report"
        ]);

        $this->info("Sales report generated successfully!");
        $this->table(
            ['Metric', 'Value'],
            [
                ['Total Sales', 'Rp ' . number_format($totalSales, 0, ',', '.')],
                ['Total Profit', 'Rp ' . number_format($totalProfit, 0, ',', '.')],
                ['Total Orders', $totalOrders],
                ['Completed Orders', $completedOrders],
                ['Total Customers', $totalCustomers],
            ]
        );

        return Command::SUCCESS;
    }

    protected function getPeriodDates($period, $date)
    {
        switch ($period) {
            case 'daily':
                return [$date->copy()->startOfDay(), $date->copy()->endOfDay()];
                
            case 'weekly':
                return [$date->copy()->startOfWeek(), $date->copy()->endOfWeek()];
                
            case 'monthly':
                return [$date->copy()->startOfMonth(), $date->copy()->endOfMonth()];
                
            case 'quarterly':
                return [$date->copy()->startOfQuarter(), $date->copy()->endOfQuarter()];
                
            case 'yearly':
                return [$date->copy()->startOfYear(), $date->copy()->endOfYear()];
                
            default:
                return [$date->copy()->startOfDay(), $date->copy()->endOfDay()];
        }
    }
}