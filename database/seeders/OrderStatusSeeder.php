<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            [
                'status_name' => 'Pending Payment',
                'status_code' => 'PENDING_PAYMENT',
                'description' => 'Menunggu pembayaran dari pelanggan',
                'color' => '#FFC107',
                'sequence_order' => 1,
                'is_active' => true,
            ],
            [
                'status_name' => 'Payment Confirmed',
                'status_code' => 'PAYMENT_CONFIRMED',
                'description' => 'Pembayaran sudah dikonfirmasi',
                'color' => '#4CAF50',
                'sequence_order' => 2,
                'is_active' => true,
            ],
            [
                'status_name' => 'Processing',
                'status_code' => 'PROCESSING',
                'description' => 'Sedang diproses di produksi',
                'color' => '#2196F3',
                'sequence_order' => 3,
                'is_active' => true,
            ],
            [
                'status_name' => 'Ready for Shipment',
                'status_code' => 'READY_SHIPMENT',
                'description' => 'Siap dikirim',
                'color' => '#00BCD4',
                'sequence_order' => 4,
                'is_active' => true,
            ],
            [
                'status_name' => 'Shipped',
                'status_code' => 'SHIPPED',
                'description' => 'Sudah dikirim',
                'color' => '#009688',
                'sequence_order' => 5,
                'is_active' => true,
            ],
            [
                'status_name' => 'Delivered',
                'status_code' => 'DELIVERED',
                'description' => 'Sudah sampai tujuan',
                'color' => '#4CAF50',
                'sequence_order' => 6,
                'is_active' => true,
            ],
            [
                'status_name' => 'Cancelled',
                'status_code' => 'CANCELLED',
                'description' => 'Pesanan dibatalkan',
                'color' => '#F44336',
                'sequence_order' => 7,
                'is_active' => true,
            ],
            [
                'status_name' => 'Return/Refund',
                'status_code' => 'RETURN_REFUND',
                'description' => 'Pengembalian/Pengembalian dana',
                'color' => '#FF9800',
                'sequence_order' => 8,
                'is_active' => true,
            ],
        ];

        foreach ($statuses as $status) {
            OrderStatus::firstOrCreate(
                ['status_code' => $status['status_code']],
                $status
            );
        }
    }
}
