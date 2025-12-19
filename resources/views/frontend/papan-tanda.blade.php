@extends('layouts.app')

@section('title', 'Boards/Signs - Papan Tanda')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gray-50 py-3 border-b">
    <div class="container mx-auto px-4">
        <div class="flex items-center text-sm text-gray-600">
            <a href="{{ route('home') }}" class="hover:text-[#4a6741]">Start page</a>
            <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-gray-900">Boards/Signs</span>
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
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Boards/Signs</h2>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Aluminium composite boards</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Rigid foam boards</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Flexible foam boards</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Acrylic glass sheets</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Selfie frame</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Corrugated plastic sheets</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Corrugated plastic sheets (large print runs)</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Multi-packs, Corrugated Plastic Sheets</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Advertising signs, Re-board®</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="flex-1">
                <!-- Banner -->
                <div class="bg-gradient-to-br from-[#d4c5b0] via-[#c9baa8] to-[#a89e90] rounded-lg p-16 mb-8 relative overflow-hidden">
                    <div class="relative z-10">
                        <h1 class="text-5xl font-bold text-gray-900">Boards/Signs</h1>
                    </div>
                    <!-- Decorative diagonal stripes -->
                    <div class="absolute top-0 right-0 w-full h-full">
                        <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-gray-400/10 to-transparent transform skew-x-12"></div>
                        <div class="absolute top-0 right-0 w-1/4 h-full bg-gradient-to-l from-gray-500/10 to-transparent transform skew-x-12 translate-x-20"></div>
                    </div>
                </div>

                <!-- Product Cards Grid -->
                <div class="grid grid-cols-4 gap-6">
                    <!-- Aluminium composite boards -->
                    <a href="#" class="group bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="aspect-[3/4] bg-white p-6 flex items-center justify-center border-b border-gray-100">
                            <img 
                                src="{{ asset('images/boards/aluminium-composite.jpg') }}" 
                                alt="Aluminium composite boards" 
                                class="w-full h-full object-contain"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-20 h-20 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z\'/></svg></div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-bold text-gray-900 mb-1.5 group-hover:text-[#4a6741] transition-colors">Aluminium composite boards</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">Corrosion-proof and resistant to any kind of weather.</p>
                        </div>
                    </a>

                    <!-- Rigid foam boards -->
                    <a href="#" class="group bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="aspect-[3/4] bg-white p-6 flex items-center justify-center border-b border-gray-100">
                            <img 
                                src="{{ asset('images/boards/rigid-foam.jpg') }}" 
                                alt="Rigid foam boards" 
                                class="w-full h-full object-contain"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-20 h-20 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z\'/></svg></div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-bold text-gray-900 mb-1.5 group-hover:text-[#4a6741] transition-colors">Rigid foam boards</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">Lightweight and ideal for indoor and outdoor use.</p>
                        </div>
                    </a>

                    <!-- Flexible foam boards -->
                    <a href="#" class="group bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="aspect-[3/4] bg-white p-6 flex items-center justify-center border-b border-gray-100">
                            <img 
                                src="{{ asset('images/boards/flexible-foam.jpg') }}" 
                                alt="Flexible foam boards" 
                                class="w-full h-full object-contain"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-20 h-20 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z\'/></svg></div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-bold text-gray-900 mb-1.5 group-hover:text-[#4a6741] transition-colors">Flexible foam boards</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">Lightweight and stable all-rounders for indoor use.</p>
                        </div>
                    </a>

                    <!-- Acrylic glass sheets -->
                    <a href="#" class="group bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="aspect-[3/4] bg-white p-6 flex items-center justify-center border-b border-gray-100">
                            <img 
                                src="{{ asset('images/boards/acrylic-glass.jpg') }}" 
                                alt="Acrylic glass sheets" 
                                class="w-full h-full object-contain"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-20 h-20 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z\'/></svg></div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-bold text-gray-900 mb-1.5 group-hover:text-[#4a6741] transition-colors">Acrylic glass sheets</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">Depth and vibrancy due to reverse printed artwork.</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
