@extends('layouts.app')

@section('title', 'Business Card Sample - Galaxy Digital Printing')

@section('content')
<!-- Breadcrumb -->
<div class="bg-white border-b border-gray-200">
    <div class="container mx-auto px-4 py-3">
        <nav class="flex items-center gap-2 text-sm flex-wrap">
            <a href="/" class="text-gray-700 hover:text-[#4a6741]">Start page</a>
            <span class="text-gray-400">></span>
            <a href="{{ route('sampel-produk') }}" class="text-gray-700 hover:text-[#4a6741]">Product sample</a>
            <span class="text-gray-400">></span>
            <span class="text-gray-900 font-semibold">Business card sample</span>
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
                        <li class="font-semibold text-[#4a6741]">
                            <a href="{{ route('business-card-sample') }}" class="hover:text-gray-700">Business card sample</a>
                        </li>
                        <li><a href="{{ route('colour-chart-sample') }}" class="text-sm text-gray-700 hover:text-[#4a6741] hover:font-semibold transition-colors">Colour chart, silver (metallic)</a></li>
                    </ul>
                </div>
            </aside>

            <!-- Content Area -->
            <div class="lg:col-span-3 space-y-8">
                <!-- Banner -->
                <div class="relative rounded-lg overflow-hidden bg-gradient-to-r from-stone-300 via-stone-200 to-stone-100 h-48 flex items-center px-8">
                    <div class="relative z-10">
                        <h1 class="text-gray-900 text-3xl font-bold">Business card sample</h1>
                    </div>
                </div>

                <!-- Product Description -->
                <div class="bg-white rounded-lg border border-gray-200 p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-4">Get an insight into the diverse world of our business cards</h2>
                    <p class="text-gray-700 leading-relaxed mb-6">
                        Explore our extensive business card collection through our sample pack. Each sample showcases different finishes, dimensions, and special effects to help you create the perfect first impression.
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Sample 1 -->
                        <div class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-shadow">
                            <div class="aspect-[4/3] bg-gray-100 rounded-lg mb-4 flex items-center justify-center">
                                <img 
                                    src="{{ asset('images/products/samples/business-card-1.jpg') }}" 
                                    alt="Standard business card sample" 
                                    title="Standard Business Card"
                                    class="w-full h-full object-cover rounded-lg"
                                    loading="lazy"
                                    onerror="this.parentElement.innerHTML='<div class=&quot;w-full h-full flex items-center justify-center text-gray-400&quot;>Business Card Sample</div>'">
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2">Standard Business Card</h3>
                            <p class="text-sm text-gray-600">Classic 85 x 55mm format with glossy finish</p>
                            <button class="mt-4 w-full bg-[#4a6741] hover:bg-[#3a5631] text-white font-semibold py-2 px-4 rounded transition-colors">
                                Order Sample
                            </button>
                        </div>

                        <!-- Sample 2 -->
                        <div class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-shadow">
                            <div class="aspect-[4/3] bg-gray-100 rounded-lg mb-4 flex items-center justify-center">
                                <img 
                                    src="{{ asset('images/products/samples/business-card-2.jpg') }}" 
                                    alt="Premium matte business card sample" 
                                    title="Premium Matte Card"
                                    class="w-full h-full object-cover rounded-lg"
                                    loading="lazy"
                                    onerror="this.parentElement.innerHTML='<div class=&quot;w-full h-full flex items-center justify-center text-gray-400&quot;>Premium Matte Card</div>'">
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2">Premium Matte Card</h3>
                            <p class="text-sm text-gray-600">Sophisticated matte finish with soft touch coating</p>
                            <button class="mt-4 w-full bg-[#4a6741] hover:bg-[#3a5631] text-white font-semibold py-2 px-4 rounded transition-colors">
                                Order Sample
                            </button>
                        </div>

                        <!-- Sample 3 -->
                        <div class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-shadow">
                            <div class="aspect-[4/3] bg-gray-100 rounded-lg mb-4 flex items-center justify-center">
                                <img 
                                    src="{{ asset('images/products/samples/business-card-3.jpg') }}" 
                                    alt="Luxury cardstock business card sample" 
                                    title="Luxury Cardstock"
                                    class="w-full h-full object-cover rounded-lg"
                                    loading="lazy"
                                    onerror="this.parentElement.innerHTML='<div class=&quot;w-full h-full flex items-center justify-center text-gray-400&quot;>Luxury Cardstock</div>'">
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2">Luxury Cardstock</h3>
                            <p class="text-sm text-gray-600">Premium thickness with metallic accents</p>
                            <button class="mt-4 w-full bg-[#4a6741] hover:bg-[#3a5631] text-white font-semibold py-2 px-4 rounded transition-colors">
                                Order Sample
                            </button>
                        </div>

                        <!-- Sample 4 -->
                        <div class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-shadow">
                            <div class="aspect-[4/3] bg-gray-100 rounded-lg mb-4 flex items-center justify-center">
                                <img 
                                    src="{{ asset('images/products/samples/business-card-4.jpg') }}" 
                                    alt="Spot UV business card sample" 
                                    title="Spot UV Card"
                                    class="w-full h-full object-cover rounded-lg"
                                    loading="lazy"
                                    onerror="this.parentElement.innerHTML='<div class=&quot;w-full h-full flex items-center justify-center text-gray-400&quot;>Spot UV Card</div>'">
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2">Spot UV Card</h3>
                            <p class="text-sm text-gray-600">Selective UV coating for special highlight effects</p>
                            <button class="mt-4 w-full bg-[#4a6741] hover:bg-[#3a5631] text-white font-semibold py-2 px-4 rounded transition-colors">
                                Order Sample
                            </button>
                        </div>

                        <!-- Sample 5 -->
                        <div class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-shadow">
                            <div class="aspect-[4/3] bg-gray-100 rounded-lg mb-4 flex items-center justify-center">
                                <img 
                                    src="{{ asset('images/products/samples/business-card-5.jpg') }}" 
                                    alt="Eco-friendly business card sample" 
                                    title="Eco-Friendly Card"
                                    class="w-full h-full object-cover rounded-lg"
                                    loading="lazy"
                                    onerror="this.parentElement.innerHTML='<div class=&quot;w-full h-full flex items-center justify-center text-gray-400&quot;>Eco-Friendly Card</div>'">
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2">Eco-Friendly Card</h3>
                            <p class="text-sm text-gray-600">100% recycled material with natural look</p>
                            <button class="mt-4 w-full bg-[#4a6741] hover:bg-[#3a5631] text-white font-semibold py-2 px-4 rounded transition-colors">
                                Order Sample
                            </button>
                        </div>

                        <!-- Sample 6 -->
                        <div class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-shadow">
                            <div class="aspect-[4/3] bg-gray-100 rounded-lg mb-4 flex items-center justify-center">
                                <img 
                                    src="{{ asset('images/products/samples/business-card-6.jpg') }}" 
                                    alt="Rounded corner business card sample" 
                                    title="Rounded Corner Card"
                                    class="w-full h-full object-cover rounded-lg"
                                    loading="lazy"
                                    onerror="this.parentElement.innerHTML='<div class=&quot;w-full h-full flex items-center justify-center text-gray-400&quot;>Rounded Corner Card</div>'">
                            </div>
                            <h3 class="font-bold text-gray-900 mb-2">Rounded Corner Card</h3>
                            <p class="text-sm text-gray-600">Modern rounded edges for contemporary look</p>
                            <button class="mt-4 w-full bg-[#4a6741] hover:bg-[#3a5631] text-white font-semibold py-2 px-4 rounded transition-colors">
                                Order Sample
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
