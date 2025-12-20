<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class SeedDatabaseController extends Controller
{
    /**
     * Run seeders to populate required database records
     * This endpoint is for emergency seeding when the database is empty
     * 
     * WARNING: This should only be accessible in production with proper authentication
     */
    public function seed()
    {
        try {
            // Check if we already have order statuses (to avoid duplicate seeding)
            $statusCount = \App\Models\OrderStatus::count();
            $paymentTypeCount = \App\Models\PaymentType::count();

            $response = [
                'status' => 'success',
                'message' => 'Seeding completed',
                'before' => [
                    'order_statuses' => $statusCount,
                    'payment_types' => $paymentTypeCount,
                ],
            ];

            // Only seed if empty
            if ($statusCount === 0) {
                Artisan::call('db:seed', ['--class' => 'Database\Seeders\OrderStatusSeeder']);
                $response['seeded']['order_statuses'] = true;
            }

            if ($paymentTypeCount === 0) {
                Artisan::call('db:seed', ['--class' => 'Database\Seeders\PaymentTypeSeeder']);
                $response['seeded']['payment_types'] = true;
            }

            // Get updated counts
            $response['after'] = [
                'order_statuses' => \App\Models\OrderStatus::count(),
                'payment_types' => \App\Models\PaymentType::count(),
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
