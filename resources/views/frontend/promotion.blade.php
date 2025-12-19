@extends('layouts.app')

@section('title', 'Promosi Souvenir - Galaxy Digital Printing')

@section('content')
<!-- Breadcrumb -->
<div class="bg-white border-b border-gray-200">
    <div class="container mx-auto px-4 py-3">
        <nav class="flex items-center gap-2 text-sm">
            <a href="/" class="text-gray-700 hover:text-[#4a6741]">Start page</a>
            <span class="text-gray-400">></span>
            <span class="text-gray-900 font-semibold">Promotional items</span>
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
                    <h3 class="font-bold text-gray-900 text-base mb-4">Promotional items</h3>
                    <ul class="space-y-3">
                        <li><a href="#personalised-products" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Personalised products</a></li>
                        <li><a href="#office" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Office</a></li>
                        <li><a href="#bags" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Bags</a></li>
                        <li><a href="#home" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Home</a></li>
                        <li><a href="#recreation-outdoors" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Recreation & outdoors</a></li>
                        <li><a href="#premium-promotional-items" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Premium promotional items</a></li>
                        <li><a href="#sweets" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Sweets</a></li>
                        <li><a href="#biscuits-salty-snacks" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Biscuits & salty snacks</a></li>
                        <li><a href="#clothing-textiles" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Clothing & textiles</a></li>
                        <li><a href="#cleaning-cloths-pads" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Cleaning cloths & pads</a></li>
                        <li><a href="#buttons-magnets" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Buttons & magnets</a></li>
                        <li><a href="#tools-equipment" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Tools & equipment</a></li>
                        <li><a href="#christmas" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Christmas</a></li>
                    </ul>
                </div>
            </aside>

            <!-- Content Area -->
            <div class="lg:col-span-3 space-y-8">
                <!-- Banner Heading (right of sidebar) -->
                <div class="relative rounded-lg overflow-hidden bg-gradient-to-r from-stone-300 via-stone-200 to-stone-100 h-40 flex items-center px-8">
                    <h1 class="text-gray-900 text-2xl lg:text-3xl font-bold">Promotional items</h1>
                </div>
                <!-- Categories Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Personalised products -->
                    <div id="personalised-products" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[4/3] bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/promotional-items/personalised-products.jpg') }}" 
                                alt="Personalised products - mugs, keyrings, pens" 
                                title="Personalised products"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Personalised products</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900">Personalised products</h3>
                        </div>
                    </div>

                    <!-- Office -->
                    <div id="office" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[4/3] bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/promotional-items/office.jpg') }}" 
                                alt="Office gifts - notebooks, calculators and sets" 
                                title="Office"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Office</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900">Office</h3>
                        </div>
                    </div>

                    <!-- Bags -->
                    <div id="bags" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[4/3] bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/promotional-items/bags.jpg') }}" 
                                alt="Bags - totes, drawstring and shoppers" 
                                title="Bags"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Bags</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900">Bags</h3>
                        </div>
                    </div>

                    <!-- Home -->
                    <div id="home" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[4/3] bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/promotional-items/home.jpg') }}" 
                                alt="Home gifts - mugs, grinders and accessories" 
                                title="Home"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Home</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900">Home</h3>
                        </div>
                    </div>

                    <!-- Recreation & outdoors -->
                    <div id="recreation-outdoors" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[4/3] bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/promotional-items/recreation-outdoors.jpg') }}" 
                                alt="Recreation & outdoors - leisure and outdoor items" 
                                title="Recreation & outdoors"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Recreation & outdoors</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900">Recreation & outdoors</h3>
                        </div>
                    </div>

                    <!-- Premium promotional items -->
                    <div id="premium-promotional-items" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[4/3] bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/promotional-items/premium-promotional-items.jpg') }}" 
                                alt="Premium promotional items" 
                                title="Premium promotional items"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Premium promotional items</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900">Premium promotional items</h3>
                        </div>
                    </div>

                    <!-- Sweets -->
                    <div id="sweets" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[4/3] bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/promotional-items/sweets.jpg') }}" 
                                alt="Sweets promotional treats" 
                                title="Sweets"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Sweets</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900">Sweets</h3>
                        </div>
                    </div>

                    <!-- Biscuits & salty snacks -->
                    <div id="biscuits-salty-snacks" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[4/3] bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/promotional-items/biscuits-salty-snacks.jpg') }}" 
                                alt="Biscuits & salty snacks" 
                                title="Biscuits & salty snacks"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Biscuits & salty snacks</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900">Biscuits & salty snacks</h3>
                        </div>
                    </div>

                    <!-- Clothing & textiles -->
                    <div id="clothing-textiles" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[4/3] bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/promotional-items/clothing-textiles.jpg') }}" 
                                alt="Clothing & textiles" 
                                title="Clothing & textiles"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Clothing & textiles</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900">Clothing & textiles</h3>
                        </div>
                    </div>

                    <!-- Cleaning cloths & pads -->
                    <div id="cleaning-cloths-pads" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[4/3] bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/promotional-items/cleaning-cloths-pads.jpg') }}" 
                                alt="Cleaning cloths & pads" 
                                title="Cleaning cloths & pads"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Cleaning cloths & pads</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900">Cleaning cloths & pads</h3>
                        </div>
                    </div>

                    <!-- Buttons & magnets -->
                    <div id="buttons-magnets" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[4/3] bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/promotional-items/buttons-magnets.jpg') }}" 
                                alt="Buttons & magnets" 
                                title="Buttons & magnets"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Buttons & magnets</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900">Buttons & magnets</h3>
                        </div>
                    </div>

                    <!-- Tools & equipment -->
                    <div id="tools-equipment" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[4/3] bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/promotional-items/tools-equipment.jpg') }}" 
                                alt="Tools & equipment" 
                                title="Tools & equipment"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Tools & equipment</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900">Tools & equipment</h3>
                        </div>
                    </div>

                    <!-- Christmas -->
                    <div id="christmas" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[4/3] bg-gray-100 overflow-hidden relative flex items-center justify-center">
                            <img 
                                src="{{ asset('images/products/promotional-items/christmas.jpg') }}" 
                                alt="Christmas promotional gifts" 
                                title="Christmas"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Christmas</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900">Christmas</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection