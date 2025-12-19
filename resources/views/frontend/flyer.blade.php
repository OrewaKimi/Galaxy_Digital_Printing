@extends('layouts.app')

@section('title', 'Flyers & Leaflets - Galaxy Digital Printing')

@section('content')
<!-- Breadcrumb -->
<div class="bg-white border-b border-gray-200">
    <div class="container mx-auto px-4 py-3">
        <nav class="flex items-center gap-2 text-sm">
            <a href="/" class="text-gray-700 hover:text-[#4a6741]">Start page</a>
            <span class="text-gray-400">></span>
            <span class="text-gray-900 font-semibold">Flyers & Leaflets</span>
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
                    <h3 class="font-bold text-gray-900 text-base mb-4">Flyers & Leaflets</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#both-sides" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Flyers & Leaflets, printed on both sides</a>
                        </li>
                        <li>
                            <a href="#one-side" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Flyers & Leaflets, printed on one side</a>
                        </li>
                        <li>
                            <a href="#eco" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Flyers & Leaflets eco/natural paper, 4/4</a>
                        </li>
                        <li>
                            <a href="#eco-one" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Flyers & Leaflets eco/natural paper, 4/0</a>
                        </li>
                        <li>
                            <a href="#special" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Flyers with special-effect colours</a>
                        </li>
                        <li>
                            <a href="#same-day" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Flyers & Leaflets - same-day print 12 noon (CET)</a>
                        </li>
                        <li>
                            <a href="#spot" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Flyers & Leaflets with spot finish</a>
                        </li>
                        <li>
                            <a href="#exclusive" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Exclusive flyers & leaflets</a>
                        </li>
                        <li>
                            <a href="#plastic" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Plastic cards</a>
                        </li>
                        <li>
                            <a href="#multi" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Flyers & Leaflets - multi-packs</a>
                        </li>
                    </ul>
                </div>
            </aside>

            <!-- Content Area -->
            <div class="lg:col-span-3 space-y-8">
                <!-- Banner -->
                <div class="relative rounded-lg overflow-hidden bg-gradient-to-r from-gray-400 to-gray-300 h-48 flex items-center px-8">
                    <div class="relative z-10">
                        <h1 class="text-gray-900 text-3xl font-bold">Flyers & Leaflets</h1>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Flyers both sides 1 -->
                    <div id="both-sides" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/flyers-leaflets/both-sides-44.jpg') }}" 
                                alt="Flyers & Leaflets printed on both sides - 4/4 colored flyers in various formats" 
                                title="Flyers & Leaflets printed on both sides"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Flyers Both Sides</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Flyers & Leaflets, printed on both sides</h3>
                            <p class="text-sm text-gray-600">4/4 colored flyers & leaflets in various formats and paper types.</p>
                        </div>
                    </div>

                    <!-- Flyers one side -->
                    <div id="one-side" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/flyers-leaflets/one-side-40.jpg') }}" 
                                alt="Flyers & Leaflets printed on one side - 4/0 colored flyers"
                                title="Flyers & Leaflets printed on one side"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Flyers One Side</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Flyers & Leaflets, printed on one side</h3>
                            <p class="text-sm text-gray-600">4/0 colored flyers with front side printed in all standard formats.</p>
                        </div>
                    </div>

                    <!-- Eco natural paper 4/4 -->
                    <div id="eco" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/flyers-leaflets/eco-natural-44.jpg') }}" 
                                alt="Flyers & Leaflets eco/natural paper 4/4 - recycled paper, carbon neutral"
                                title="Flyers & Leaflets eco/natural paper 4/4"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Eco 4/4</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Flyers & Leaflets eco/natural paper, 4/4</h3>
                            <p class="text-sm text-gray-600">Natural look, printed products on recycled paper, carbon neutral</p>
                        </div>
                    </div>

                    <!-- Eco natural paper 4/0 -->
                    <div id="eco-one" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/flyers-leaflets/eco-natural-40.jpg') }}" 
                                alt="Flyers & Leaflets eco/natural paper 4/0 - recycled paper, carbon neutral"
                                title="Flyers & Leaflets eco/natural paper 4/0"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Eco 4/0</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Flyers & Leaflets eco/natural paper, 4/0</h3>
                            <p class="text-sm text-gray-600">Natural look, printed products on recycled paper, carbon neutral</p>
                        </div>
                    </div>

                    <!-- Special effect colors -->
                    <div id="special" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/flyers-leaflets/special-effect-colors.jpg') }}" 
                                alt="Flyers with special-effect colours - premium colors and finishes"
                                title="Flyers with special-effect colours"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Special Colors</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Flyers with special-effect colours</h3>
                            <p class="text-sm text-gray-600">High-quality specialty colors for maximum impact and visual appeal.</p>
                        </div>
                    </div>

                    <!-- Same day print -->
                    <div id="same-day" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/flyers-leaflets/same-day-print.jpg') }}" 
                                alt="Flyers & Leaflets same-day print - rush printing service 12 noon CET"
                                title="Flyers & Leaflets same-day print"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Same Day</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Flyers & Leaflets - same-day print 12 noon (CET)</h3>
                            <p class="text-sm text-gray-600">Rush printing service for urgent flyer orders with quick turnaround.</p>
                        </div>
                    </div>

                    <!-- Spot finish -->
                    <div id="spot" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/flyers-leaflets/spot-finish.jpg') }}" 
                                alt="Flyers & Leaflets with spot finish - premium varnish and spot UV"
                                title="Flyers & Leaflets with spot finish"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Spot Finish</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Flyers & Leaflets with spot finish</h3>
                            <p class="text-sm text-gray-600">Premium finishes with selective varnish or spot UV for enhanced elegance.</p>
                        </div>
                    </div>

                    <!-- Exclusive -->
                    <div id="exclusive" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/flyers-leaflets/exclusive.jpg') }}" 
                                alt="Exclusive flyers & leaflets - premium designs with special materials"
                                title="Exclusive flyers & leaflets"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Exclusive</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Exclusive flyers & leaflets</h3>
                            <p class="text-sm text-gray-600">Unique premium designs with special materials and custom finishes available.</p>
                        </div>
                    </div>

                    <!-- Plastic cards -->
                    <div id="plastic" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/flyers-leaflets/plastic-cards.jpg') }}" 
                                alt="Plastic cards - durable waterproof flyers for outdoor use"
                                title="Plastic cards"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Plastic Cards</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Plastic cards</h3>
                            <p class="text-sm text-gray-600">Durable plastic flyers and cards for outdoor and waterproof applications.</p>
                        </div>
                    </div>

                    <!-- Multi-packs -->
                    <div id="multi" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/flyers-leaflets/multi-packs.jpg') }}" 
                                alt="Flyers & Leaflets multi-packs - bundle deals for large-scale printing"
                                title="Flyers & Leaflets multi-packs"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Multi-packs</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Flyers & Leaflets - multi-packs</h3>
                            <p class="text-sm text-gray-600">Bundle deals with mixed designs for economical large-scale printing.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection