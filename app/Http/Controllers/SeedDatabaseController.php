<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class SeedDatabaseController extends Controller
{
    /**
     * Run seeders to populate required database records
     */
    public function seed()
    {
        try {
            $statusCount = \App\Models\OrderStatus::count();
            $paymentTypeCount = \App\Models\PaymentType::count();

            $response = [
                'status' => 'success',
                'message' => 'Seeding completed',
                'before' => [
                    'order_statuses' => $statusCount,
                    'payment_types' => $paymentTypeCount,
                ],
                'seeded' => [],
            ];

            // Seed OrderStatus if empty
            if ($statusCount === 0) {
                Artisan::call('db:seed', ['--class' => 'Database\Seeders\OrderStatusSeeder']);
                $response['seeded']['order_statuses'] = true;
            }

            // Seed PaymentType if empty - dengan direct insert jika seeder gagal
            if ($paymentTypeCount === 0) {
                try {
                    Artisan::call('db:seed', ['--class' => 'Database\Seeders\PaymentTypeSeeder']);
                    $response['seeded']['payment_types'] = 'via_seeder';
                } catch (\Exception $e) {
                    Log::warning('PaymentTypeSeeder failed, trying direct insert', ['error' => $e->getMessage()]);
                    // Direct insert sebagai fallback
                    $types = [
                        ['type_name' => 'Midtrans', 'type_code' => 'MIDTRANS', 'minimum_percentage' => 0, 'maximum_percentage' => 100, 'description' => 'Payment via Midtrans', 'is_active' => true],
                        ['type_name' => 'Bank Transfer', 'type_code' => 'BANK_TRANSFER', 'minimum_percentage' => 0, 'maximum_percentage' => 100, 'description' => 'Payment via Bank Transfer', 'is_active' => true],
                        ['type_name' => 'Cash', 'type_code' => 'CASH', 'minimum_percentage' => 0, 'maximum_percentage' => 100, 'description' => 'Payment in Cash', 'is_active' => true],
                    ];

                    foreach ($types as $type) {
                        PaymentType::firstOrCreate(
                            ['type_code' => $type['type_code']],
                            $type
                        );
                    }
                    $response['seeded']['payment_types'] = 'via_direct_insert';
                }
            }

            // Get updated counts
            $response['after'] = [
                'order_statuses' => \App\Models\OrderStatus::count(),
                'payment_types' => \App\Models\PaymentType::count(),
            ];

            return response()->json($response);
        } catch (\Exception $e) {
            Log::error('Seeding error', ['message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ], 500);
        }
    }

    /**
     * Manual insert payment types jika seeding gagal
     */
    public function insertPaymentTypes()
    {
        try {
            $types = [
                ['type_name' => 'Midtrans', 'type_code' => 'MIDTRANS'],
                ['type_name' => 'Bank Transfer', 'type_code' => 'BANK_TRANSFER'],
                ['type_name' => 'Cash', 'type_code' => 'CASH'],
            ];

            foreach ($types as $type) {
                $existing = PaymentType::where('type_code', $type['type_code'])->first();
                if (!$existing) {
                    PaymentType::create([
                        'type_name' => $type['type_name'],
                        'type_code' => $type['type_code'],
                        'minimum_percentage' => 0,
                        'maximum_percentage' => 100,
                        'description' => 'Payment via ' . $type['type_name'],
                        'is_active' => true,
                    ]);
                }
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Payment types inserted',
                'count' => PaymentType::count(),
            ]);
        } catch (\Exception $e) {
            Log::error('Insert payment types error', ['message' => $e->getMessage()]);
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
