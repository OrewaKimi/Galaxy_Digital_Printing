<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Brosur
        $brosur = ProductCategory::where('category_name', 'Brosur')->first();
        if ($brosur) {
            Product::firstOrCreate(
                ['product_name' => 'Brosur A4 Lipat 3'],
                [
                    'category_id' => $brosur->category_id,
                    'base_price' => 45000,
                    'description' => 'Brosur A4 dengan lipatan 3, cetak full color',
                    'unit' => 'pcs',
                    'is_active' => true,
                ]
            );
            Product::firstOrCreate(
                ['product_name' => 'Brosur A5 Lipat 2'],
                [
                    'category_id' => $brosur->category_id,
                    'base_price' => 25000,
                    'description' => 'Brosur A5 dengan lipatan 2',
                    'unit' => 'pcs',
                    'is_active' => true,
                ]
            );
        }

        // Flyer
        $flyer = ProductCategory::where('category_name', 'Flyer & Selebaran')->first();
        if ($flyer) {
            Product::firstOrCreate(
                ['product_name' => 'Flyer A5'],
                [
                    'category_id' => $flyer->category_id,
                    'base_price' => 15000,
                    'description' => 'Flyer ukuran A5, full color',
                    'unit' => 'pcs',
                    'is_active' => true,
                ]
            );
            Product::firstOrCreate(
                ['product_name' => 'Flyer A4'],
                [
                    'category_id' => $flyer->category_id,
                    'base_price' => 25000,
                    'description' => 'Flyer ukuran A4, full color',
                    'unit' => 'pcs',
                    'is_active' => true,
                ]
            );
        }

        // Poster
        $poster = ProductCategory::where('category_name', 'Poster')->first();
        if ($poster) {
            Product::firstOrCreate(
                ['product_name' => 'Poster A3'],
                [
                    'category_id' => $poster->category_id,
                    'base_price' => 35000,
                    'description' => 'Poster ukuran A3',
                    'unit' => 'pcs',
                    'is_active' => true,
                ]
            );
            Product::firstOrCreate(
                ['product_name' => 'Poster A2'],
                [
                    'category_id' => $poster->category_id,
                    'base_price' => 55000,
                    'description' => 'Poster ukuran A2',
                    'unit' => 'pcs',
                    'is_active' => true,
                ]
            );
        }

        // Pakaian
        $pakaian = ProductCategory::where('category_name', 'Pakaian')->first();
        if ($pakaian) {
            Product::firstOrCreate(
                ['product_name' => 'Kaos Custom'],
                [
                    'category_id' => $pakaian->category_id,
                    'base_price' => 85000,
                    'description' => 'Kaos custom sablon full color',
                    'unit' => 'pcs',
                    'is_active' => true,
                ]
            );
            Product::firstOrCreate(
                ['product_name' => 'Hoodie Custom'],
                [
                    'category_id' => $pakaian->category_id,
                    'base_price' => 165000,
                    'description' => 'Hoodie custom sablon',
                    'unit' => 'pcs',
                    'is_active' => true,
                ]
            );
        }

        // Kartu Nama
        $kartuNama = ProductCategory::where('category_name', 'Kartu Nama & Kartu')->first();
        if ($kartuNama) {
            Product::firstOrCreate(
                ['product_name' => 'Kartu Nama Standard'],
                [
                    'category_id' => $kartuNama->category_id,
                    'base_price' => 35000,
                    'description' => 'Kartu nama 90x50mm, cetak full color',
                    'unit' => 'rim',
                    'is_active' => true,
                ]
            );
            Product::firstOrCreate(
                ['product_name' => 'Kartu Ucapan'],
                [
                    'category_id' => $kartuNama->category_id,
                    'base_price' => 45000,
                    'description' => 'Kartu ucapan custom',
                    'unit' => 'pcs',
                    'is_active' => true,
                ]
            );
        }

        // Perlengkapan Kantor
        $kantorung = ProductCategory::where('category_name', 'Perlengkapan Kantor')->first();
        if ($kantorung) {
            Product::firstOrCreate(
                ['product_name' => 'Kop Surat'],
                [
                    'category_id' => $kantorung->category_id,
                    'base_price' => 25000,
                    'description' => 'Kop surat A4, cetak full color',
                    'unit' => 'rim',
                    'is_active' => true,
                ]
            );
            Product::firstOrCreate(
                ['product_name' => 'Map Snelhecter'],
                [
                    'category_id' => $kantorung->category_id,
                    'base_price' => 12000,
                    'description' => 'Map snelhecter untuk dokumen',
                    'unit' => 'pcs',
                    'is_active' => true,
                ]
            );
        }

        // Stiker
        $stiker = ProductCategory::where('category_name', 'Stiker')->first();
        if ($stiker) {
            Product::firstOrCreate(
                ['product_name' => 'Stiker Vinyl'],
                [
                    'category_id' => $stiker->category_id,
                    'base_price' => 8000,
                    'description' => 'Stiker vinyl custom',
                    'unit' => 'pcs',
                    'is_active' => true,
                ]
            );
            Product::firstOrCreate(
                ['product_name' => 'Label Produk'],
                [
                    'category_id' => $stiker->category_id,
                    'base_price' => 15000,
                    'description' => 'Label produk custom cetak',
                    'unit' => 'pcs',
                    'is_active' => true,
                ]
            );
        }

        // Pulpen Promosi
        $pulpen = ProductCategory::where('category_name', 'Pulpen Promosi')->first();
        if ($pulpen) {
            Product::firstOrCreate(
                ['product_name' => 'Pulpen Promosi'],
                [
                    'category_id' => $pulpen->category_id,
                    'base_price' => 5000,
                    'description' => 'Pulpen dengan sablon logo perusahaan',
                    'unit' => 'pcs',
                    'is_active' => true,
                ]
            );
            Product::firstOrCreate(
                ['product_name' => 'Totebag Promosi'],
                [
                    'category_id' => $pulpen->category_id,
                    'base_price' => 45000,
                    'description' => 'Totebag dengan sablon custom',
                    'unit' => 'pcs',
                    'is_active' => true,
                ]
            );
        }

        // Sampel Produk
        $sampel = ProductCategory::where('category_name', 'Sampel Produk')->first();
        if ($sampel) {
            Product::firstOrCreate(
                ['product_name' => 'Paket Sampel Kertas'],
                [
                    'category_id' => $sampel->category_id,
                    'base_price' => 50000,
                    'description' => 'Paket sampel berbagai jenis kertas cetak',
                    'unit' => 'paket',
                    'is_active' => true,
                ]
            );
        }

        // Kalender
        $kalender = ProductCategory::where('category_name', 'Kalender')->first();
        if ($kalender) {
            Product::firstOrCreate(
                ['product_name' => 'Kalender Dinding'],
                [
                    'category_id' => $kalender->category_id,
                    'base_price' => 65000,
                    'description' => 'Kalender dinding custom',
                    'unit' => 'pcs',
                    'is_active' => true,
                ]
            );
            Product::firstOrCreate(
                ['product_name' => 'Kalender Meja'],
                [
                    'category_id' => $kalender->category_id,
                    'base_price' => 35000,
                    'description' => 'Kalender meja custom',
                    'unit' => 'pcs',
                    'is_active' => true,
                ]
            );
        }
    }
}
