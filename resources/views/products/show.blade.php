@extends('layouts.app')

@section('title', $product->product_name)

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <nav class="mb-6 text-sm">
        <ol class="flex items-center spac            <li><a href="{{ route('home') }}" class="text-blue-600 hover:underline">Home</a></li>
            <li class="text-gray-400">/</li>
            <li><a href="{{ route('products.index') }}" class="text-blue-600 hover:underline">Produk</a></li>
k</a></li>
            <li class="text-gray-400">/</li>
            <li class="text-gray-600">{{ $product->product_name }}</li>
        </ol>
    </nav>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-12">
        <!-- Product Image -->
        <div>
            <div class="bg-gray-100 rounded-lg h-96 flex items-center justify-center border border-gray-200">
                <svg class="w-32 h-32 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
        </div>

        <!-- Product Details -->
        <div>
            <!-- Category Badge -->
            <div class="mb-3">
                <span class="inline-block px-3 py-1 text-sm font-semibold text-white bg-blue-600 rounded">
                    {{ $product->category->category_name }}
                </span>
            </div>

            <!-- Product Name -->
            <h1 class="text-3xl font-bold text-gray-800 mb-4">
                {{ $product->product_name }}
            </h1>

            <!-- Price -->
            <div class="mb-6">
                <p class="text-sm text-gray-500 mb-1">Harga Dasar</p>
                <p class="text-3xl font-bold text-blue-600">
                    Rp{{ number_format($product->base_price, 0, ',', '.') }}
                    <span class="text-lg font-normal text-gray-600">/ {{ $product->unit }}</span>
                </p>
            </div>

            <!-- Description -->
            <div class="mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi</h3>
                <p class="text-gray-600 leading-relaxed">
                    {{ $product->description ?? 'Produk berkualitas tinggi untuk kebutuhan printing Anda.' }}
                </p>
            </div>

            <!-- Order Form -->
            <form method="POST" action="{{ route('cart.add') }}" class="space-y-4">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->product_id }}">

                <!-- Quantity -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Jumlah ({{ $product->unit }})
                    </label>
                    <input 
                        type="number" 
                        name="quantity" 
                        min="1" 
                        value="1" 
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    >
                </div>

                @if(strtolower($product->unit) == 'm2' || strtolower($product->unit) == 'm²')
                <!-- Dimensions for m2 products -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Lebar (cm)
                        </label>
                        <input 
                            type="number" 
                            name="width" 
                            min="1" 
                            step="0.01"
                            placeholder="100"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tinggi (cm)
                        </label>
                        <input 
                            type="number" 
                            name="height" 
                            min="1" 
                            step="0.01"
                            placeholder="200"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>
                </div>
                @endif

                <!-- Notes -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Catatan Spesifikasi (Opsional)
                    </label>
                    <textarea 
                        name="notes" 
                        rows="3"
                        placeholder="Tambahkan catatan khusus untuk produk ini..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    ></textarea>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4">
                    <button 
                        type="submit" 
                        name="action" 
                        value="add_to_cart"
                        class="flex-1 px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200"
                    >
                        Tambah ke Keranjang
                    </button>
                    <button 
                        type="submit" 
                        name="action" 
                        value="order_now"
                        class="flex-1 px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-200"
                    >
                        Pesan Sekarang
                    </button>
                </div>
            </form>

            <!-- Features -->
            <div class="mt-8 border-t pt-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Keunggulan Produk</h3>
                <ul class="space-y-2">
                    <li class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Kualitas cetak premium
                    </li>
                    <li class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Proses cepat dan efisien
                    </li>
                    <li class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Gratis konsultasi desain
                    </li>
                    <li class="flex items-center text-gray-600">
                        <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Garansi kepuasan pelanggan
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    @if($relatedProducts->count() > 0)
    <div class="mt-12">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Produk Terkait</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($relatedProducts as $related)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="h-40 bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-800 mb-2 line-clamp-2">
                            {{ $related->product_name }}
                        </h3>
                        <p class="text-xl font-bold text-blue-600 mb-3">
                            Rp{{ number_format($related->base_price, 0, ',', '.') }}
                        </p>
                        <a 
                            href="{{ route('products.show', $related->product_id) }}" 
                            class="block text-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200"
                        >
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
