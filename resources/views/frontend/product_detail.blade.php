@extends('layouts.app')

@section('title', $product->product_name . ' - Galaxy Digital Printing')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gray-50 py-4">
    <div class="container mx-auto px-4">
        <nav class="text-sm">
            <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-700">Home</a>
            <span class="mx-2 text-gray-400">/</span>
            <a href="#" class="text-blue-600 hover:text-blue-700">{{ $product->category->category_name ?? 'Produk' }}</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="text-gray-600">{{ $product->product_name }}</span>
        </nav>
    </div>
</div>

<!-- Alert Messages -->
@if(session('error'))
    <div class="container mx-auto px-4 mt-4">
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 px-4 py-3 rounded relative" role="alert">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                <span class="font-bold mr-2">Error!</span>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    </div>
@endif

@if(session('success'))
    <div class="container mx-auto px-4 mt-4">
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3 rounded relative" role="alert">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                <span class="font-bold mr-2">Success!</span>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    </div>
@endif

@php
    // Map product names to image files
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
    
    $mainImagePath = asset('images/products/' . $imageName);
@endphp

<!-- Product Detail Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Product Image Gallery -->
            <div>
                <!-- Main Image -->
                <div class="bg-gray-100 rounded-lg overflow-hidden mb-4 aspect-square flex items-center justify-center">
                    <img src="{{ $mainImagePath }}" 
                         alt="{{ $product->product_name }}" 
                         id="main-image"
                         class="w-full h-full object-cover"
                         onerror="this.onerror=null; this.src='{{ asset('images/products/default-product.jpg') }}';">
                </div>

                <!-- Thumbnail Gallery -->
                <div class="grid grid-cols-4 gap-2">
                    <div class="bg-gray-100 rounded-lg overflow-hidden aspect-square cursor-pointer hover:ring-2 hover:ring-blue-500" onclick="changeImage('{{ $mainImagePath }}')">
                        <img src="{{ $mainImagePath }}" alt="Thumbnail 1" class="w-full h-full object-cover">
                    </div>
                    <div class="bg-gray-100 rounded-lg overflow-hidden aspect-square cursor-pointer hover:ring-2 hover:ring-blue-500" onclick="changeImage('{{ asset('images/products/printing-machine.jpg') }}')">
                        <img src="{{ asset('images/products/printing-machine.jpg') }}" 
                             alt="Thumbnail 2" 
                             class="w-full h-full object-cover"
                             onerror="this.src='{{ $mainImagePath }}';">
                    </div>
                    <div class="bg-gray-100 rounded-lg overflow-hidden aspect-square cursor-pointer hover:ring-2 hover:ring-blue-500" onclick="changeImage('{{ asset('images/products/detail-1.jpg') }}')">
                        <img src="{{ asset('images/products/detail-1.jpg') }}" 
                             alt="Thumbnail 3" 
                             class="w-full h-full object-cover"
                             onerror="this.src='{{ $mainImagePath }}';">
                    </div>
                    <div class="bg-gray-100 rounded-lg overflow-hidden aspect-square cursor-pointer hover:ring-2 hover:ring-blue-500" onclick="changeImage('{{ asset('images/products/detail-2.jpg') }}')">
                        <img src="{{ asset('images/products/detail-2.jpg') }}" 
                             alt="Thumbnail 4" 
                             class="w-full h-full object-cover"
                             onerror="this.src='{{ $mainImagePath }}';">
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div>
                <div class="mb-4">
                    <span class="inline-block bg-blue-100 text-blue-800 text-sm font-semibold px-3 py-1 rounded-full">
                        {{ $product->category->category_name ?? 'Uncategorized' }}
                    </span>
                </div>

                <h1 class="text-4xl font-bold text-gray-800 mb-4">{{ $product->product_name }}</h1>

                <!-- Rating -->
                <div class="flex items-center mb-6">
                    <div class="flex text-yellow-400 mr-2">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                    </div>
                    <span class="text-gray-600 text-sm">(128 ulasan)</span>
                </div>

                <!-- Price -->
                <div class="mb-8 pb-8 border-b">
                    <div class="flex items-baseline gap-3">
                        <span class="text-4xl font-bold text-blue-600">
                            Rp{{ number_format($product->base_price, 0, ',', '.') }}
                        </span>
                        <span class="text-gray-500 text-lg">/ {{ $product->unit }}</span>
                    </div>
                    <p class="text-sm text-green-600 mt-2">✓ Harga termasuk PPN</p>
                </div>

                <!-- Description -->
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-800 mb-3">Deskripsi Produk</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ $product->description ?? 'Produk berkualitas tinggi dengan hasil cetak profesional. Cocok untuk berbagai kebutuhan bisnis dan personal. Dengan teknologi printing terkini, kami menjamin kualitas terbaik untuk setiap order Anda.' }}
                    </p>
                </div>

                <!-- Features -->
                <div class="mb-8 bg-gray-50 rounded-lg p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Keunggulan Produk:</h3>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Kualitas cetak tinggi dengan warna tajam</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Proses pengerjaan cepat (same day service tersedia)</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Material berkualitas dan tahan lama</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Harga kompetitif dengan hasil maksimal</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-gray-700">Gratis konsultasi desain</span>
                        </li>
                    </ul>
                </div>

                <!-- Action Buttons -->
                <div class="space-y-4">
                    <!-- Main Buy Button -->
                    <form action="{{ route('checkout-process') }}" method="POST" id="checkout-form">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->product_id }}">
                        <input type="hidden" name="price" value="{{ $product->base_price }}">
                        
                        <button type="submit" id="buy-button"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
                            <span id="button-text" class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                Beli Sekarang
                            </span>
                            <span id="button-loading" class="hidden flex items-center justify-center">
                                <svg class="animate-spin h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Memproses...
                            </span>
                        </button>
                    </form>

                    <!-- Secondary Actions -->
                    <div class="grid grid-cols-2 gap-4">
                        <button class="flex items-center justify-center gap-2 border-2 border-gray-300 hover:border-blue-600 text-gray-700 hover:text-blue-600 font-semibold py-3 px-4 rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                            Favorit
                        </button>
                        <button class="flex items-center justify-center gap-2 border-2 border-gray-300 hover:border-blue-600 text-gray-700 hover:text-blue-600 font-semibold py-3 px-4 rounded-lg transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                            </svg>
                            Bagikan
                        </button>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="mt-8 pt-8 border-t">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-2">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <p class="text-sm font-semibold text-gray-800">Garansi Kualitas</p>
                            <p class="text-xs text-gray-600">100% Satisfaction</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-2">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <p class="text-sm font-semibold text-gray-800">Pengerjaan Cepat</p>
                            <p class="text-xs text-gray-600">Same Day Available</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center mb-2">
                                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                </svg>
                            </div>
                            <p class="text-sm font-semibold text-gray-800">Pembayaran Mudah</p>
                            <p class="text-xs text-gray-600">Multiple Payment</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Specifications Section -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Spesifikasi Produk</h2>
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="w-full">
                <tbody class="divide-y divide-gray-200">
                    <tr>
                        <td class="px-6 py-4 font-semibold text-gray-800 bg-gray-50 w-1/4">Kategori</td>
                        <td class="px-6 py-4 text-gray-600">{{ $product->category->category_name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-semibold text-gray-800 bg-gray-50">Satuan</td>
                        <td class="px-6 py-4 text-gray-600">{{ $product->unit }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-semibold text-gray-800 bg-gray-50">Harga Dasar</td>
                        <td class="px-6 py-4 text-gray-600">Rp{{ number_format($product->base_price, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-semibold text-gray-800 bg-gray-50">Status</td>
                        <td class="px-6 py-4">
                            @if($product->is_active)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                    Tersedia
                                </span>
                            @else
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                    <span class="w-2 h-2 bg-red-500 rounded-full mr-2"></span>
                                    Tidak Tersedia
                                </span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-semibold text-gray-800 bg-gray-50">Material</td>
                        <td class="px-6 py-4 text-gray-600">Art Paper, Vinyl, Canvas (Sesuai Pilihan)</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 font-semibold text-gray-800 bg-gray-50">Finishing</td>
                        <td class="px-6 py-4 text-gray-600">Glossy, Matte, Laminating (Opsional)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- Related Products Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-800 mb-8">Produk Terkait</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @for($i = 1; $i <= 4; $i++)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 group">
                <div class="relative">
                    <div class="h-64 bg-gray-200 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('images/products/default-product.jpg') }}" 
                             alt="Product {{ $i }}" 
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                             onerror="this.style.display='none';">
                    </div>
                    <button class="absolute top-4 right-4 bg-white p-2 rounded-full shadow-md hover:bg-red-50 transition-colors">
                        <svg class="w-5 h-5 text-gray-600 hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </button>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-gray-800 mb-2 group-hover:text-blue-600 transition-colors">Produk Terkait {{ $i }}</h3>
                    <p class="text-sm text-gray-600 mb-3 line-clamp-2">Deskripsi singkat produk yang menarik perhatian pelanggan</p>
                    <div class="flex items-center justify-between">
                        <span class="text-xl font-bold text-blue-600">Rp75.000</span>
                        <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition-colors">
                            Detail
                        </a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>

<!-- Customer Reviews Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Ulasan Pelanggan</h2>
            <div class="flex items-center gap-4">
                <div class="flex text-yellow-400">
                    @for($i = 0; $i < 5; $i++)
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 20 20">
                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                    </svg>
                    @endfor
                </div>
                <span class="text-gray-600 font-semibold">4.9 dari 5 (128 ulasan)</span>
            </div>
        </div>

        <div class="space-y-6">
            @for($i = 1; $i <= 3; $i++)
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                            P{{ $i }}
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Pelanggan {{ $i }}</h4>
                            <p class="text-sm text-gray-500">{{ rand(1, 30) }} hari yang lalu</p>
                        </div>
                    </div>
                    <div class="flex text-yellow-400">
                        @for($j = 0; $j < 5; $j++)
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                            <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                        </svg>
                        @endfor
                    </div>
                </div>
                <p class="text-gray-600 leading-relaxed">
                    Hasil cetaknya sangat memuaskan! Kualitas warna tajam dan material yang digunakan bagus. Pengerjaan juga cepat, recommended banget untuk kebutuhan printing.
                </p>
            </div>
            @endfor
        </div>

        <div class="text-center mt-8">
            <button class="border-2 border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white font-semibold py-3 px-8 rounded-lg transition-colors">
                Lihat Semua Ulasan
            </button>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    // Loading button effect
    document.getElementById('checkout-form').addEventListener('submit', function() {
        const button = document.getElementById('buy-button');
        const buttonText = document.getElementById('button-text');
        const buttonLoading = document.getElementById('button-loading');
        
        button.disabled = true;
        button.classList.add('opacity-75', 'cursor-not-allowed');
        buttonText.classList.add('hidden');
        buttonLoading.classList.remove('hidden');
    });

    // Image gallery function
    function changeImage(imageSrc) {
        document.getElementById('main-image').src = imageSrc;
    }
</script>
@endsection