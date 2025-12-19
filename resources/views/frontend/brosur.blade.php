@extends('layouts.app')

@section('title', 'Brochures - Galaxy Digital Printing')

@section('content')
<!-- Breadcrumb -->
<div class="bg-gray-50 py-3 border-b">
    <div class="container mx-auto px-4">
        <div class="flex items-center text-sm text-gray-600">
            <a href="{{ route('home') }}" class="hover:text-[#4a6741]">Start page</a>
            <svg class="w-4 h-4 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span class="text-gray-900">Brochures</span>
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
                    <h2 class="text-xl font-bold text-gray-900 mb-4">Brochures</h2>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Brochures, saddle-stitched</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Brochures, digitally printed</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Same-day print brochures</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Brochures eco/natural paper</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Brochures (short runs)</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Brochure, gummed mount</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Spiral booklet</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Brochures (web offset)</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Brochure, gummed mount (web)</a>
                        </li>
                        <li>
                            <a href="#" class="text-sm text-gray-700 hover:text-[#4a6741] hover:underline block">Newspaper printing (web)</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="flex-1">
                <!-- Banner with Image -->
                <div class="relative rounded-lg overflow-hidden h-64 mb-8">
                    <img 
                        src="{{ asset('images/brochures-banner.jpg') }}" 
                        alt="Brochures Banner" 
                        class="w-full h-full object-cover"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gradient-to-br from-[#d4c5b0] via-[#c9baa8] to-[#a89e90] flex items-center px-16\'><h1 class=\'text-5xl font-bold text-gray-900\'>Brochures</h1></div>'">
                    <div class="absolute inset-0 bg-gradient-to-r from-black/30 to-transparent"></div>
                    <div class="absolute inset-0 flex items-center px-16">
                        <h1 class="text-5xl font-bold text-white drop-shadow-lg">Brochures</h1>
                    </div>
                </div>

                <!-- Product Cards Grid -->
                <div class="grid grid-cols-4 gap-6">
                    <!-- Brochures, saddle-stitched -->
                    <a href="#" class="group bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="aspect-[3/4] bg-white p-6 flex items-center justify-center border-b border-gray-100">
                            <img 
                                src="{{ asset('images/brochures/saddle-stitched.jpg') }}" 
                                alt="Brochures, saddle-stitched" 
                                class="w-full h-full object-contain"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-20 h-20 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253\'/></svg></div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-bold text-gray-900 mb-1.5 group-hover:text-[#4a6741] transition-colors">Brochures, saddle-stitched</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">For company brochures, club magazines etc. Also available in custom sizes.</p>
                        </div>
                    </a>

                    <!-- Brochures, digitally printed -->
                    <a href="#" class="group bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="aspect-[3/4] bg-white p-6 flex items-center justify-center border-b border-gray-100">
                            <img 
                                src="{{ asset('images/brochures/digitally-printed.jpg') }}" 
                                alt="Brochures, digitally printed" 
                                class="w-full h-full object-contain"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-20 h-20 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253\'/></svg></div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-bold text-gray-900 mb-1.5 group-hover:text-[#4a6741] transition-colors">Brochures, digitally printed</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">Low-priced, fast and in high quality: our digitally printed brochures</p>
                        </div>
                    </a>

                    <!-- Same-day print brochures -->
                    <a href="#" class="group bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="aspect-[3/4] bg-white p-6 flex items-center justify-center border-b border-gray-100">
                            <img 
                                src="{{ asset('images/brochures/same-day.jpg') }}" 
                                alt="Same-day print brochures" 
                                class="w-full h-full object-contain"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-20 h-20 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z\'/></svg></div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-bold text-gray-900 mb-1.5 group-hover:text-[#4a6741] transition-colors">Same-day print brochures</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">Order by 12 am and we'll ship your brochures on the same working day.</p>
                        </div>
                    </a>

                    <!-- Brochures eco/natural paper -->
                    <a href="#" class="group bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="aspect-[3/4] bg-white p-6 flex items-center justify-center border-b border-gray-100">
                            <img 
                                src="{{ asset('images/brochures/eco-natural.jpg') }}" 
                                alt="Brochures eco/natural paper" 
                                class="w-full h-full object-contain"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><svg class=\'w-20 h-20 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z\'/></svg></div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="text-sm font-bold text-gray-900 mb-1.5 group-hover:text-[#4a6741] transition-colors">Brochures eco/natural paper</h3>
                            <p class="text-xs text-gray-600 leading-relaxed">Create a sustainable impact – with a natural look</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection