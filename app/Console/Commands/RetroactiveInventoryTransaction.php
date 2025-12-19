<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\Payment;
use App\Models\InventoryTransaction;
use App\Models\Material;
use Illuminate\Support\Facades\DB;

class RetroactiveInventoryTransaction extends Command
{
    protected $signature = 'inventory:retroactive {order_number}';

    protected $description = 'Create inventory transactions retroactively for paid orders';

    public function handle()
    {
        $orderNumber = $this->argument('order_number');
        
        $order = Order::where('order_number', $orderNumber)->with('orderItems')->first();
        
        if (!$order) {
            $this->error("Order not found: {$orderNumber}");
            return 1;
        }
        
        $this->info("Order: {$order->order_number} (ID: {$order->order_id})");
        $this->info("Customer: {$order->customer_name}");
        
        if ($order->remaining_amount > 0) {
            $this->error("Order is not fully paid yet. Cannot create inventory transactions.");
            return 1;
        }
        
        $payment = Payment::where('order_id', $order->order_id)
            ->where('payment_status', 'completed')
            ->first();
            
        if (!$payment) {
            $this->error("No completed payment found for this order.");
            return 1;
        }
        
        $this->info("Payment: {$payment->payment_number}");
        
        $orderItems = $order->orderItems;
        
        if ($orderItems->isEmpty()) {
            $this->error("No order items found.");
            return 1;
        }
        
        $this->info("\n=== ORDER ITEMS ===");
        foreach ($orderItems as $item) {
            $materialInfo = $item->material_id ? "Material ID: {$item->material_id}" : "NO MATERIAL ASSIGNED";
            $this->line("Item #{$item->item_id} - {$materialInfo} - Qty: {$item->quantity} - Area: " . ($item->area ?? 'N/A'));
        }
        
        $itemsWithMaterial = $orderItems->filter(function($item) {
            return !is_null($item->material_id);
        });
        
        if ($itemsWithMaterial->isEmpty()) {
            $this->error("\n❌ No items have material assigned!");
            $this->info("Please run: php artisan order:assign-material {$orderNumber}");
            return 1;
        }
        
        $existingTransactions = InventoryTransaction::where('order_id', $order->order_id)->count();
        
        if ($existingTransactions > 0) {
            $this->warn("\n⚠ This order already has {$existingTransactions} inventory transaction(s).");
            if (!$this->confirm('Do you want to create additional transactions?')) {
                $this->info('Cancelled.');
                return 0;
            }
        }
        
        $this->info("\n=== CREATING INVENTORY TRANSACTIONS ===");
        
        DB::beginTransaction();
        
        try {
            $created = 0;
            
            foreach ($orderItems as $item) {
                if (!$item->material_id) {
                    $this->line("Skipping item #{$item->item_id} (no material)");
                    continue;
                }
                
                $material = Material::find($item->material_id);
                
                if (!$material) {
                    $this->warn("Material #{$item->material_id} not found. Skipping.");
                    continue;
                }
                
                $quantityNeeded = ($item->area ?? $item->quantity) ?: $item->quantity;
                $stockBefore = $material->stock_quantity;
                $stockAfter = $stockBefore - $quantityNeeded;
                
                InventoryTransaction::create([
                    'transaction_number' => 'INV-OUT-' . date('Ymd') . '-' . strtoupper(substr(uniqid(), -6)),
                    'material_id' => $item->material_id,
                    'transaction_type' => 'out',
                    'quantity' => $quantityNeeded,
                    'price_per_unit' => $material->price_per_unit ?? 0,
                    'total_cost' => $quantityNeeded * ($material->price_per_unit ?? 0),
                    'stock_before' => $stockBefore,
                    'stock_after' => $stockAfter,
                    'order_id' => $order->order_id,
                    'item_id' => $item->item_id,
                    'transaction_date' => now(),
                    'reference_number' => $payment->payment_number,
                    'notes' => "Retroactive inventory transaction for order {$order->order_number}",
                    'handled_by' => $payment->received_by ?? $payment->verified_by,
                    'approved_by' => $payment->verified_by,
                ]);
                
                $material->update(['stock_quantity' => $stockAfter]);
                
                $this->info("✓ Created transaction for item #{$item->item_id} - Material: {$material->material_name} - Qty: {$quantityNeeded}");
                $this->info("  Stock: {$stockBefore} → {$stockAfter}");
                
                $created++;
            }
            
            DB::commit();
            
            $this->info("\n✓ Successfully created {$created} inventory transaction(s)!");
            return 0;
            
        } catch (\Exception $e) {
            DB::rollBack();
            $this->error("\n❌ Error: " . $e->getMessage());
            return 1;
        }
    }
}
