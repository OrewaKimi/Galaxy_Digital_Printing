@extends('layouts.app')

@section('title', 'Calendars - Kalender')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gray-50 py-3 border-b">
    <div class="container mx-auto px-4">
        <div class="flex items-center text-sm text-gray-600">
            <a href="{{ route('home') }}" class="hover:text-[#4a6741]">Start page</a>
            <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-gray-900">Calendars</span>
        </div>
    </div>
</div>

<!-- Main Content -->
<section class="py-8 bg-white">
    <!-- Banner Full Width -->
    <div class="max-w-[1400px] mx-auto px-4 mb-8">
        <div class="bg-gradient-to-br from-[#d4c5b0] via-[#c9baa8] to-[#a89e90] rounded-lg p-16 relative overflow-hidden">
            <div class="relative z-10">
                <h1 class="text-5xl font-bold text-gray-900">Calendars</h1>
            </div>
            <!-- Decorative diagonal stripes -->
            <div class="absolute top-0 right-0 w-full h-full">
                <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-gray-400/10 to-transparent transform skew-x-12"></div>
                <div class="absolute top-0 right-0 w-1/4 h-full bg-gradient-to-l from-gray-500/10 to-transparent transform skew-x-12 translate-x-20"></div>
            </div>
        </div>
    </div>

    <!-- Product Cards Grid -->
    <div class="max-w-[1400px] mx-auto px-4">
        <div class="grid grid-cols-6 gap-6">
            <!-- Wall planners -->
            <div class="group bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                <div class="aspect-[3/4] bg-white p-6 flex items-center justify-center border-b border-gray-100">
                    <img 
                        src="{{ asset('images/calendars/wall-planners.jpg') }}" 
                        alt="Wall planners" 
                        class="w-full h-full object-contain"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-20 h-20 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z\'/></svg></div>'">
                </div>
                <div class="p-4">
                    <h3 class="text-sm font-bold text-gray-900 mb-1.5 group-hover:text-[#4a6741] transition-colors">Calendars</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">Wall planners</p>
                </div>
            </div>

            <!-- Yearly planners -->
            <div class="group bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                <div class="aspect-[3/4] bg-white p-6 flex items-center justify-center border-b border-gray-100">
                    <img 
                        src="{{ asset('images/calendars/yearly-planners.jpg') }}" 
                        alt="Yearly planners" 
                        class="w-full h-full object-contain"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-20 h-20 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z\'/></svg></div>'">
                </div>
                <div class="p-4">
                    <h3 class="text-sm font-bold text-gray-900 mb-1.5 group-hover:text-[#4a6741] transition-colors">Calendars</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">Yearly planners</p>
                </div>
            </div>

            <!-- Wire-o wall calendars -->
            <div class="group bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                <div class="aspect-[3/4] bg-white p-6 flex items-center justify-center border-b border-gray-100">
                    <img 
                        src="{{ asset('images/calendars/wire-o.jpg') }}" 
                        alt="Wire-o wall calendars" 
                        class="w-full h-full object-contain"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-20 h-20 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z\'/></svg></div>'">
                </div>
                <div class="p-4">
                    <h3 class="text-sm font-bold text-gray-900 mb-1.5 group-hover:text-[#4a6741] transition-colors">Calendars</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">Wire-o wall calendars</p>
                </div>
            </div>

            <!-- Brochure calendars -->
            <div class="group bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                <div class="aspect-[3/4] bg-white p-6 flex items-center justify-center border-b border-gray-100">
                    <img 
                        src="{{ asset('images/calendars/brochure.jpg') }}" 
                        alt="Brochure calendars" 
                        class="w-full h-full object-contain"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-20 h-20 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253\'/></svg></div>'">
                </div>
                <div class="p-4">
                    <h3 class="text-sm font-bold text-gray-900 mb-1.5 group-hover:text-[#4a6741] transition-colors">Calendars</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">Brochure calendars</p>
                </div>
            </div>

            <!-- Desktop calendars -->
            <div class="group bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                <div class="aspect-[3/4] bg-white p-6 flex items-center justify-center border-b border-gray-100">
                    <img 
                        src="{{ asset('images/calendars/desktop.jpg') }}" 
                        alt="Desktop calendars" 
                        class="w-full h-full object-contain"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-20 h-20 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z\'/></svg></div>'">
                </div>
                <div class="p-4">
                    <h3 class="text-sm font-bold text-gray-900 mb-1.5 group-hover:text-[#4a6741] transition-colors">Calendars</h3>
                    <p class="text-xs text-gray-600 leading-relaxed">Desktop calendars</p>
                </div>
            </div>

            <!-- Show All Calendars -->
            <a href="#" class="bg-[#d4c5b0] hover:bg-[#c9baa8] rounded-lg overflow-hidden transition-all flex items-center justify-center">
                <div class="text-center p-6">
                    <div class="text-lg font-bold text-gray-900 uppercase tracking-wide leading-tight">SHOW ALL<br>CALENDARS</div>
                </div>
            </a>
        </div>

        <!-- Discover more section -->
        <div class="mt-8 pt-6 border-t border-gray-300">
            <p class="text-sm text-gray-700">
                <span class="font-bold">Discover more:</span>
                <a href="#" class="ml-2 text-gray-900 hover:text-[#4a6741] hover:underline">Wall calendars adhesive binding</a>
                <span class="mx-2">|</span>
                <a href="#" class="text-gray-900 hover:text-[#4a6741] hover:underline">Wall calendars with spiral binding</a>
                <span class="mx-2">|</span>
                <a href="#" class="text-gray-900 hover:text-[#4a6741] hover:underline">Weekly calendars</a>
                <span class="mx-2">|</span>
                <a href="#" class="text-gray-900 hover:text-[#4a6741] hover:underline">Pocket calendars</a>
            </p>
        </div>
    </div>
</section>

@endsection
