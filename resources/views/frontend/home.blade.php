@extends('layouts.app')

@section('title', 'Galaxy Digital Printing - Percetakan Digital Berkualitas')

@section('content')
<!-- Hero Slider Section -->
<section class="relative">
    <div class="relative h-[500px] overflow-hidden">
        <!-- Slide 1 -->
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900 to-gray-700">
            <div class="container mx-auto px-4 h-full flex items-center">
                <div class="max-w-xl text-white">
                    <h1 class="text-5xl font-bold mb-4">Siap untuk Event & Pameran Anda</h1>
                    <p class="text-xl mb-6">Dapatkan hasil cetak berkualitas tinggi untuk kebutuhan event, konferensi, atau pameran dagang Anda!</p>
                    <a href="#products" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-lg transition-colors">
                        Lihat Produk
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Feature Cards Section -->
<section class="py-12 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-amber-100 rounded-lg p-6 hover:shadow-lg transition-shadow">
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Sampel Set Terbaru</h3>
                <p class="text-gray-600 mb-4">Selalu tersedia untuk Anda</p>
                <a href="#" class="text-blue-600 hover:text-blue-700 font-semibold">Pesan sekarang →</a>
            </div>

            <!-- Card 2 -->
            <div class="bg-gray-200 rounded-lg p-6 hover:shadow-lg transition-shadow">
                <h3 class="text-2xl font-bold text-gray-800 mb-3">Kebutuhan Kantor Anda</h3>
                <p class="text-gray-600 mb-4">Produk penting untuk ruang kerja</p>
                <a href="#" class="text-blue-600 hover:text-blue-700 font-semibold">Lihat produk →</a>
            </div>

            <!-- Card 3 -->
            <div class="bg-green-900 text-white rounded-lg p-6 hover:shadow-lg transition-shadow">
                <h3 class="text-2xl font-bold mb-3">PrintQuickCheck</h3>
                <p class="mb-4">Upload file artwork Anda dan dapatkan feedback instan apakah file dapat dicetak</p>
                <a href="#" class="inline-block bg-white text-green-900 font-semibold py-2 px-6 rounded hover:bg-gray-100 transition-colors">
                    Cek File Sekarang
                </a>
                <div class="mt-4 space-y-2">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>PDF</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>300 dpi</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span>CMYK</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- USP Section -->
<section class="py-8 bg-white border-b">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 text-center">
            <div class="flex flex-col items-center">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mb-3">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                </div>
                <p class="text-sm text-gray-600">Produksi In-house</p>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mb-3">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <p class="text-sm text-gray-600">Produksi same day & pengiriman</p>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center mb-3">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                    </svg>
                </div>
                <p class="text-sm text-gray-600">Pembelian dengan akun</p>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center mb-3">
                    <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <p class="text-sm text-gray-600">1.5 juta pelanggan puas</p>
            </div>
        </div>
    </div>
</section>

<!-- Products Section - DATA DARI DATABASE -->
<section class="py-16 bg-gray-50" id="products">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-gray-800">Produk Kami</h2>
            @if($products->count() > 8)
                <a href="#" class="text-blue-600 hover:text-blue-700 font-semibold">LIHAT SEMUA →</a>
            @endif
        </div>

        @if($products->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($products as $product)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">
                        <!-- Product Image -->
                        <div class="h-64 overflow-hidden relative">
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
                                
                                $imagePath = asset('images/products/' . $imageName);
                            @endphp
                            
                            <img src="{{ $imagePath }}" 
                                 alt="{{ $product->product_name }}" 
                                 class="w-full h-full object-cover transition-transform duration-300 hover:scale-110"
                                 onerror="this.onerror=null; this.src='{{ asset('images/products/default-product.jpg') }}';">
                            
                            <!-- Category Badge -->
                            @if($product->category)
                                <div class="absolute top-3 left-3 bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full z-20">
                                    {{ $product->category->category_name }}
                                </div>
                            @endif
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-5">
                            <h4 class="text-lg font-bold text-gray-800 mb-2 line-clamp-2 hover:text-blue-600 transition-colors">
                                {{ $product->product_name }}
                            </h4>
                            
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                {{ $product->description ?? 'Produk berkualitas tinggi dengan hasil cetak profesional untuk kebutuhan bisnis dan personal Anda.' }}
                            </p>
                            
                            <!-- Price -->
                            <div class="mb-4 pb-4 border-b border-gray-200">
                                <div class="flex items-baseline gap-2">
                                    <span class="text-2xl font-bold text-blue-600">
                                        Rp{{ number_format($product->base_price, 0, ',', '.') }}
                                    </span>
                                    <span class="text-sm text-gray-500">/ {{ $product->unit }}</span>
                                </div>
                            </div>
                            
                            <!-- Detail Button -->
                            <a href="{{ route('product', $product->product_id) }}" 
                               class="block w-full text-center bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                </svg>
                <h3 class="text-xl font-semibold text-gray-600 mb-2">Belum Ada Produk</h3>
                <p class="text-gray-500">Produk akan segera tersedia. Silakan kembali lagi nanti.</p>
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex justify-center gap-4">
            <a href="#products" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                Lihat Semua Produk
            </a>
            <a href="#contact" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-12 bg-gradient-to-r from-blue-600 to-blue-800 text-white">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto text-center">
            <h3 class="text-2xl font-bold mb-4">Berlangganan newsletter kami & dapatkan diskon 15%</h3>
            <form class="flex gap-2 max-w-md mx-auto">
                <input type="email" placeholder="Alamat e-mail Anda" class="flex-1 px-4 py-3 rounded-lg text-gray-800" required>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold px-6 py-3 rounded-lg transition-colors">
                    →
                </button>
            </form>
        </div>
    </div>
</section>
@endsection