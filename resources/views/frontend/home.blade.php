@extends('layouts.app')

@section('title', 'Percetakan Digital Berkualitas - Galaxy Digital Printing')

@section('content')
<!-- Hero Promotional Cards Section -->
<section class="bg-white py-8">
    <div class="container mx-auto px-4">
        <!-- Grid 3 kolom -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            
            <!-- ROW 1 COLUMN 1: Kartu Natal Personal (span 2 rows) -->
            <div class="lg:row-span-2 bg-[#9DAA94] rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col relative">
                <div class="p-8 flex-1 flex flex-col relative z-10">
                    <div class="flex-1">
                        <h2 class="text-3xl font-bold text-gray-900 mb-4 leading-tight">Kartu Ucapan<br>Personal</h2>
                        <p class="text-base text-gray-800 mb-6 leading-relaxed max-w-md">Kejutan kecil, dampak besar: Buat kartu untuk pelanggan dan partner Anda dengan cepat dan mudah menggunakan template kami.</p>
                        <a href="{{ route('kartu-ucapan') }}" class="inline-block bg-[#4a5a44] text-white font-semibold py-3 px-6 rounded hover:bg-[#3a4a34] transition-colors text-sm">
                            Pesan Sekarang
                        </a>
                    </div>
                </div>
                <!-- Christmas card image -->
                <div class="absolute bottom-0 right-0 w-2/3 h-1/2">
                    <img src="{{ asset('images/christmas-card.png') }}" alt="Kartu Natal" class="w-full h-full object-contain" onerror="this.style.display='none'">
                </div>
                <!-- Background pattern -->
                <div class="absolute inset-0 opacity-10 pointer-events-none">
                    <div class="text-8xl font-bold text-gray-700 transform rotate-12 mt-20">Ho Ho Ho</div>
                </div>
            </div>

            <!-- ROW 1 COLUMN 2: Kalender 365 Hari -->
            <div class="bg-[#E8DB8F] rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow p-6 flex flex-col justify-between relative">
                <div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2 leading-tight">365 hari dalam sekilas:<br>Kalender</h3>
                    <a href="{{ route('kalender') }}" class="text-sm text-gray-800 hover:text-gray-900 font-semibold underline">Pesan Sekarang</a>
                </div>
                <div class="flex justify-end items-end mt-4">
                    <img src="{{ asset('images/calendar.png') }}" alt="Kalender" class="w-32 h-32 object-contain" onerror="this.style.display='none'">
                </div>
            </div>

            <!-- ROW 1 COLUMN 3: CekCetakCepat AI (span 2 rows) -->
            <div class="lg:row-span-2 bg-gradient-to-br from-[#1a3a1a] to-[#0d2a0d] text-white rounded-lg p-8 shadow-sm hover:shadow-md transition-shadow flex flex-col relative overflow-hidden">
                <div class="flex-1 relative z-10">
                    <h3 class="text-2xl font-bold mb-3 leading-tight">Cek Cetak Cepat<br>berbasis AI</h3>
                    <p class="text-sm mb-6 leading-relaxed opacity-90 max-w-xs">Upload file desain kamu dan dapatkan feedback langsung apakah file sudah siap cetak atau belum.</p>
                    <a href="{{ route('cek-cetak-cepat') }}" class="inline-block bg-transparent border-2 border-white text-white font-bold py-2.5 px-6 rounded hover:bg-white hover:text-[#1a3a1a] transition-colors text-sm">
                        Cek Sekarang
                    </a>
                </div>
                <div class="mt-auto space-y-3 relative z-10">
                    <div class="flex items-center bg-white bg-opacity-15 rounded-lg px-4 py-2.5">
                        <svg class="w-5 h-5 mr-3 text-green-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-semibold text-sm">Format PDF</span>
                    </div>
                    <div class="flex items-center bg-white bg-opacity-15 rounded-lg px-4 py-2.5">
                        <svg class="w-5 h-5 mr-3 text-green-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-semibold text-sm">Resolusi 300 dpi</span>
                    </div>
                    <div class="flex items-center bg-white bg-opacity-15 rounded-lg px-4 py-2.5">
                        <svg class="w-5 h-5 mr-3 text-green-300" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-semibold text-sm">Mode Warna CMYK</span>
                    </div>
                </div>
                <!-- Background illustration -->
                <div class="absolute right-0 top-1/4 w-3/5 h-3/5 opacity-30">
                    <div class="bg-white bg-opacity-10 rounded-lg p-4 transform rotate-12"></div>
                </div>
            </div>

            <!-- ROW 2 COLUMN 2: Kamu Datang ke Tempat yang Tepat! -->
            <div class="bg-gray-100 border border-gray-200 rounded-lg p-6 shadow-sm hover:shadow-md transition-shadow flex flex-col">
                <h3 class="text-xl font-bold text-gray-900 mb-4 leading-tight">
                    Kamu datang ke tempat<br>yang tepat!
                </h3>

                <div class="space-y-4 text-sm text-gray-700 flex-1">
                    <div class="flex items-center gap-3">
                        <span class="w-6 h-6 flex items-center justify-center text-xl">🏭</span>
                        <span class="relative top-[1px] leading-snug">
                            Produksi sendiri di tempat
                        </span>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="w-6 h-6 flex items-center justify-center text-xl">📅</span>
                        <span class="relative top-[1px] leading-snug">
                            Produksi &amp; kirim di hari yang sama
                        </span>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="w-6 h-6 flex items-center justify-center text-xl">💳</span>
                        <span class="relative top-[3px] leading-snug">
                            Bisa bayar tempo
                        </span>
                    </div>

                    <div class="flex items-center gap-3">
                        <span class="w-6 h-6 flex items-center justify-center text-xl">⭐</span>
                        <span class="relative top-[1px] leading-snug">
                            1,3 juta pelanggan puas
                        </span>
                    </div>
                </div>
            </div>
            
            <!-- ROW 3 COLUMN 1: Waktunya Mikirin Natal! -->
            <div class="bg-[#E8E4D8] rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col">
                <div class="p-6 flex-1">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight">Waktunya mikirin Hadiah!</h3>
                    <a href="{{ route('ide-hadiah') }}" class="text-sm text-gray-800 hover:text-gray-900 font-semibold underline">Lihat Ide Hadiah</a>
                </div>
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('images/Gift_1.jpg') }}" alt="Ide Hadiah Natal" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Ide Hadiah</div>'">
                </div>
            </div>

            <!-- ROW 3 COLUMN 2: Sampel Produk Selalu Tersedia -->
            <div class="bg-[#E8DCC8] rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col">
                <div class="p-6 flex-1">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight">Selalu siap: Paket<br>sampel produk</h3>
                    <a href="{{ route('sampel-produk') }}" class="text-sm text-gray-800 hover:text-gray-900 font-semibold underline">Pesan Sekarang</a>
                </div>
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('images/MockUp_Package.jpg') }}" alt="Sampel Produk" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-600 flex items-center justify-center text-gray-300 text-xs\'>Sampel Produk</div>'">
                </div>
            </div>

            <!-- ROW 3 COLUMN 3: Jumlah Sedikit, Dampak Besar -->
            <div class="bg-[#7A8A7A] rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow flex flex-col">
                <div class="p-6 flex-1">
                    <h3 class="text-xl font-bold text-white mb-3 leading-tight">Jumlah sedikit,<br>dampak besar</h3>
                    <a href="{{ route('jumlah-sedikit') }}" class="text-sm text-white hover:text-gray-200 font-semibold underline">Pesan Sekarang</a>
                </div>
                <div class="h-48 overflow-hidden">
                    <img src="{{ asset('images/Personal_Items.jpg') }}" alt="Jumlah Sedikit" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-600 flex items-center justify-center text-gray-300 text-xs\'>Produk Personal</div>'">
                </div>
            </div>

        </div>
    </div>
</section>



<!-- Top Categories Section -->
<section class="py-12 bg-white border-t border-gray-100">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Kategori Teratas</h2>
            <a href="#" class="text-[#4a6741] hover:underline font-bold text-xs uppercase tracking-wide">LIHAT SEMUA</a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            <!-- Flyers -->
            <a href="{{ route('flyer') }}" class="bg-white rounded-lg overflow-hidden shadow-[0_1px_3px_0_rgba(0,0,0,0.1)] hover:shadow-[0_4px_12px_0_rgba(0,0,0,0.15)] transition-shadow group border border-gray-200">
                <div class="aspect-[4/3] bg-gray-50 overflow-hidden">
                    <img src="{{ asset('images/Flyer.jpg') }}" alt="Flyer" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-100 flex items-center justify-center text-gray-400 text-xs\'>Flyer</div>'">
                </div>
                <div class="p-3 text-center bg-white">
                    <h3 class="font-semibold text-gray-900 text-sm">Flyer</h3>
                </div>
            </a>

            <!-- Folded Leaflets -->
            <a href="{{ route('brosur-lipat') }}" class="bg-white rounded-lg overflow-hidden shadow-[0_1px_3px_0_rgba(0,0,0,0.1)] hover:shadow-[0_4px_12px_0_rgba(0,0,0,0.15)] transition-shadow group border border-gray-200">
                <div class="aspect-[4/3] bg-gray-50 overflow-hidden">
                    <img src="{{ asset('images/Folded_Leaflects.jpg') }}" alt="Brosur Lipat" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-100 flex items-center justify-center text-gray-400 text-xs\'>Brosur Lipat</div>'">
                </div>
                <div class="p-3 text-center bg-white">
                    <h3 class="font-semibold text-gray-900 text-sm">Brosur Lipat</h3>
                </div>
            </a>

            <!-- Posters -->
            <a href="{{ route('poster') }}" class="bg-white rounded-lg overflow-hidden shadow-[0_1px_3px_0_rgba(0,0,0,0.1)] hover:shadow-[0_4px_12px_0_rgba(0,0,0,0.15)] transition-shadow group border border-gray-200">
                <div class="aspect-[4/3] bg-gray-50 overflow-hidden">
                    <img src="{{ asset('images/Posters.jpg') }}" alt="Poster" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-100 flex items-center justify-center text-gray-400 text-xs\'>Poster</div>'">
                </div>
                <div class="p-3 text-center bg-white">
                    <h3 class="font-semibold text-gray-900 text-sm">Poster</h3>
                </div>
            </a>

            <!-- Brochures -->
            <a href="{{ route('brosur') }}" class="bg-white rounded-lg overflow-hidden shadow-[0_1px_3px_0_rgba(0,0,0,0.1)] hover:shadow-[0_4px_12px_0_rgba(0,0,0,0.15)] transition-shadow group border border-gray-200">
                <div class="aspect-[4/3] bg-gray-50 overflow-hidden">
                    <img src="{{ asset('images/Brochures.jpg') }}" alt="Brosur" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-100 flex items-center justify-center text-gray-400 text-xs\'>Brosur</div>'">
                </div>
                <div class="p-3 text-center bg-white">
                    <h3 class="font-semibold text-gray-900 text-sm">Brosur</h3>
                </div>
            </a>

            <!-- New Products -->
            <a href="{{ route('produk-baru') }}" class="bg-white rounded-lg overflow-hidden shadow-[0_1px_3px_0_rgba(0,0,0,0.1)] hover:shadow-[0_4px_12px_0_rgba(0,0,0,0.15)] transition-shadow group border border-gray-200">
                <div class="aspect-[4/3] bg-gray-50 overflow-hidden">
                    <img src="{{ asset('images/New_Products.jpg') }}" alt="Produk Baru" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-100 flex items-center justify-center text-gray-400 text-xs\'>Produk Baru</div>'">
                </div>
                <div class="p-3 text-center bg-white">
                    <h3 class="font-semibold text-gray-900 text-sm">Produk Baru</h3>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Discover our huge variety of products Section -->
<section class="py-12 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Temukan berbagai macam produk kami</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Promotional Items -->
            <a href="{{ route('promotion') }}" class="bg-white rounded-lg border-2 border-gray-200 overflow-hidden hover:border-[#4a6741] hover:shadow-lg transition-all group">
                <div class="aspect-[3/4] bg-white overflow-hidden">
                    <img src="{{ asset('images/Personal_Items.jpg') }}" alt="Souvenir Promosi" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-100 flex items-center justify-center text-gray-400 text-xs\'>Souvenir Promosi</div>'">
                </div>
                <div class="p-4 text-center bg-white border-t-2 border-gray-200">
                    <h3 class="font-semibold text-gray-900 text-base group-hover:text-[#4a6741] transition-colors">Promosi Souvenir</h3>
                </div>
            </a>

            <!-- Clothing & Textiles -->
            <a href="{{ route('pakaian') }}" class="bg-white rounded-lg border-2 border-gray-200 overflow-hidden hover:border-[#4a6741] hover:shadow-lg transition-all group">
                <div class="aspect-[3/4] bg-white overflow-hidden">
                    <img src="{{ asset('images/Clothing.jpg') }}" alt="Pakaian & Tekstil" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-100 flex items-center justify-center text-gray-400 text-xs\'>Pakaian & Tekstil</div>'">
                </div>
                <div class="p-4 text-center bg-white border-t-2 border-gray-200">
                    <h3 class="font-semibold text-gray-900 text-base group-hover:text-[#4a6741] transition-colors">Pakaian</h3>
                </div>
            </a>

            <!-- Promotional Pens -->
            <a href="{{ route('pulpen') }}" class="bg-white rounded-lg border-2 border-gray-200 overflow-hidden hover:border-[#4a6741] hover:shadow-lg transition-all group">
                <div class="aspect-[3/4] bg-white overflow-hidden">
                    <img src="{{ asset('images/Promotional_Pens.jpg') }}" alt="Pulpen Promosi" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-100 flex items-center justify-center text-gray-400 text-xs\'>Pulpen Promosi</div>'">
                </div>
                <div class="p-4 text-center bg-white border-t-2 border-gray-200">
                    <h3 class="font-semibold text-gray-900 text-base group-hover:text-[#4a6741] transition-colors">Pulpen Promosi</h3>
                </div>
            </a>

            <!-- Exhibition Systems -->
            <a href="{{ route('pameran') }}" class="bg-white rounded-lg border-2 border-gray-200 overflow-hidden hover:border-[#4a6741] hover:shadow-lg transition-all group">
                <div class="aspect-[3/4] bg-white overflow-hidden">
                    <img src="{{ asset('images/Exhibition_Shows.jpg') }}" alt="Sistem Pameran" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-100 flex items-center justify-center text-gray-400 text-xs\'>Sistem Pameran</div>'">
                </div>
                <div class="p-4 text-center bg-white border-t-2 border-gray-200">
                    <h3 class="font-semibold text-gray-900 text-base group-hover:text-[#4a6741] transition-colors">Pameran</h3>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Products Section - DATA DARI DATABASE -->
<section class="py-12 bg-gray-50 border-t border-gray-100" id="products">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-gray-900">Produk Kami</h2>
            @if($products->count() > 8)
                <a href="#" class="text-[#4a6741] hover:underline font-bold text-xs uppercase tracking-wide">LIHAT SEMUA</a>
            @endif
        </div>

        @if($products->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($products as $product)
                    <div class="bg-white rounded-lg border-2 border-gray-200 overflow-hidden hover:border-[#4a6741] hover:shadow-lg transition-all group">
                        <!-- Product Image -->
                        <div class="aspect-[3/4] overflow-hidden relative bg-white">
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
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                                 onerror="this.onerror=null; this.src='{{ asset('images/products/default-product.jpg') }}';">
                            
                            @if($product->category)
                                <div class="absolute top-3 left-3 bg-[#4a6741] text-white text-xs font-semibold px-2.5 py-1 rounded z-20">
                                    {{ $product->category->category_name }}
                                </div>
                            @endif
                        </div>
                        
                        <!-- Product Info -->
                        <div class="p-4 bg-white border-t-2 border-gray-200">
                            <h4 class="text-base font-semibold text-gray-900 mb-2 text-center line-clamp-2 group-hover:text-[#4a6741] transition-colors">
                                {{ $product->product_name }}
                            </h4>
                            
                            <!-- Price -->
                            <div class="flex items-baseline justify-center gap-1.5 mb-3">
                                <span class="text-lg font-bold text-[#4a6741]">
                                    Rp{{ number_format($product->base_price, 0, ',', '.') }}
                                </span>
                                <span class="text-xs text-gray-500">/ {{ $product->unit }}</span>
                            </div>
                            
                            <!-- Detail Button -->
                            <a href="{{ route('product', $product->product_id) }}" 
                               class="block w-full text-center bg-[#4a6741] hover:bg-[#3a5631] text-white font-semibold py-2.5 px-4 rounded transition-colors text-sm">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-16">
                <svg class="w-20 h-20 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                </svg>
                <h3 class="text-lg font-semibold text-gray-600 mb-1.5">Belum Ada Produk</h3>
                <p class="text-gray-500 text-sm">Produk akan segera tersedia. Silakan kembali lagi nanti.</p>
            </div>
        @endif
    </div>
</section>

<!-- Discover our services Section -->
<section class="py-12 bg-gray-50 border-t border-gray-100">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Temukan layanan kami</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Samples of paper -->
            <div class="group">
                <div class="bg-white rounded-lg overflow-hidden mb-4 shadow-[0_1px_3px_0_rgba(0,0,0,0.1)] hover:shadow-[0_4px_12px_0_rgba(0,0,0,0.15)] transition-shadow border border-gray-200">
                    <img src="{{ asset('images/Paper_Samples.jpg') }}" alt="Sampel" class="w-full aspect-video object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full aspect-video bg-gray-100 flex items-center justify-center text-gray-400 text-xs\'>Sampel</div>'">
                </div>
                <div>
                    <p class="text-xs text-gray-500 mb-1.5">Mencari material yang tepat?</p>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 leading-tight">Sampel kertas dan lainnya<br>yang dapat Anda sentuh</h3>
                    <a href="{{ route('sampel-kertas') }}" class="text-[#4a6741] hover:underline font-medium text-sm inline-flex items-center">
                        Pelajari lebih lanjut
                        <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Design your products -->
            <div class="group">
                <div class="bg-white rounded-lg overflow-hidden mb-4 shadow-[0_1px_3px_0_rgba(0,0,0,0.1)] hover:shadow-[0_4px_12px_0_rgba(0,0,0,0.15)] transition-shadow border border-gray-200">
                    <img src="{{ asset('images/Product_Design.jpg') }}" alt="Desain" class="w-full aspect-video object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full aspect-video bg-gray-100 flex items-center justify-center text-gray-400 text-xs\'>Desain</div>'">
                </div>
                <div>
                    <p class="text-xs text-gray-500 mb-1.5">Tidak punya software desain grafis?</p>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 leading-tight">Desain produk cetak Anda<br>secara online dengan mudah</h3>
                    <a href="{{ route('desain-produk') }}" class="text-[#4a6741] hover:underline font-medium text-sm inline-flex items-center">
                        Pelajari lebih lanjut
                        <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Contact us -->
            <div class="group">
                <div class="bg-white rounded-lg overflow-hidden mb-4 shadow-[0_1px_3px_0_rgba(0,0,0,0.1)] hover:shadow-[0_4px_12px_0_rgba(0,0,0,0.15)] transition-shadow border border-gray-200">
                    <img src="{{ asset('images/Contact_Us.jpg') }}" alt="Kontak" class="w-full aspect-video object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full aspect-video bg-gray-100 flex items-center justify-center text-gray-400 text-xs\'>Kontak</div>'">
                </div>
                <div>
                    <p class="text-xs text-gray-500 mb-1.5">Ada pertanyaan atau keinginan?</p>
                    <h3 class="text-lg font-bold text-gray-900 mb-2 leading-tight">Hubungi kami via telepon,<br>email atau chat!</h3>
                    <a href="{{ route('contact') }}" class="text-[#4a6741] hover:underline font-medium text-sm inline-flex items-center">
                        Pelajari lebih lanjut
                        <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Find your favourite product Section -->
<section class="py-12 bg-white border-t border-gray-100">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-gray-900">Temukan produk favorit Anda</h2>
            <a href="#" class="text-blue-600 hover:underline font-medium text-sm">Lihat semua kategori</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
            <!-- Bags -->
            <a href="{{ route('tas') }}" class="bg-white rounded-lg border-2 border-gray-200 p-6 hover:border-[#4a6741] hover:shadow-md transition-all group">
                <div class="flex flex-col items-center text-center">
                    <svg class="w-12 h-12 text-gray-700 mb-3 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                    </svg>
                    <span class="text-sm font-semibold text-gray-900 group-hover:text-[#4a6741] transition-colors">Tas</span>
                </div>
            </a>

            <!-- Boards/Signs -->
            <a href="{{ route('papan-tanda') }}" class="bg-white rounded-lg border-2 border-gray-200 p-6 hover:border-[#4a6741] hover:shadow-md transition-all group">
                <div class="flex flex-col items-center text-center">
                    <svg class="w-12 h-12 text-gray-700 mb-3 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span class="text-sm font-semibold text-gray-900 group-hover:text-[#4a6741] transition-colors">Papan/Tanda</span>
                </div>
            </a>

            <!-- Brochures -->
            <a href="{{ route('brosur') }}" class="bg-white rounded-lg border-2 border-gray-200 p-6 hover:border-[#4a6741] hover:shadow-md transition-all group">
                <div class="flex flex-col items-center text-center">
                    <svg class="w-12 h-12 text-gray-700 mb-3 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    <span class="text-sm font-semibold text-gray-900 group-hover:text-[#4a6741] transition-colors">Brosur</span>
                </div>
            </a>

            <!-- Business cards -->
            <a href="{{ route('kartu-nama') }}" class="bg-white rounded-lg border-2 border-gray-200 p-6 hover:border-[#4a6741] hover:shadow-md transition-all group">
                <div class="flex flex-col items-center text-center">
                    <svg class="w-12 h-12 text-gray-700 mb-3 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                    </svg>
                    <span class="text-sm font-semibold text-gray-900 group-hover:text-[#4a6741] transition-colors">Kartu Nama</span>
                </div>
            </a>

            <!-- Calendars -->
            <a href="{{ route('kalender') }}" class="bg-white rounded-lg border-2 border-gray-200 p-6 hover:border-[#4a6741] hover:shadow-md transition-all group">
                <div class="flex flex-col items-center text-center">
                    <svg class="w-12 h-12 text-gray-700 mb-3 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <span class="text-sm font-semibold text-gray-900 group-hover:text-[#4a6741] transition-colors">Kalender</span>
                </div>
            </a>
        </div>
    </div>
</section>
@endsection