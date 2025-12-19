@extends('layouts.app')

@section('title', 'Folded Leaflets - Galaxy Digital Printing')

@section('content')
<!-- Breadcrumb -->
<div class="bg-white border-b border-gray-200">
    <div class="container mx-auto px-4 py-3">
        <nav class="flex items-center gap-2 text-sm">
            <a href="/" class="text-gray-700 hover:text-[#4a6741]">Start page</a>
            <span class="text-gray-400">></span>
            <span class="text-gray-900 font-semibold">Folded Leaflets</span>
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
                    <h3 class="font-bold text-gray-900 text-base mb-4">Folded Leaflets</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#basic" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Folded leaflets</a>
                        </li>
                        <li>
                            <a href="#eco" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Folded leaflets eco/natural paper</a>
                        </li>
                        <li>
                            <a href="#special" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Folded leaflets with special-effect colours</a>
                        </li>
                        <li>
                            <a href="#same-day" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Folded leaflets same-day print 12 noon</a>
                        </li>
                        <li>
                            <a href="#perforated" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Perforated folded leaflets</a>
                        </li>
                        <li>
                            <a href="#cards" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Folded cards</a>
                        </li>
                    </ul>
                </div>
            </aside>

            <!-- Content Area -->
            <div class="lg:col-span-3 space-y-8">
                <!-- Banner -->
                <div class="relative rounded-lg overflow-hidden bg-gradient-to-r from-gray-400 to-gray-300 h-48 flex items-center px-8">
                    <div class="relative z-10">
                        <h1 class="text-gray-900 text-3xl font-bold">Folded Leaflets</h1>
                    </div>
                </div>

                <!-- Product Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Folded leaflets -->
                    <div id="basic" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/folded-leaflets/folded-leaflets.jpg') }}" 
                                alt="Folded leaflets - Open and leaf through: more space for your advertising messages" 
                                title="Folded leaflets"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Folded Leaflets</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Folded leaflets</h3>
                            <p class="text-sm text-gray-600">Open and leaf through: more space for your advertising messages.</p>
                        </div>
                    </div>

                    <!-- Folded leaflets eco/natural paper -->
                    <div id="eco" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/folded-leaflets/eco-natural.jpg') }}" 
                                alt="Folded leaflets eco/natural paper - Create a sustainable impact - with a natural look"
                                title="Folded leaflets eco/natural paper"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Eco Natural</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Folded leaflets eco/natural paper</h3>
                            <p class="text-sm text-gray-600">Create a sustainable impact - with a natural look</p>
                        </div>
                    </div>

                    <!-- Folded leaflets special-effect colours -->
                    <div id="special" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/folded-leaflets/special-effect.jpg') }}" 
                                alt="Folded Leaflets with special-effect colours - More space for your advertising messages with special-effect colours"
                                title="Folded Leaflets with special-effect colours"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Special Effect</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Folded Leaflets with special-effect colours</h3>
                            <p class="text-sm text-gray-600">More space for your advertising messages with special-effect colours</p>
                        </div>
                    </div>

                    <!-- Folded leaflets same-day print -->
                    <div id="same-day" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/folded-leaflets/same-day-print.jpg') }}" 
                                alt="Folded leaflets same-day print 12 noon - Have your folded leaflets produced today with our same-day printing option"
                                title="Folded leaflets same-day print 12 noon"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Same Day Print</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Folded leaflets same-day print 12 noon</h3>
                            <p class="text-sm text-gray-600">Have your folded leaflets produced today with our same-day printing option.</p>
                        </div>
                    </div>

                    <!-- Perforated folded leaflets -->
                    <div id="perforated" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/folded-leaflets/perforated.jpg') }}" 
                                alt="Perforated folded leaflets - Practical perforation for easy separation"
                                title="Perforated folded leaflets"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Perforated</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Perforated folded leaflets</h3>
                            <p class="text-sm text-gray-600">Practical perforation for easy separation and detachable elements.</p>
                        </div>
                    </div>

                    <!-- Folded cards -->
                    <div id="cards" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow group">
                        <div class="aspect-[3/4] bg-gray-100 overflow-hidden relative">
                            <img 
                                src="{{ asset('images/products/folded-leaflets/folded-cards.jpg') }}" 
                                alt="Folded cards - Compact folded greeting and business cards"
                                title="Folded cards"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Folded Cards</div>'">
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-gray-900 mb-2">Folded cards</h3>
                            <p class="text-sm text-gray-600">Compact folded greeting and business cards for special occasions.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection