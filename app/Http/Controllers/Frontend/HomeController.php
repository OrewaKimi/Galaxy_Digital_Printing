<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil semua produk aktif
        $products = Product::where('is_active', true)->get();
        return view('frontend.home', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('frontend.product_detail', compact('product'));
    }
}
