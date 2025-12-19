@extends('layouts.app')

@section('title', 'Colour Chart Silver Metallic - Galaxy Digital Printing')

@section('content')
<!-- Breadcrumb -->
<div class="bg-white border-b border-gray-200">
    <div class="container mx-auto px-4 py-3">
        <nav class="flex items-center gap-2 text-sm flex-wrap">
            <a href="/" class="text-gray-700 hover:text-[#4a6741]">Start page</a>
            <span class="text-gray-400">></span>
            <a href="{{ route('sampel-produk') }}" class="text-gray-700 hover:text-[#4a6741]">Product sample</a>
            <span class="text-gray-400">></span>
            <span class="text-gray-900 font-semibold">Colour chart, silver (metallic)</span>
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
                        <li><a href="{{ route('sampel-kertas') }}" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Paper samples</a></li>
                        <li><a href="{{ route('business-card-sample') }}" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Business card sample</a></li>
                        <li class="font-semibold text-[#4a6741]">
                            <a href="{{ route('colour-chart-sample') }}" class="hover:text-gray-700">Colour chart, silver (metallic)</a>
                        </li>
                    </ul>
                </div>
            </aside>

            <!-- Content Area -->
            <div class="lg:col-span-3 space-y-8">
                <!-- Banner -->
                <div class="relative rounded-lg overflow-hidden bg-gradient-to-r from-stone-300 via-stone-200 to-stone-100 h-48 flex items-center px-8">
                    <div class="relative z-10">
                        <h1 class="text-gray-900 text-3xl font-bold">Colour chart, silver (metallic)</h1>
                    </div>
                </div>

                <!-- Product Description -->
                <div class="bg-white rounded-lg border border-gray-200 p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Explore our full colour spectrum</h2>
                    <p class="text-gray-700 leading-relaxed mb-8">
                        Our comprehensive colour chart showcases the complete range of silver metallic finishes available. Each colour swatch has been carefully selected to ensure accurate representation of what you can achieve in your printed materials.
                    </p>
                    
                    <!-- Color Swatches Grid -->
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        <!-- Color 1 -->
                        <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow text-center">
                            <div class="aspect-square bg-gradient-to-br from-gray-300 to-gray-400 rounded-lg mb-4 border border-gray-300"></div>
                            <h4 class="font-semibold text-gray-900 mb-1">Silver Pearl</h4>
                            <p class="text-xs text-gray-600 mb-3">Pantone 877C</p>
                            <button class="w-full bg-[#4a6741] hover:bg-[#3a5631] text-white font-semibold py-2 px-3 rounded text-sm transition-colors">
                                Select
                            </button>
                        </div>

                        <!-- Color 2 -->
                        <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow text-center">
                            <div class="aspect-square bg-gradient-to-br from-gray-400 to-gray-500 rounded-lg mb-4 border border-gray-300"></div>
                            <h4 class="font-semibold text-gray-900 mb-1">Metallic Silver</h4>
                            <p class="text-xs text-gray-600 mb-3">Pantone 871C</p>
                            <button class="w-full bg-[#4a6741] hover:bg-[#3a5631] text-white font-semibold py-2 px-3 rounded text-sm transition-colors">
                                Select
                            </button>
                        </div>

                        <!-- Color 3 -->
                        <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow text-center">
                            <div class="aspect-square bg-gradient-to-br from-slate-300 to-slate-400 rounded-lg mb-4 border border-gray-300"></div>
                            <h4 class="font-semibold text-gray-900 mb-1">Silver Silk</h4>
                            <p class="text-xs text-gray-600 mb-3">Pantone 877CP</p>
                            <button class="w-full bg-[#4a6741] hover:bg-[#3a5631] text-white font-semibold py-2 px-3 rounded text-sm transition-colors">
                                Select
                            </button>
                        </div>

                        <!-- Color 4 -->
                        <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow text-center">
                            <div class="aspect-square bg-gradient-to-br from-gray-200 to-gray-300 rounded-lg mb-4 border border-gray-300"></div>
                            <h4 class="font-semibold text-gray-900 mb-1">Light Silver</h4>
                            <p class="text-xs text-gray-600 mb-3">Pantone 422C</p>
                            <button class="w-full bg-[#4a6741] hover:bg-[#3a5631] text-white font-semibold py-2 px-3 rounded text-sm transition-colors">
                                Select
                            </button>
                        </div>

                        <!-- Color 5 -->
                        <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow text-center">
                            <div class="aspect-square bg-gradient-to-br from-gray-500 to-gray-600 rounded-lg mb-4 border border-gray-300"></div>
                            <h4 class="font-semibold text-gray-900 mb-1">Deep Silver</h4>
                            <p class="text-xs text-gray-600 mb-3">Pantone 425C</p>
                            <button class="w-full bg-[#4a6741] hover:bg-[#3a5631] text-white font-semibold py-2 px-3 rounded text-sm transition-colors">
                                Select
                            </button>
                        </div>

                        <!-- Color 6 -->
                        <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow text-center">
                            <div class="aspect-square bg-gradient-to-br from-zinc-300 to-zinc-400 rounded-lg mb-4 border border-gray-300"></div>
                            <h4 class="font-semibold text-gray-900 mb-1">Zinc Silver</h4>
                            <p class="text-xs text-gray-600 mb-3">Pantone 877</p>
                            <button class="w-full bg-[#4a6741] hover:bg-[#3a5631] text-white font-semibold py-2 px-3 rounded text-sm transition-colors">
                                Select
                            </button>
                        </div>

                        <!-- Color 7 -->
                        <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow text-center">
                            <div class="aspect-square bg-gradient-to-br from-slate-400 to-slate-500 rounded-lg mb-4 border border-gray-300"></div>
                            <h4 class="font-semibold text-gray-900 mb-1">Chrome Silver</h4>
                            <p class="text-xs text-gray-600 mb-3">Pantone 426C</p>
                            <button class="w-full bg-[#4a6741] hover:bg-[#3a5631] text-white font-semibold py-2 px-3 rounded text-sm transition-colors">
                                Select
                            </button>
                        </div>

                        <!-- Color 8 -->
                        <div class="bg-white rounded-lg border border-gray-200 p-4 hover:shadow-md transition-shadow text-center">
                            <div class="aspect-square bg-gradient-to-br from-stone-400 to-stone-500 rounded-lg mb-4 border border-gray-300"></div>
                            <h4 class="font-semibold text-gray-900 mb-1">Titanium Silver</h4>
                            <p class="text-xs text-gray-600 mb-3">Pantone 428C</p>
                            <button class="w-full bg-[#4a6741] hover:bg-[#3a5631] text-white font-semibold py-2 px-3 rounded text-sm transition-colors">
                                Select
                            </button>
                        </div>
                    </div>

                    <!-- Color Guide Info -->
                    <div class="mt-10 bg-stone-100 rounded-lg p-6 border border-stone-200">
                        <h3 class="font-bold text-gray-900 mb-3">About our Metallic Silvers</h3>
                        <p class="text-gray-700 text-sm mb-4">
                            Our metallic silver collection offers premium finishes suitable for luxury branding, premium packaging, and high-end promotional materials. Each shade has been optimized for various printing techniques including offset, digital, and specialty printing processes.
                        </p>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p class="font-semibold text-gray-900 mb-2">Best for:</p>
                                <ul class="text-sm text-gray-700 space-y-1">
                                    <li>• Premium business cards</li>
                                    <li>• Luxury packaging</li>
                                    <li>• High-end invitations</li>
                                </ul>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 mb-2">Finishing options:</p>
                                <ul class="text-sm text-gray-700 space-y-1">
                                    <li>• Hot foil stamping</li>
                                    <li>• Metallic spot UV</li>
                                    <li>• Embossing effects</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Request Sample -->
                    <div class="mt-8 bg-white rounded-lg border border-gray-200 p-6 text-center">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Want to see these colours in person?</h3>
                        <p class="text-gray-700 mb-4">Order our complete colour chart sample to evaluate all finishes with your designs.</p>
                        <button class="bg-[#4a6741] hover:bg-[#3a5631] text-white font-semibold py-3 px-8 rounded transition-colors">
                            Request Colour Chart Sample
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
