@extends('layouts.app')

@section('title', 'Produk Kami - onlineprinters')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Produk Kami</h1>
        <p class="text-gray-600">Pilih produk printing terbaik untuk kebutuhan Anda</p>
    </div>

    <!-- Filter & Search -->
    <div class="mb-8 bg-white rounded-lg shadow-md p-6">
        <form method="GET" action="{{ route('products.search') }}" class="space-y-4">
            <!-- Search -->
            <div class="flex-1">
                <input 
                    type="text" 
                    name="q" 
                    value="{{ request('q') }}"
                    placeholder="Cari produk..." 
                    class="w-full px-4 py-3 border border-gray-300 rounded focus:ring-2 focus:ring-[#4a6741] focus:border-[#4a6741]"
                >
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Category Filter -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori</label>
                    <select 
                        name="category" 
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-[#4a6741] focus:border-[#4a6741]"
                    >
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->category_name }}" 
                                {{ request('category') == $category->category_name ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Price Range -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Harga Minimum</label>
                    <input 
                        type="number" 
                        name="min_price" 
                        value="{{ request('min_price') }}"
                        placeholder="0" 
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-[#4a6741]"
                    >
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Harga Maximum</label>
                    <input 
                        type="number" 
                        name="max_price" 
                        value="{{ request('max_price') }}"
                        placeholder="999999999" 
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-[#4a6741]"
                    >
                </div>

                <!-- Sort -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Urutkan</label>
                    <select 
                        name="sort" 
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-[#4a6741]"
                    >
                        <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Terbaru</option>
                        <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Harga Terendah</option>
                        <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Harga Tertinggi</option>
                        <option value="name" {{ request('sort') == 'name' ? 'selected' : '' }}>Nama (A-Z)</option>
                    </select>
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-3">
                <button 
                    type="submit" 
                    class="bg-[#4a6741] hover:bg-[#3a5631] text-white font-semibold px-6 py-2 rounded transition-colors"
                >
                    Terapkan Filter
                </button>

                @if(request()->hasAny(['q', 'category', 'min_price', 'max_price', 'sort']))
                    <a 
                        href="{{ route('products.search') }}" 
                        class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-6 py-2 rounded transition-colors"
                    >
                        Reset Filter
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Products Grid -->
    @if($products->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-8">
            @foreach($products as $product)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <!-- Product Image -->
                    <div class="h-56 bg-gray-50 flex items-center justify-center overflow-hidden relative">
                        @php
                            $imageMap = [
                                'spanduk vinyl' => 'spanduk-vinyl.jpg',
                                'sticker cutting' => 'sticker-cutting.jpg',
                                'kartu nama' => 'kartu-nama.jpg',
                                'x-banner' => 'x-banner.jpg',
                                'backdrop custom' => 'backdrop-custom.jpg',
                            ];
                            
                            $productNameLower = strtolower($product->product_name);
                            $imageName = 'default-product.jpg';
                            
                            foreach ($imageMap as $key => $value) {
                                if (str_contains($productNameLower, $key)) {
                                    $imageName = $value;
                                    break;
                                }
                            }
                            
                            $imagePath = asset('images/products/' . $imageName);
                        @endphp
                        
                        <img src="{{ $imagePath }}" 
                             alt="{{ $product->product_name }}" 
                             class="w-full h-full object-cover transition-transform duration-300 hover:scale-105"
                             loading="lazy"
                             onerror="this.onerror=null; this.src='{{ asset('images/products/default-product.jpg') }}';">
                        
                        <!-- Category Badge -->
                        @if($product->category)
                            <div class="absolute top-3 left-3 bg-[#4a6741] text-white text-xs font-semibold px-3 py-1 rounded z-20">
                                {{ $product->category->category_name }}
                            </div>
                        @endif
                    </div>

                    <!-- Product Info -->
                    <div class="p-4">
                        <!-- Product Name -->
                        <h3 class="text-base font-bold text-gray-800 mb-2 line-clamp-2 hover:text-[#4a6741] transition-colors">
                            {{ $product->product_name }}
                        </h3>

                        <!-- Description -->
                        <p class="text-sm text-gray-600 mb-3 line-clamp-2">
                            {{ $product->description ?? 'Produk berkualitas tinggi dengan hasil cetak profesional' }}
                        </p>

                        <!-- Price & Unit -->
                        <div class="mb-3 pb-3 border-b border-gray-200">
                            <div class="flex items-baseline gap-2">
                                <span class="text-xl font-bold text-[#4a6741]">
                                    Rp{{ number_format($product->base_price, 0, ',', '.') }}
                                </span>
                                <span class="text-xs text-gray-500">/ {{ $product->unit }}</span>
                            </div>
                        </div>

                        <!-- Action Button -->
                        <a 
                            href="{{ route('product', $product->product_id) }}" 
                            class="block w-full text-center bg-[#4a6741] hover:bg-[#3a5631] text-white font-semibold py-2.5 px-4 rounded transition-colors text-sm"
                        >
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    @else
        <div class="text-center py-16">
            <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
            </svg>
            <p class="text-xl text-gray-500">Tidak ada produk ditemukan</p>
            <a href="{{ route('products.search') }}" class="mt-4 inline-block text-blue-600 hover:underline">
                Lihat semua produk
            </a>
        </div>
    @endif
</div>
@endsection