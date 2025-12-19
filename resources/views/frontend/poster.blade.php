@extends('layouts.app')

@section('title', 'Posters - Galaxy Digital Printing')

@section('content')
<!-- Breadcrumb -->
<div class="bg-white border-b border-gray-200">
    <div class="container mx-auto px-4 py-3">
        <nav class="flex items-center gap-2 text-sm">
            <a href="/" class="text-gray-700 hover:text-[#4a6741]">Start page</a>
            <span class="text-gray-400">></span>
            <span class="text-gray-900 font-semibold">Posters</span>
        </nav>
    </div>
</div>

<!-- Main Content -->
<section class="bg-white">
    <div class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Sidebar -->
            <aside class="lg:col-span-1">
                <div>
                    <h3 class="font-bold text-gray-900 text-base mb-4">Posters</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#basic" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Posters</a>
                        </li>
                        <li>
                            <a href="#short-runs" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Posters/Plots (short runs)</a>
                        </li>
                        <li>
                            <a href="#special" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Posters with special-effect colours</a>
                        </li>
                        <li>
                            <a href="#eco" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Posters eco/natural paper</a>
                        </li>
                        <li>
                            <a href="#neon" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Neon posters</a>
                        </li>
                        <li>
                            <a href="#corrugated" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Corrugated plastic sheets</a>
                        </li>
                        <li>
                            <a href="#corrugated-large" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Corrugated plastic sheets (large print runs)</a>
                        </li>
                        <li>
                            <a href="#weather-proof" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Weather-proof posters</a>
                        </li>
                        <li>
                            <a href="#uv-finished" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Posters UV-finished</a>
                        </li>
                        <li>
                            <a href="#stretcher" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Stretcher frame</a>
                        </li>
                        <li>
                            <a href="#printed-sheets" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Printed sheets</a>
                        </li>
                        <li>
                            <a href="#fabric" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Fabric posters</a>
                        </li>
                        <li>
                            <a href="#multi-pack" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Posters multi-Pack</a>
                        </li>
                        <li>
                            <a href="#multi-plots" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Multi-packs Plots</a>
                        </li>
                    </ul>
                </div>
            </aside>

            <!-- Content Area -->
            <div class="lg:col-span-3 space-y-8">
                <!-- Banner -->
                <div class="relative rounded-lg overflow-hidden bg-gradient-to-r from-gray-400 to-gray-300 h-48 flex items-center px-8">
                    <div class="relative z-10">
                        <h1 class="text-gray-900 text-3xl font-bold">Posters</h1>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Posters -->
                    <div id="basic" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/posters/posters-basic.jpg') }}" 
                                alt="Posters - All standard formats and paper types. One, four or five colour printed" 
                                title="Posters"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Posters</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Posters</h3>
                            <p class="text-sm text-gray-600">All standard formats and paper types. One, four or five colour printed.</p>
                        </div>
                    </div>

                    <!-- Posters/Plots (short runs) -->
                    <div id="short-runs" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/posters/posters-plots-short.jpg') }}" 
                                alt="Posters/Plots (short runs) - Large format digital prints, ideal for very small print runs"
                                title="Posters/Plots (short runs)"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Short Runs</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Posters/Plots (short runs)</h3>
                            <p class="text-sm text-gray-600">Large format digital prints, ideal for very small print runs.</p>
                        </div>
                    </div>

                    <!-- Posters with special-effect colours -->
                    <div id="special" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/posters/posters-special-effect.jpg') }}" 
                                alt="Posters with special-effect colours - Your big advertising messages with special colours"
                                title="Posters with special-effect colours"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Special Effect</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Posters with special-effect colours</h3>
                            <p class="text-sm text-gray-600">Your big advertising messages with special colours</p>
                        </div>
                    </div>

                    <!-- Posters eco/natural paper -->
                    <div id="eco" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/posters/posters-eco.jpg') }}" 
                                alt="Posters eco/natural paper - Go green! Recycled paper with a natural look"
                                title="Posters eco/natural paper"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Eco Paper</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Posters eco/natural paper</h3>
                            <p class="text-sm text-gray-600">Go green! Recycled paper with a natural look</p>
                        </div>
                    </div>

                    <!-- Neon posters -->
                    <div id="neon" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/posters/posters-neon.jpg') }}" 
                                alt="Neon posters - Eye-catching neon color printing for maximum visibility"
                                title="Neon posters"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Neon Posters</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Neon posters</h3>
                            <p class="text-sm text-gray-600">Eye-catching neon color printing for maximum visibility</p>
                        </div>
                    </div>

                    <!-- Corrugated plastic sheets -->
                    <div id="corrugated" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/posters/corrugated-plastic.jpg') }}" 
                                alt="Corrugated plastic sheets - Weather-resistant and durable advertising boards"
                                title="Corrugated plastic sheets"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Corrugated</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Corrugated plastic sheets</h3>
                            <p class="text-sm text-gray-600">Weather-resistant and durable advertising boards</p>
                        </div>
                    </div>

                    <!-- Corrugated plastic sheets (large print runs) -->
                    <div id="corrugated-large" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/posters/corrugated-plastic-large.jpg') }}" 
                                alt="Corrugated plastic sheets (large print runs) - Economy option for large quantities"
                                title="Corrugated plastic sheets (large print runs)"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Large Runs</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Corrugated plastic sheets (large print runs)</h3>
                            <p class="text-sm text-gray-600">Economy option for large quantities</p>
                        </div>
                    </div>

                    <!-- Weather-proof posters -->
                    <div id="weather-proof" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/posters/weather-proof.jpg') }}" 
                                alt="Weather-proof posters - Outdoor advertising that withstands rain, wind and sun"
                                title="Weather-proof posters"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Weather-proof</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Weather-proof posters</h3>
                            <p class="text-sm text-gray-600">Outdoor advertising that withstands rain, wind and sun</p>
                        </div>
                    </div>

                    <!-- Posters UV-finished -->
                    <div id="uv-finished" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/posters/uv-finished.jpg') }}" 
                                alt="Posters UV-finished - Premium finish with spot UV varnish for enhanced appearance"
                                title="Posters UV-finished"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>UV Finished</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Posters UV-finished</h3>
                            <p class="text-sm text-gray-600">Premium finish with spot UV varnish for enhanced appearance</p>
                        </div>
                    </div>

                    <!-- Stretcher frame -->
                    <div id="stretcher" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/posters/stretcher-frame.jpg') }}" 
                                alt="Stretcher frame - Canvas-style posters on wooden stretcher frames"
                                title="Stretcher frame"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Stretcher Frame</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Stretcher frame</h3>
                            <p class="text-sm text-gray-600">Canvas-style posters on wooden stretcher frames</p>
                        </div>
                    </div>

                    <!-- Printed sheets -->
                    <div id="printed-sheets" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/posters/printed-sheets.jpg') }}" 
                                alt="Printed sheets - Large format printed materials for various applications"
                                title="Printed sheets"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Printed Sheets</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Printed sheets</h3>
                            <p class="text-sm text-gray-600">Large format printed materials for various applications</p>
                        </div>
                    </div>

                    <!-- Fabric posters -->
                    <div id="fabric" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/posters/fabric-posters.jpg') }}" 
                                alt="Fabric posters - Soft textile printing for elegant display"
                                title="Fabric posters"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Fabric Posters</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Fabric posters</h3>
                            <p class="text-sm text-gray-600">Soft textile printing for elegant display</p>
                        </div>
                    </div>

                    <!-- Posters multi-Pack -->
                    <div id="multi-pack" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/posters/posters-multipack.jpg') }}" 
                                alt="Posters multi-Pack - Bundle deals for economical poster printing"
                                title="Posters multi-Pack"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Multi-Pack</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Posters multi-Pack</h3>
                            <p class="text-sm text-gray-600">Bundle deals for economical poster printing</p>
                        </div>
                    </div>

                    <!-- Multi-packs Plots -->
                    <div id="multi-plots" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/posters/multipacks-plots.jpg') }}" 
                                alt="Multi-packs Plots - Bundle packages of various plot sizes and styles"
                                title="Multi-packs Plots"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Multi-packs</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Multi-packs Plots</h3>
                            <p class="text-sm text-gray-600">Bundle packages of various plot sizes and styles</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection