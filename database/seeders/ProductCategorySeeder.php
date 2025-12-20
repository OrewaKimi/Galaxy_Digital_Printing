<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'category_name' => 'Brosur',
                'description' => 'Brosur lipat dan brosur standar',
                'is_active' => true,
            ],
            [
                'category_name' => 'Flyer & Selebaran',
                'description' => 'Flyer dan selebaran promosi',
                'is_active' => true,
            ],
            [
                'category_name' => 'Poster',
                'description' => 'Poster berbagai ukuran',
                'is_active' => true,
            ],
            [
                'category_name' => 'Pakaian',
                'description' => 'Pakaian dan tekstil cetak',
                'is_active' => true,
            ],
            [
                'category_name' => 'Kartu Nama & Kartu',
                'description' => 'Kartu nama dan kartu ucapan',
                'is_active' => true,
            ],
            [
                'category_name' => 'Perlengkapan Kantor',
                'description' => 'Perlengkapan kantor cetak',
                'is_active' => true,
            ],
            [
                'category_name' => 'Stiker',
                'description' => 'Stiker dan label',
                'is_active' => true,
            ],
            [
                'category_name' => 'Pulpen Promosi',
                'description' => 'Pulpen dan barang promosi',
                'is_active' => true,
            ],
            [
                'category_name' => 'Sampel Produk',
                'description' => 'Paket sampel produk',
                'is_active' => true,
            ],
            [
                'category_name' => 'Kalender',
                'description' => 'Kalender dinding dan meja',
                'is_active' => true,
            ],
            [
                'category_name' => 'Spanduk & Banner',
                'description' => 'Spanduk, banner dan x-banner',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            ProductCategory::firstOrCreate(
                ['category_name' => $category['category_name']],
                $category
            );
        }
    }
}
