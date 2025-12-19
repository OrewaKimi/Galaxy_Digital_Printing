<?php

namespace App\Observers;

use App\Models\Payment;
use App\Models\InventoryTransaction;
use App\Models\Material;
use Illuminate\Support\Facades\Log;

class PaymentObserver
{
    public function created(Payment $payment)
    {
        if ($payment->payment_status === 'completed') {
            $this->createInventoryTransactions($payment);
        }
    }

    public function updated(Payment $payment)
    {
        if ($payment->payment_status === 'completed' && $payment->isDirty('payment_status')) {
            $this->createInventoryTransactions($payment);
        }
    }

    private function createInventoryTransactions(Payment $payment)
    {
        try {
            $order = $payment->order;
            
            if (!$order) {
                Log::warning('Payment has no associated order', ['payment_id' => $payment->payment_id]);
                return;
            }

            $orderItems = $order->orderItems()->with(['material', 'product'])->get();

            foreach ($orderItems as $item) {
                if (!$item->material_id) {
                    continue;
                }

                $material = $item->material;
                
                if (!$material) {
                    Log::warning('OrderItem material not found', ['item_id' => $item->item_id]);
                    continue;
                }

                $quantityNeeded = ($item->area ?? $item->quantity) ?: $item->quantity;

                $stockBefore = $material->stock_quantity;
                $stockAfter = $stockBefore - $quantityNeeded;

                $productName = $item->product ? $item->product->product_name : 'Product';

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
                    'notes' => "Penggunaan material untuk order #{$order->order_number} - {$productName}",
                    'handled_by' => $payment->received_by ?? $payment->verified_by,
                    'approved_by' => $payment->verified_by,
                ]);

                $material->update([
                    'stock_quantity' => $stockAfter
                ]);

                Log::info('InventoryTransaction created for payment', [
                    'payment_id' => $payment->payment_id,
                    'order_id' => $order->order_id,
                    'item_id' => $item->item_id,
                    'material_id' => $item->material_id,
                    'quantity' => $quantityNeeded
                ]);
            }
        } catch (\Exception $e) {
            Log::error('Failed to create inventory transactions', [
                'payment_id' => $payment->payment_id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }
}
