@extends('layouts.app')

@section('title', 'Exhibition systems - Galaxy Digital Printing')

@section('content')
<!-- Breadcrumb -->
<div class="bg-white border-b border-gray-200">
    <div class="container mx-auto px-4 py-3">
        <nav class="flex items-center gap-2 text-sm">
            <a href="/" class="text-gray-700 hover:text-[#4a6741]">Start page</a>
            <span class="text-gray-400">></span>
            <span class="text-gray-900 font-semibold">Exhibition systems</span>
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
                    <h3 class="font-bold text-gray-900 text-base mb-4">Exhibition systems</h3>
                    <ul class="space-y-3">
                        <li><a href="#exhibition-displays" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Exhibition displays</a></li>
                        <li><a href="#pop-up-counter" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Pop up counter</a></li>
                        <li><a href="#roller-banner" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Roller banner</a></li>
                        <li><a href="#ellipse-display" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Ellipse display</a></li>
                        <li><a href="#xl-banners" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">X/L-banners</a></li>
                        <li><a href="#pvc-tarpaulins" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">PVC tarpaulins</a></li>
                        <li><a href="#pos-displays" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">POS displays</a></li>
                        <li><a href="#led-displays" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">LED displays</a></li>
                        <li><a href="#outdoor-furniture" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Outdoor furniture</a></li>
                        <li><a href="#sidewalk-signs" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Sidewalk signs</a></li>
                        <li><a href="#covers-tablecloths" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Covers & Tablecloths</a></li>
                        <li><a href="#ceiling-banners" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Ceiling banners</a></li>
                    </ul>
                </div>
            </aside>

            <!-- Content Area -->
            <div class="lg:col-span-3 space-y-8">
                <!-- Banner -->
                <div class="relative rounded-lg overflow-hidden bg-gradient-to-r from-stone-300 via-stone-200 to-stone-100 h-48 flex items-center px-8">
                    <div class="relative z-10">
                        <h1 class="text-gray-900 text-3xl font-bold">Exhibition systems</h1>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Exhibition displays -->
                    <div id="exhibition-displays" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="h-56 bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/exhibition/exhibition-displays.jpg') }}" 
                                alt="Exhibition displays - Succeed at trade shows and events with large format exhibition display systems" 
                                title="Exhibition displays"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=&quot;w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs&quot;>Exhibition displays</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Exhibition displays</h3>
                            <p class="text-sm text-gray-600">Succeed at trade shows and events with large format exhibition display systems</p>
                        </div>
                    </div>

                    <!-- Pop up counter -->
                    <div id="pop-up-counter" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="h-56 bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/exhibition/pop-up-counter.jpg') }}" 
                                alt="Pop up counter - For professional trade show presentation" 
                                title="Pop up counter"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=&quot;w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs&quot;>Pop up counter</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Pop up counter</h3>
                            <p class="text-sm text-gray-600">For professional trade show presentation</p>
                        </div>
                    </div>

                    <!-- Roller banner -->
                    <div id="roller-banner" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="h-56 bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/exhibition/roller-banner.jpg') }}" 
                                alt="Roller banner - Complete roller banners and new prints for existing systems" 
                                title="Roller banner"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=&quot;w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs&quot;>Roller banner</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Roller banner</h3>
                            <p class="text-sm text-gray-600">Complete roller banners and new prints for existing systems</p>
                        </div>
                    </div>

                    <!-- Ellipse Display -->
                    <div id="ellipse-display" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="h-56 bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/exhibition/ellipse-display.jpg') }}" 
                                alt="Ellipse Display - For a lasting impression at every event – in various sizes" 
                                title="Ellipse Display"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=&quot;w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs&quot;>Ellipse Display</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Ellipse Display</h3>
                            <p class="text-sm text-gray-600">For a lasting impression at every event – in various sizes</p>
                        </div>
                    </div>

                    <!-- X/L-banners -->
                    <div id="xl-banners" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="h-56 bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/exhibition/xl-banners.jpg') }}" 
                                alt="X/L-banners - Large-format presentation systems – easy and quick to set up thanks to their X or L-shaped frames" 
                                title="X/L-banners"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=&quot;w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs&quot;>X/L-banners</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">X/L-banners</h3>
                            <p class="text-sm text-gray-600">Large-format presentation systems – easy and quick to set up thanks to their X or L-shaped frames</p>
                        </div>
                    </div>

                    <!-- PVC tarpaulins -->
                    <div id="pvc-tarpaulins" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="h-56 bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/exhibition/pvc-tarpaulins.jpg') }}" 
                                alt="PVC tarpaulins - Durable, weather-resistant and available in a variety of sizes" 
                                title="PVC tarpaulins"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=&quot;w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs&quot;>PVC tarpaulins</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">PVC tarpaulins</h3>
                            <p class="text-sm text-gray-600">Durable, weather-resistant and available in a variety of sizes</p>
                        </div>
                    </div>

                    <!-- POS displays -->
                    <div id="pos-displays" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="h-56 bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/exhibition/pos-displays.jpg') }}" 
                                alt="POS displays - Make your customers curious with creative point-of-sale displays" 
                                title="POS displays"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=&quot;w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs&quot;>POS displays</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">POS displays</h3>
                            <p class="text-sm text-gray-600">Make your customers curious with creative point-of-sale displays</p>
                        </div>
                    </div>

                    <!-- LED displays -->
                    <div id="led-displays" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="h-56 bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/exhibition/led-displays.jpg') }}" 
                                alt="LED displays - Present your message in the best light – with perfectly lit displays" 
                                title="LED displays"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=&quot;w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs&quot;>LED displays</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">LED displays</h3>
                            <p class="text-sm text-gray-600">Present your message in the best light – with perfectly lit displays</p>
                        </div>
                    </div>

                    <!-- Outdoor furniture -->
                    <div id="outdoor-furniture" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="h-56 bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/exhibition/outdoor-furniture.jpg') }}" 
                                alt="Outdoor furniture" 
                                title="Outdoor furniture"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=&quot;w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs&quot;>Outdoor furniture</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Outdoor furniture</h3>
                            <p class="text-sm text-gray-600">High-quality outdoor furniture for exhibitions and events</p>
                        </div>
                    </div>

                    <!-- Sidewalk signs -->
                    <div id="sidewalk-signs" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="h-56 bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/exhibition/sidewalk-signs.jpg') }}" 
                                alt="Sidewalk signs" 
                                title="Sidewalk signs"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=&quot;w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs&quot;>Sidewalk signs</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Sidewalk signs</h3>
                            <p class="text-sm text-gray-600">Attention-grabbing sidewalk signage for outdoor promotion</p>
                        </div>
                    </div>

                    <!-- Covers & Tablecloths -->
                    <div id="covers-tablecloths" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="h-56 bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/exhibition/covers-tablecloths.jpg') }}" 
                                alt="Covers & Tablecloths" 
                                title="Covers & Tablecloths"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=&quot;w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs&quot;>Covers & Tablecloths</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Covers & Tablecloths</h3>
                            <p class="text-sm text-gray-600">Professional branded covers and tablecloths for events</p>
                        </div>
                    </div>

                    <!-- Ceiling banners -->
                    <div id="ceiling-banners" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="h-56 bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/exhibition/ceiling-banners.jpg') }}" 
                                alt="Ceiling banners" 
                                title="Ceiling banners"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=&quot;w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs&quot;>Ceiling banners</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Ceiling banners</h3>
                            <p class="text-sm text-gray-600">Eye-catching ceiling banners for maximum visibility</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection