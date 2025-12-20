<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Tampilkan hanya produk pilihan di homepage
        $productNames = [
            'X-Banner 60x160 cm',
            'Kartu Nama Premium',
            'Sticker Cutting Vinyl',
            'Spanduk Vinyl 340 gsm'
        ];
        
        $products = Product::with('category')
            ->where('is_active', true)
            ->whereIn('product_name', $productNames)
            ->get();
        
        return view('frontend.home', compact('products'));
    }
    
    public function profile()
{
    return view('frontend.profile');
}

    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('product_id', '!=', $id)
            ->where('is_active', true)
            ->limit(4)
            ->get();

        return view('frontend.product_detail', compact('product', 'relatedProducts'));
    }

    public function search(Request $request)
    {
        $query = Product::query()->with('category')->where('is_active', true);

        if ($request->filled('q')) {
            $searchTerm = $request->input('q');
            $query->where(function($q) use ($searchTerm) {
                $q->where('product_name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%")
                  ->orWhereHas('category', function($q) use ($searchTerm) {
                      $q->where('category_name', 'LIKE', "%{$searchTerm}%");
                  });
            });
        }

        if ($request->filled('category')) {
            $category = $request->input('category');
            $query->whereHas('category', function($q) use ($category) {
                $q->where('category_name', 'LIKE', "%{$category}%");
            });
        }

        if ($request->filled('min_price')) {
            $query->where('base_price', '>=', $request->input('min_price'));
        }

        if ($request->filled('max_price')) {
            $query->where('base_price', '<=', $request->input('max_price'));
        }

        $sortBy = $request->input('sort', 'latest');
        match($sortBy) {
            'price_low' => $query->orderBy('base_price', 'asc'),
            'price_high' => $query->orderBy('base_price', 'desc'),
            'name' => $query->orderBy('product_name', 'asc'),
            default => $query->latest(),
        };

        $products = $query->paginate(12)->withQueryString();
        $categories = ProductCategory::where('is_active', true)->get();

        return view('products.index', compact('products', 'categories'));
    }
}
