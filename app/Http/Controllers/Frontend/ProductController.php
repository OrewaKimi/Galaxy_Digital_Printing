<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = ProductCategory::active()->get();
        
        $query = Product::with('category')
            ->active()
            ->latest();

        // Filter by category
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        // Search
        if ($request->has('search') && $request->search != '') {
            $query->where('product_name', 'like', '%' . $request->search . '%');
        }

        $products = $query->paginate(12);

        return view('frontend.products.index', compact('products', 'categories'));
    }

    public function show($id)
    {
        $product = Product::with('category')->active()->findOrFail($id);
        $relatedProducts = Product::active()
            ->where('category_id', $product->category_id)
            ->where('product_id', '!=', $id)
            ->limit(4)
            ->get();

        return view('frontend.products.show', compact('product', 'relatedProducts'));
    }
}