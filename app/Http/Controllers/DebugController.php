<?php

namespace App\Http\Controllers;

use App\Models\OrderStatus;
use App\Models\Order;
use App\Models\PaymentType;
use Illuminate\Support\Facades\DB;

class DebugController extends Controller
{
    /**
     * Check if required statuses exist
     */
    public function checkStatuses()
    {
        $statuses = OrderStatus::all();
        
        return response()->json([
            'total_statuses' => $statuses->count(),
            'statuses' => $statuses->map(fn($s) => [
                'status_id' => $s->status_id,
                'status_name' => $s->status_name,
                'status_code' => $s->status_code,
            ]),
            'payment_confirmed_exists' => OrderStatus::where('status_code', 'PAYMENT_CONFIRMED')->exists(),
            'pending_payment_exists' => OrderStatus::where('status_code', 'PENDING_PAYMENT')->exists(),
        ]);
    }

    /**
     * Check payment types
     */
    public function checkPaymentTypes()
    {
        $types = PaymentType::all();
        
        return response()->json([
            'total_types' => $types->count(),
            'types' => $types->map(fn($t) => [
                'payment_type_id' => $t->payment_type_id,
                'type_name' => $t->type_name,
            ]),
        ]);
    }

    /**
     * Check current orders status
     */
    public function checkOrders()
    {
        $orders = Order::with('orderStatus')->limit(10)->get();
        
        return response()->json([
            'total_orders' => Order::count(),
            'orders' => $orders->map(fn($o) => [
                'order_id' => $o->order_id,
                'order_number' => $o->order_number,
                'status_id' => $o->status_id,
                'status_name' => $o->orderStatus->status_name ?? 'Unknown',
                'status_code' => $o->orderStatus->status_code ?? 'Unknown',
                'total_price' => $o->total_price,
                'paid_amount' => $o->paid_amount,
            ]),
        ]);
    }
}
