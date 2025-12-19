<?php

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\Order;
use App\Models\Payment;
use App\Models\InventoryTransaction;

$orderNumber = 'ORDER-1763203918-2515';

$order = Order::where('order_number', $orderNumber)->first();

if (!$order) {
    echo "❌ Order not found\n";
    exit(1);
}

echo "=== ORDER INFO ===\n";
echo "Order Number: {$order->order_number}\n";
echo "Order ID: {$order->order_id}\n";
echo "Total: Rp " . number_format($order->total_price, 0, ',', '.') . "\n";
echo "Paid: Rp " . number_format($order->paid_amount, 0, ',', '.') . "\n";
echo "Remaining: Rp " . number_format($order->remaining_amount, 0, ',', '.') . "\n";
echo "\n";

echo "=== PAYMENTS ===\n";
$payments = Payment::where('order_id', $order->order_id)->get();
if ($payments->count() > 0) {
    foreach ($payments as $payment) {
        echo "✓ {$payment->payment_number} - Rp " . number_format($payment->amount, 0, ',', '.') . " - {$payment->payment_status}\n";
    }
} else {
    echo "❌ No payments found\n";
}
echo "\n";

echo "=== ORDER ITEMS ===\n";
$orderItems = $order->orderItems;
foreach ($orderItems as $item) {
    echo "Item ID: {$item->item_id} - Material ID: " . ($item->material_id ?? 'NULL') . " - Qty: {$item->quantity} - Area: " . ($item->area ?? 'NULL') . "\n";
}
echo "\n";

echo "=== INVENTORY TRANSACTIONS ===\n";
$inventoryTransactions = InventoryTransaction::where('order_id', $order->order_id)->get();
if ($inventoryTransactions->count() > 0) {
    foreach ($inventoryTransactions as $trans) {
        echo "✓ {$trans->transaction_number} - Material: {$trans->material_id} - Qty: {$trans->quantity} - Type: {$trans->transaction_type}\n";
    }
} else {
    echo "❌ No inventory transactions found\n";
    echo "\n";
    echo "POSSIBLE REASONS:\n";
    echo "1. Order items have no material_id assigned\n";
    echo "2. PaymentObserver not triggered\n";
    echo "3. Error in PaymentObserver logic\n";
}
