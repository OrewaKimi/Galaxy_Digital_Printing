@extends('layouts.app')

@section('title', 'Bags - Tas Promosi')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gray-50 py-3 border-b">
    <div class="container mx-auto px-4">
        <div class="flex items-center text-sm text-gray-600">
            <a href="{{ route('home') }}" class="hover:text-[#4a6741]">Start page</a>
            <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-gray-900">Bags</span>
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
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Bags</h2>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Paper bags</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Gift bags</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Canvas bags</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Drawstring bags & gym bags</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="flex-1">
                <!-- Banner -->
                <div class="bg-gradient-to-br from-[#d4c5b0] via-[#c9baa8] to-[#a89e90] rounded-lg p-16 mb-8 relative overflow-hidden">
                    <div class="relative z-10">
                        <h1 class="text-5xl font-bold text-gray-900">Bags</h1>
                    </div>
                    <!-- Decorative diagonal stripes -->
                    <div class="absolute top-0 right-0 w-full h-full">
                        <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-gray-400/10 to-transparent transform skew-x-12"></div>
                        <div class="absolute top-0 right-0 w-1/4 h-full bg-gradient-to-l from-gray-500/10 to-transparent transform skew-x-12 translate-x-20"></div>
                    </div>
                </div>

                <!-- Product Cards Grid -->
                <div class="grid grid-cols-4 gap-6">
                    <!-- Paper bags -->
                    <a href="#" class="group bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="aspect-[3/4] bg-white p-6 flex items-center justify-center border-b border-gray-100">
                            <img 
                                src="{{ asset('images/bags/paper-bags.jpg') }}" 
                                alt="Paper bags" 
                                class="w-full h-full object-contain"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-20 h-20 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z\'/></svg></div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-bold text-gray-900 mb-1.5 group-hover:text-[#4a6741] transition-colors">Paper bags</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">Promote your brand - with stylish product and gift bags</p>
                        </div>
                    </a>

                    <!-- Gift bags -->
                    <a href="#" class="group bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="aspect-[3/4] bg-white p-6 flex items-center justify-center border-b border-gray-100">
                            <img 
                                src="{{ asset('images/bags/gift-bags.jpg') }}" 
                                alt="Gift bags" 
                                class="w-full h-full object-contain"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-20 h-20 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7\'/></svg></div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-bold text-gray-900 mb-1.5 group-hover:text-[#4a6741] transition-colors">Gift bags</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">&nbsp;</p>
                        </div>
                    </a>

                    <!-- Canvas bags -->
                    <a href="#" class="group bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="aspect-[3/4] bg-white p-6 flex items-center justify-center border-b border-gray-100">
                            <img 
                                src="{{ asset('images/bags/canvas-bags.jpg') }}" 
                                alt="Canvas bags" 
                                class="w-full h-full object-contain"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-20 h-20 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z\'/></svg></div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-bold text-gray-900 mb-1.5 group-hover:text-[#4a6741] transition-colors">Canvas bags</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">Your marketing message on the go - ideal as shopping or swag bag</p>
                        </div>
                    </a>

                    <!-- Drawstring bags & gym bags -->
                    <a href="#" class="group bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="aspect-[3/4] bg-white p-6 flex items-center justify-center border-b border-gray-100">
                            <img 
                                src="{{ asset('images/bags/drawstring-bags.jpg') }}" 
                                alt="Drawstring bags & gym bags" 
                                class="w-full h-full object-contain"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-20 h-20 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4\'/></svg></div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-bold text-gray-900 mb-1.5 group-hover:text-[#4a6741] transition-colors">Drawstring bags & gym bags</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">Sporty and modern - the ideal giveaway not just for sports fans</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
