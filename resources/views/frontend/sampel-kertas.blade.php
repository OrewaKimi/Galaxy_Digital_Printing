@extends('layouts.app')

@section('title', 'Paper Samples - Galaxy Digital Printing')

@section('content')
<!-- Breadcrumb -->
<div class="bg-white border-b border-gray-200">
    <div class="container mx-auto px-4 py-3">
        <nav class="flex items-center gap-2 text-sm flex-wrap">
            <a href="/" class="text-gray-700 hover:text-[#4a6741]">Start page</a>
            <span class="text-gray-400">></span>
            <a href="{{ route('sampel-produk') }}" class="text-gray-700 hover:text-[#4a6741]">Product sample</a>
            <span class="text-gray-400">></span>
            <span class="text-gray-900 font-semibold">Paper samples</span>
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
                    <h3 class="font-bold text-gray-900 text-base mb-4">Product sample</h3>
                    <ul class="space-y-3">
                        <li class="font-semibold text-[#4a6741]">
                            <a href="{{ route('sampel-kertas') }}" class="hover:text-gray-700">Paper samples</a>
                        </li>
                        <li><a href="{{ route('business-card-sample') }}" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Business card sample</a></li>
                        <li><a href="{{ route('colour-chart-sample') }}" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Colour chart, silver (metallic)</a></li>
                    </ul>
                </div>
            </aside>

            <!-- Content Area -->
            <div class="lg:col-span-3 space-y-8">
                <!-- Banner -->
                <div class="relative rounded-lg overflow-hidden bg-gradient-to-r from-[#2d3e2d] to-[#3d4e3d] min-h-[200px] flex items-center justify-between px-8 py-8">
                    <div class="absolute inset-0 opacity-30">
                        <img src="{{ asset('images/sampel-banner.jpg') }}" alt="Paper samples" class="w-full h-full object-cover" onerror="this.style.display='none'">
                    </div>
                    <div class="relative z-10">
                        <h1 class="text-white text-3xl lg:text-4xl font-bold">Paper samples</h1>
                    </div>
                    <div class="relative z-10 flex items-center gap-4">
                        <div class="text-right">
                            <p class="text-white text-base font-normal">Get your <span class="font-bold">voucher</span> now!</p>
                        </div>
                        <div class="relative">
                            <!-- Tag shape with hole -->
                            <div class="bg-[#c4b5a0] rounded-lg px-5 py-4 relative shadow-lg">
                                <!-- Hole for string -->
                                <div class="absolute -top-2 right-3 w-4 h-4 bg-[#2d3e2d] rounded-full border-2 border-[#c4b5a0]"></div>
                                <span class="text-3xl font-bold text-gray-800">10€</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Sample 1 -->
                        <a href="{{ route('sampel-kertas-detail', 'glossy-paper') }}" class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow block group">
                            <div class="aspect-[4/3] bg-gray-50 overflow-hidden rounded-t-lg flex items-center justify-center p-8">
                                <img 
                                    src="{{ asset('images/products/samples/paper-sample-1.jpg') }}" 
                                    alt="Paper samples" 
                                    title="Paper samples"
                                    class="w-full h-full object-contain"
                                    loading="lazy"
                                    onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><div class=\'text-center\'><svg class=\'w-20 h-20 mx-auto text-gray-300 mb-2\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z\'/></svg><span class=\'text-gray-400 text-sm\'>Paper samples</span></div></div>'">
                            </div>
                            <div class="p-6">
                                <h3 class="font-bold text-gray-900 mb-2 text-lg">Paper samples</h3>
                                <p class="text-sm text-gray-700 leading-relaxed">Various papers, stickers and finishes to experience up close</p>
                            </div>
                        </a>

                        <!-- Sample 2 -->
                        <a href="{{ route('sampel-kertas-detail', 'matte-paper') }}" class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow block group">
                            <div class="aspect-[4/3] bg-gray-50 overflow-hidden rounded-t-lg flex items-center justify-center p-8">
                                <img 
                                    src="{{ asset('images/products/samples/paper-sample-2.jpg') }}" 
                                    alt="Business card sample" 
                                    title="Business card sample"
                                    class="w-full h-full object-contain"
                                    loading="lazy"
                                    onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><div class=\'text-center\'><svg class=\'w-20 h-20 mx-auto text-gray-300 mb-2\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z\'/></svg><span class=\'text-gray-400 text-sm\'>Business cards</span></div></div>'">
                            </div>
                            <div class="p-6">
                                <h3 class="font-bold text-gray-900 mb-2 text-lg">Business card sample</h3>
                                <p class="text-sm text-gray-700 leading-relaxed">Get an insight into the diverse world of our business cards</p>
                            </div>
                        </a>

                        <!-- Sample 3 -->
                        <a href="{{ route('sampel-kertas-detail', 'textured-paper') }}" class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow block group">
                            <div class="aspect-[4/3] bg-gray-50 overflow-hidden rounded-t-lg flex items-center justify-center p-8">
                                <img 
                                    src="{{ asset('images/products/samples/paper-sample-3.jpg') }}" 
                                    alt="Colour chart, silver (metallic)" 
                                    title="Colour chart, silver (metallic)"
                                    class="w-full h-full object-contain"
                                    loading="lazy"
                                    onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center\'><div class=\'text-center\'><svg class=\'w-20 h-20 mx-auto text-gray-300 mb-2\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01\'/></svg><span class=\'text-gray-400 text-sm\'>Colour chart</span></div></div>'">
                            </div>
                            <div class="p-6">
                                <h3 class="font-bold text-gray-900 mb-2 text-lg">Colour chart, silver (metallic)</h3>
                                <p class="text-sm text-gray-700 leading-relaxed">Discover the design options with silver colour</p>
                            </div>
                        </a>
                </div>
        </div>
    </div>
</section>

@endsection
