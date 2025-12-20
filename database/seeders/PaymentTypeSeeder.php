<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'type_name' => 'Midtrans',
                'type_code' => 'MIDTRANS',
                'minimum_percentage' => 0,
                'maximum_percentage' => 100,
                'description' => 'Payment via Midtrans',
                'is_active' => true,
            ],
            [
                'type_name' => 'Bank Transfer',
                'type_code' => 'BANK_TRANSFER',
                'minimum_percentage' => 0,
                'maximum_percentage' => 100,
                'description' => 'Payment via Bank Transfer',
                'is_active' => true,
            ],
            [
                'type_name' => 'Cash',
                'type_code' => 'CASH',
                'minimum_percentage' => 0,
                'maximum_percentage' => 100,
                'description' => 'Payment in Cash',
                'is_active' => true,
            ],
        ];

        foreach ($types as $type) {
            PaymentType::firstOrCreate(
                ['type_code' => $type['type_code']],
                $type
            );
        }
    }
}
