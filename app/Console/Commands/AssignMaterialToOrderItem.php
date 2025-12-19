<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Material;

class AssignMaterialToOrderItem extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:assign-material {order_number} {material_id?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign material to order items';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $orderNumber = $this->argument('order_number');
        $materialId = $this->argument('material_id');

        $order = Order::where('order_number', $orderNumber)->with('orderItems')->first();

        if (!$order) {
            $this->error("Order not found: {$orderNumber}");
            return 1;
        }

        $this->info("Order: {$order->order_number} - {$order->customer_name}");
        $this->info("Order Items: {$order->orderItems->count()}");

        if (!$materialId) {
            $this->info("\nAvailable Materials:");
            $materials = Material::active()->get();
            
            if ($materials->isEmpty()) {
                $this->error('No active materials found in database!');
                $this->info('Please create materials first in the admin dashboard.');
                return 1;
            }

            foreach ($materials as $material) {
                $this->line("{$material->material_id}: {$material->material_name} - Stock: {$material->stock_quantity} {$material->unit}");
            }

            $materialId = $this->ask('Enter material ID to assign');
        }

        $material = Material::find($materialId);

        if (!$material) {
            $this->error("Material not found: {$materialId}");
            return 1;
        }

        $this->info("Selected Material: {$material->material_name}");

        if (!$this->confirm('Assign this material to all items in this order?')) {
            $this->info('Cancelled.');
            return 0;
        }

        $updated = 0;
        foreach ($order->orderItems as $item) {
            $item->update(['material_id' => $materialId]);
            $updated++;
        }

        $this->info("✓ Updated {$updated} order item(s) with material: {$material->material_name}");
        $this->info("✓ When payment is completed, InventoryTransaction will be created automatically");

        return 0;
    }
}
