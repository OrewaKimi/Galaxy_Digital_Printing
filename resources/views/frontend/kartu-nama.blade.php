@extends('layouts.app')

@section('title', 'Business cards - Kartu Nama')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gray-50 py-3 border-b">
    <div class="container mx-auto px-4">
        <div class="flex items-center text-sm text-gray-600">
            <a href="{{ route('home') }}" class="hover:text-[#4a6741]">Start page</a>
            <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-gray-900">Business cards</span>
        </div>
    </div>
</div>

<!-- Main Content -->
<section class="py-8 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex gap-8">
            <!-- Sidebar -->
            <div class="w-64 flex-shrink-0">
                <div class="bg-white">
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Business cards</h2>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Business cards</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Exclusive business cards</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Multi-pack Business Cards</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Business cards eco/natural paper</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">NFC business cards</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Multiloft business cards</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Folded Business Cards</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Business cards with spot finish</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Plastic cards</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="flex-1">
                <!-- Banner with Image -->
                <div class="relative rounded-lg overflow-hidden h-64 mb-8">
                    <img 
                        src="{{ asset('images/business-cards-banner.jpg') }}" 
                        alt="Business cards Banner" 
                        class="w-full h-full object-cover"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gradient-to-br from-[#d4c5b0] via-[#c9baa8] to-[#a89e90] flex items-center px-16\'><h1 class=\'text-5xl font-bold text-gray-900\'>Business cards</h1></div>'">
                    <div class="absolute inset-0 bg-gradient-to-r from-black/20 to-transparent"></div>
                    <div class="absolute inset-0 flex items-center px-16">
                        <h1 class="text-5xl font-bold text-gray-900">Business cards</h1>
                    </div>
                </div>

                <!-- Product Cards Grid -->
                <div class="grid grid-cols-4 gap-6">
                    <!-- Business cards -->
                    <a href="#" class="group bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="aspect-[3/4] bg-white p-6 flex items-center justify-center border-b border-gray-100">
                            <img 
                                src="{{ asset('images/business-cards/standard.jpg') }}" 
                                alt="Business cards" 
                                class="w-full h-full object-contain"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-20 h-20 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z\'/></svg></div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-bold text-gray-900 mb-1.5 group-hover:text-[#4a6741] transition-colors">Business cards</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">Stay in contact thanks to versatile design possibilities</p>
                        </div>
                    </a>

                    <!-- Exclusive business cards -->
                    <a href="#" class="group bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="aspect-[3/4] bg-white p-6 flex items-center justify-center border-b border-gray-100">
                            <img 
                                src="{{ asset('images/business-cards/exclusive.jpg') }}" 
                                alt="Exclusive business cards" 
                                class="w-full h-full object-contain"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-20 h-20 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z\'/></svg></div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-bold text-gray-900 mb-1.5 group-hover:text-[#4a6741] transition-colors">Exclusive business cards</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">Classy paper to leave a lasting impression</p>
                        </div>
                    </a>

                    <!-- Multi-pack Business Cards -->
                    <a href="#" class="group bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="aspect-[3/4] bg-white p-6 flex items-center justify-center border-b border-gray-100">
                            <img 
                                src="{{ asset('images/business-cards/multi-pack.jpg') }}" 
                                alt="Multi-pack Business Cards" 
                                class="w-full h-full object-contain"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-20 h-20 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10\'/></svg></div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-bold text-gray-900 mb-1.5 group-hover:text-[#4a6741] transition-colors">Multi-pack Business Cards</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">Order several variants for different staff members or occasions</p>
                        </div>
                    </a>

                    <!-- Business cards eco/natural paper -->
                    <a href="#" class="group bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="aspect-[3/4] bg-white p-6 flex items-center justify-center border-b border-gray-100">
                            <img 
                                src="{{ asset('images/business-cards/eco-natural.jpg') }}" 
                                alt="Business cards eco/natural paper" 
                                class="w-full h-full object-contain"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-20 h-20 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z\'/></svg></div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-bold text-gray-900 mb-1.5 group-hover:text-[#4a6741] transition-colors">Business cards eco/natural paper</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">Create a sustainable impact - with a natural look</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
