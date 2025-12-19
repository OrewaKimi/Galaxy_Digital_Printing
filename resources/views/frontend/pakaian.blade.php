@extends('layouts.app')

@section('title', 'Clothing - Galaxy Digital Printing')

@section('content')
<!-- Breadcrumb -->
<div class="bg-white border-b border-gray-200">
    <div class="container mx-auto px-4 py-3">
        <nav class="flex items-center gap-2 text-sm">
            <a href="/" class="text-gray-700 hover:text-[#4a6741]">Start page</a>
            <span class="text-gray-400">></span>
            <span class="text-gray-900 font-semibold">Clothing</span>
        </nav>
    </div>
</div>

<!-- Main Content -->
<section class="bg-white">
    <div class="container mx-auto px-4 pb-12 lg:pb-16">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Sidebar -->
            <aside class="lg:col-span-1 lg:sticky lg:top-24 h-max">
                <div>
                    <h3 class="font-bold text-gray-900 text-base mb-4">Clothing</h3>
                    <ul class="space-y-3">
                        <li><a href="#tshirts" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">T-shirts</a></li>
                        <li><a href="#polo" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Polo shirts</a></li>
                        <li><a href="#hoodies" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Hoodies & Sweatshirts</a></li>
                        <li><a href="#dress-shirts" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Dress shirts & Blouses</a></li>
                        <li><a href="#vests-jackets" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Vests & Jackets</a></li>
                        <li><a href="#workwear" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Workwear</a></li>
                        <li><a href="#sportswear" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Sportswear</a></li>
                        <li><a href="#hats-caps" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Hats & caps</a></li>
                    </ul>
                </div>
            </aside>

            <!-- Content Area -->
            <div class="lg:col-span-3 space-y-8">
                <!-- Banner Heading -->
                <div class="relative rounded-lg overflow-hidden bg-gradient-to-r from-stone-300 via-stone-200 to-stone-100 h-40 flex items-center px-8">
                    <h1 class="text-gray-900 text-2xl lg:text-3xl font-bold">Clothing</h1>
                </div>

                <!-- Category Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- T-Shirts -->
                    <div id="tshirts" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[4/3] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/clothing/t-shirts.jpg') }}" 
                                alt="T-shirts" 
                                title="T-shirts"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>T-shirts</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900">T-shirts</h3>
                        </div>
                    </div>

                    <!-- Polo shirts -->
                    <div id="polo" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[4/3] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/clothing/polo-shirts.jpg') }}" 
                                alt="Polo shirts" 
                                title="Polo shirts"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Polo shirts</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900">Polo shirts</h3>
                        </div>
                    </div>

                    <!-- Hoodies & Sweatshirts -->
                    <div id="hoodies" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[4/3] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/clothing/hoodies-sweatshirts.jpg') }}" 
                                alt="Hoodies & Sweatshirts" 
                                title="Hoodies & Sweatshirts"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Hoodies & Sweatshirts</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900">Hoodies & Sweatshirts</h3>
                        </div>
                    </div>

                    <!-- Dress shirts & Blouses -->
                    <div id="dress-shirts" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[4/3] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/clothing/dress-shirts-blouses.jpg') }}" 
                                alt="Dress shirts & Blouses" 
                                title="Dress shirts & Blouses"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Dress shirts & Blouses</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900">Dress shirts & Blouses</h3>
                        </div>
                    </div>

                    <!-- Vests & Jackets -->
                    <div id="vests-jackets" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[4/3] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/clothing/vests-jackets.jpg') }}" 
                                alt="Vests & Jackets" 
                                title="Vests & Jackets"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Vests & Jackets</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900">Vests & Jackets</h3>
                        </div>
                    </div>

                    <!-- Workwear -->
                    <div id="workwear" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[4/3] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/clothing/workwear.jpg') }}" 
                                alt="Workwear" 
                                title="Workwear"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Workwear</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900">Workwear</h3>
                        </div>
                    </div>

                    <!-- Sportswear -->
                    <div id="sportswear" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[4/3] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/clothing/sportswear.jpg') }}" 
                                alt="Sportswear" 
                                title="Sportswear"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Sportswear</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900">Sportswear</h3>
                        </div>
                    </div>

                    <!-- Hats & caps -->
                    <div id="hats-caps" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[4/3] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/clothing/hats-caps.jpg') }}" 
                                alt="Hats & caps" 
                                title="Hats & caps"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Hats & caps</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900">Hats & caps</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection