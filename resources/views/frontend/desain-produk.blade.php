@extends('layouts.app')

@section('title', 'Design Your Print Products Easily - Galaxy Digital Printing')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-gray-100 to-gray-200 py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="bg-white rounded-lg p-8 lg:p-12 shadow-sm">
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6 leading-tight">
                    Design your print products easily
                </h1>
                <p class="text-lg text-gray-700 leading-relaxed">
                    You do not have to be an experienced graphic designer to create impressive ads or have your logo printed on promotional items! 
                    Develop your designs online directly in your browser and enjoy ultimate creative freedom. Quickly and easily!
                </p>
            </div>

            <!-- Right Image -->
            <div class="relative">
                <img 
                    src="{{ asset('images/design-hero.jpg') }}" 
                    alt="Design your products" 
                    class="w-full h-auto rounded-lg shadow-lg"
                    onerror="this.parentElement.innerHTML='<div class=\'w-full aspect-video bg-gray-300 rounded-lg flex items-center justify-center\'><span class=\'text-gray-500\'>Designer at work</span></div>'">
            </div>
        </div>
    </div>
</section>

<!-- Tab Navigation -->
<section class="bg-white border-b border-gray-200 sticky top-0 z-10">
    <div class="container mx-auto px-4">
        <nav class="flex gap-2 overflow-x-auto">
            <a href="#product-overview" class="px-6 py-4 text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 whitespace-nowrap border-b-2 border-transparent hover:border-[#4a6741] transition-colors">
                Product overview
            </a>
            <a href="#high-quality" class="px-6 py-4 text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 whitespace-nowrap border-b-2 border-transparent hover:border-[#4a6741] transition-colors">
                High-quality images
            </a>
            <a href="#how-to" class="px-6 py-4 text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 whitespace-nowrap border-b-2 border-transparent hover:border-[#4a6741] transition-colors">
                How to
            </a>
            <a href="#benefits" class="px-6 py-4 text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 whitespace-nowrap border-b-2 border-transparent hover:border-[#4a6741] transition-colors">
                Your benefits
            </a>
            <a href="#faq" class="px-6 py-4 text-sm font-medium text-gray-700 hover:text-gray-900 hover:bg-gray-50 whitespace-nowrap border-b-2 border-transparent hover:border-[#4a6741] transition-colors">
                Frequently asked questions
            </a>
        </nav>
    </div>
</section>

<!-- Design Popular Classics Section -->
<section class="py-16 bg-white" id="product-overview">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8">Design popular classics quickly and easily</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Business cards -->
            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden border border-gray-100">
                <div class="aspect-[4/3] bg-white overflow-hidden p-6">
                    <img 
                        src="{{ asset('images/design-business-cards.jpg') }}" 
                        alt="Business cards" 
                        class="w-full h-full object-contain"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center bg-gray-50\'><svg class=\'w-16 h-16 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z\'/></svg></div>'">
                </div>
                <div class="p-6 border-t border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Business cards</h3>
                    <p class="text-sm text-gray-600">classic format 8.5 x 5.5 cm in different paper types</p>
                </div>
            </div>

            <!-- Calendars -->
            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden border border-gray-100">
                <div class="aspect-[4/3] bg-white overflow-hidden p-6">
                    <img 
                        src="{{ asset('images/design-calendars.jpg') }}" 
                        alt="Calendars" 
                        class="w-full h-full object-contain"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center bg-gray-50\'><svg class=\'w-16 h-16 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z\'/></svg></div>'">
                </div>
                <div class="p-6 border-t border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Calendars</h3>
                    <p class="text-sm text-gray-600">with or without pictures, for desks or walls, in different formats</p>
                </div>
            </div>

            <!-- Flyers -->
            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden border border-gray-100">
                <div class="aspect-[4/3] bg-white overflow-hidden p-6">
                    <img 
                        src="{{ asset('images/design-flyers.jpg') }}" 
                        alt="Flyers" 
                        class="w-full h-full object-contain"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center bg-gray-50\'><svg class=\'w-16 h-16 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z\'/></svg></div>'">
                </div>
                <div class="p-6 border-t border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Flyers</h3>
                    <p class="text-sm text-gray-600">available in many sizes and paper types</p>
                </div>
            </div>

            <!-- Letterheads -->
            <div class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow overflow-hidden border border-gray-100">
                <div class="aspect-[4/3] bg-white overflow-hidden p-6">
                    <img 
                        src="{{ asset('images/design-letterheads.jpg') }}" 
                        alt="Letterheads" 
                        class="w-full h-full object-contain"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center bg-gray-50\'><svg class=\'w-16 h-16 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z\'/></svg></div>'">
                </div>
                <div class="p-6 border-t border-gray-100">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Letterheads</h3>
                    <p class="text-sm text-gray-600">A4, designed quickly and easily</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- "Online design" made easy! Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-12">"Online design" made easy!</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="text-center">
                <div class="flex justify-center mb-6">
                    <svg class="w-24 h-24 text-[#6b7e62]" fill="currentColor" viewBox="0 0 100 100">
                        <rect x="20" y="20" width="25" height="25" rx="2"/>
                        <rect x="55" y="20" width="25" height="25" rx="2"/>
                        <rect x="20" y="55" width="25" height="25" rx="2"/>
                        <rect x="55" y="55" width="25" height="25" rx="2"/>
                        <path d="M35,10 L35,0 M50,20 L60,10 M50,20 L60,30" stroke="currentColor" stroke-width="3" fill="none"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">1. Choose a product</h3>
                <p class="text-sm text-gray-600">Select the format, paper type and quantity.</p>
            </div>

            <!-- Step 2 -->
            <div class="text-center">
                <div class="flex justify-center mb-6">
                    <svg class="w-24 h-24 text-[#6b7e62]" fill="currentColor" viewBox="0 0 100 100">
                        <rect x="25" y="20" width="50" height="60" rx="3" fill="none" stroke="currentColor" stroke-width="3"/>
                        <rect x="35" y="30" width="30" height="40" rx="2"/>
                        <path d="M15,40 L25,40 M75,40 L85,40" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
                        <circle cx="20" cy="40" r="3"/>
                        <circle cx="80" cy="40" r="3"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">2. Choose a template</h3>
                <p class="text-sm text-gray-600">Click "Design online" and pick a layout template</p>
            </div>

            <!-- Step 3 -->
            <div class="text-center">
                <div class="flex justify-center mb-6">
                    <svg class="w-24 h-24 text-[#6b7e62]" fill="currentColor" viewBox="0 0 100 100">
                        <rect x="20" y="20" width="40" height="30" rx="2" fill="none" stroke="currentColor" stroke-width="3"/>
                        <path d="M25,30 L35,40 L50,25" stroke="currentColor" stroke-width="3" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                        <rect x="65" y="55" width="15" height="25" rx="1" fill="none" stroke="currentColor" stroke-width="2"/>
                        <text x="67" y="72" font-size="16" font-weight="bold" fill="currentColor">T</text>
                        <path d="M60,65 L65,65 M80,65 L85,65 M60,75 L65,75 M80,75 L85,75" stroke="currentColor" stroke-width="2"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">3. Add custom content</h3>
                <p class="text-sm text-gray-600">Insert text and visuals and use the professional image material.</p>
            </div>

            <!-- Step 4 -->
            <div class="text-center">
                <div class="flex justify-center mb-6">
                    <svg class="w-24 h-24 text-[#6b7e62]" fill="currentColor" viewBox="0 0 100 100">
                        <circle cx="70" cy="70" r="15" fill="none" stroke="currentColor" stroke-width="3"/>
                        <circle cx="30" cy="70" r="15" fill="none" stroke="currentColor" stroke-width="3"/>
                        <path d="M45,70 L55,70 M70,55 L70,45 L30,45 L30,55" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M65,35 L75,45 L65,55" fill="currentColor"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-3">4. Check out</h3>
                <p class="text-sm text-gray-600">Finalize your design and order the product.</p>
            </div>
        </div>
    </div>
</section>

<!-- Quick and easy: Your benefits Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-12">Quick and easy: Your benefits at a glance</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Benefit 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <div class="aspect-[4/3] overflow-hidden">
                    <img 
                        src="{{ asset('images/benefit-design-1.jpg') }}" 
                        alt="Create your own designs" 
                        class="w-full h-full object-cover"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center\'><span class=\'text-gray-400\'>Design easily</span></div>'">
                </div>
                <div class="p-6">
                    <p class="text-xs text-gray-500 mb-2">No extra software, graphic design expertise or artwork</p>
                    <h3 class="text-xl font-bold text-gray-900">Create your own designs quickly and easily</h3>
                </div>
            </div>

            <!-- Benefit 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <div class="aspect-[4/3] overflow-hidden">
                    <img 
                        src="{{ asset('images/benefit-design-2.jpg') }}" 
                        alt="Ultimate freedom of design" 
                        class="w-full h-full object-cover"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center\'><span class=\'text-gray-400\'>Design freedom</span></div>'">
                </div>
                <div class="p-6">
                    <p class="text-xs text-gray-500 mb-2">Lots of layout templates and over 20 m quality images</p>
                    <h3 class="text-xl font-bold text-gray-900">Enjoy ultimate freedom of design for any occasion</h3>
                </div>
            </div>

            <!-- Benefit 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <div class="aspect-[4/3] overflow-hidden">
                    <img 
                        src="{{ asset('images/benefit-design-3.jpg') }}" 
                        alt="Top quality production" 
                        class="w-full h-full object-cover"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center\'><span class=\'text-gray-400\'>Top quality</span></div>'">
                </div>
                <div class="p-6">
                    <p class="text-xs text-gray-500 mb-2">With great attention to detail and years of experience</p>
                    <h3 class="text-xl font-bold text-gray-900">We produce your print products in top quality</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Promotional Items Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8">Your company logo on pens, mugs or other items? Design promotional items online</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Canvas bags -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                <div class="aspect-square bg-white p-8 flex items-center justify-center">
                    <img 
                        src="{{ asset('images/promo-canvas-bag.jpg') }}" 
                        alt="Canvas bags" 
                        class="w-full h-full object-contain"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center bg-gray-50\'><svg class=\'w-16 h-16 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z\'/></svg></div>'">
                </div>
                <div class="p-4 border-t border-gray-100">
                    <h3 class="font-bold text-gray-900 text-center">Canvas bags</h3>
                </div>
            </a>

            <!-- Cups & mugs -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                <div class="aspect-square bg-white p-8 flex items-center justify-center">
                    <img 
                        src="{{ asset('images/promo-cups-mugs.jpg') }}" 
                        alt="Cups & mugs" 
                        class="w-full h-full object-contain"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center bg-gray-50\'><svg class=\'w-16 h-16 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2\'/></svg></div>'">
                </div>
                <div class="p-4 border-t border-gray-100">
                    <h3 class="font-bold text-gray-900 text-center">Cups & mugs</h3>
                </div>
            </a>

            <!-- Memory sticks, lighters and more -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                <div class="aspect-square bg-white p-8 flex items-center justify-center">
                    <img 
                        src="{{ asset('images/promo-memory-sticks.jpg') }}" 
                        alt="Memory sticks and more" 
                        class="w-full h-full object-contain"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center bg-gray-50\'><svg class=\'w-16 h-16 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z\'/></svg></div>'">
                </div>
                <div class="p-4 border-t border-gray-100">
                    <h3 class="font-bold text-gray-900 text-center">Memory sticks, lighters and more</h3>
                </div>
            </a>

            <!-- Pens & pencils -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                <div class="aspect-square bg-white p-8 flex items-center justify-center">
                    <img 
                        src="{{ asset('images/promo-pens.jpg') }}" 
                        alt="Pens & pencils" 
                        class="w-full h-full object-contain"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center bg-gray-50\'><svg class=\'w-16 h-16 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z\'/></svg></div>'">
                </div>
                <div class="p-4 border-t border-gray-100">
                    <h3 class="font-bold text-gray-900 text-center">Pens & pencils</h3>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- We are glad to assist you Section -->
<section class="py-16 bg-gradient-to-r from-gray-100 to-gray-200">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Image -->
            <div class="relative">
                <img 
                    src="{{ asset('images/team-support.jpg') }}" 
                    alt="Support Team" 
                    class="w-full h-auto rounded-lg shadow-lg"
                    onerror="this.parentElement.innerHTML='<div class=\'w-full aspect-video bg-gray-300 rounded-lg flex items-center justify-center\'><span class=\'text-gray-500\'>Support Team</span></div>'">
            </div>

            <!-- Right Content -->
            <div class="bg-white rounded-lg p-8 lg:p-12 shadow-sm">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">We are glad to assist you!</h2>
                <p class="text-base text-gray-700 leading-relaxed mb-8">
                    Do you have questions about products, options and print runs? Do you have a particular idea in mind, and you do not know how to put it together in the shop? 
                    Just ask us. We are glad to assist you and will be happy to support you in realising your print ideas.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">Monday to Friday</h3>
                        <p class="text-sm text-gray-600">8 a.m. – 5 p.m., CET</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">Service hotline</h3>
                        <p class="text-sm text-gray-600">+49 9161 6209801</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-gray-900 mb-2">E-mail</h3>
                        <p class="text-sm text-gray-600">service@onlineprinters.org</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Professional Designs with Shutterstock Section -->
<section class="py-16 bg-[#c4c9b0]" id="high-quality">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Professional designs without your own images?</h2>
                <p class="text-base text-gray-800 leading-relaxed mb-6">
                    Benefit from our cooperation with the Shutterstock image database and create professional and individual designs even without any image material of your own. 
                    Choose the design that best suits you and your company from over 20 million images!
                </p>
            </div>

            <!-- Right - Image Grid with Shutterstock Logo -->
            <div class="relative">
                <div class="grid grid-cols-3 gap-3">
                    <div class="aspect-square bg-white rounded overflow-hidden">
                        <img src="{{ asset('images/stock/stock-1.jpg') }}" alt="Stock" class="w-full h-full object-cover" onerror="this.style.background='#e5e7eb'">
                    </div>
                    <div class="aspect-square bg-white rounded overflow-hidden">
                        <img src="{{ asset('images/stock/stock-2.jpg') }}" alt="Stock" class="w-full h-full object-cover" onerror="this.style.background='#e5e7eb'">
                    </div>
                    <div class="aspect-square bg-white rounded overflow-hidden">
                        <img src="{{ asset('images/stock/stock-3.jpg') }}" alt="Stock" class="w-full h-full object-cover" onerror="this.style.background='#e5e7eb'">
                    </div>
                    <div class="aspect-square bg-white rounded overflow-hidden">
                        <img src="{{ asset('images/stock/stock-4.jpg') }}" alt="Stock" class="w-full h-full object-cover" onerror="this.style.background='#e5e7eb'">
                    </div>
                    <div class="aspect-square bg-white rounded overflow-hidden">
                        <img src="{{ asset('images/stock/stock-5.jpg') }}" alt="Stock" class="w-full h-full object-cover" onerror="this.style.background='#e5e7eb'">
                    </div>
                    <div class="aspect-square bg-white rounded overflow-hidden">
                        <img src="{{ asset('images/stock/stock-5.jpg') }}" alt="Stock" class="w-full h-full object-cover" onerror="this.style.background='#e5e7eb'">
                    </div>
                    <div class="col-span-3 row-span-2 bg-white rounded overflow-hidden flex items-center justify-center p-6">
                        <div class="text-center">
                            <h3 class="text-4xl font-bold text-red-600 mb-2">shutterstock</h3>
                            <p class="text-sm text-gray-600">20+ million images</p>
                        </div>
                    </div>
                    <div class="aspect-square bg-white rounded overflow-hidden">
                        <img src="{{ asset('images/stock/stock-6.jpg') }}" alt="Stock" class="w-full h-full object-cover" onerror="this.style.background='#e5e7eb'">
                    </div>
                    <div class="aspect-square bg-white rounded overflow-hidden">
                        <img src="{{ asset('images/stock/stock-7.jpg') }}" alt="Stock" class="w-full h-full object-cover" onerror="this.style.background='#e5e7eb'">
                    </div>
                    <div class="aspect-square bg-white rounded overflow-hidden">
                        <img src="{{ asset('images/stock/stock-8.jpg') }}" alt="Stock" class="w-full h-full object-cover" onerror="this.style.background='#e5e7eb'">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product Categories Grid Section -->
<section class="py-16 bg-white" id="how-to">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8">Create design without artwork files? Select product and get started</h2>
        
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            <!-- Bags -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Bags</span>
            </a>

            <!-- Business cards -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Business cards</span>
            </a>

            <!-- Calendars -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Calendars</span>
            </a>

            <!-- Cards -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Cards</span>
            </a>

            <!-- Desk pads -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Desk pads</span>
            </a>

            <!-- Eco/natural products -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Eco/natural products</span>
            </a>

            <!-- Envelopes -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Envelopes</span>
            </a>

            <!-- Event tickets -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Event tickets</span>
            </a>

            <!-- Exhibition systems -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 5a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM14 5a1 1 0 011-1h4a1 1 0 011 1v7a1 1 0 01-1 1h-4a1 1 0 01-1-1V5z"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Exhibition systems</span>
            </a>

            <!-- Flags -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Flags</span>
            </a>

            <!-- Flyers -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Flyers</span>
            </a>

            <!-- Folded cards -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Folded cards</span>
            </a>

            <!-- Folded Leaflets -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Folded Leaflets</span>
            </a>

            <!-- Labels on rolls -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Labels on rolls</span>
            </a>

            <!-- Letterheads -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Letterheads</span>
            </a>

            <!-- Marketing tools -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Marketing tools</span>
            </a>

            <!-- Notebooks -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Notebooks</span>
            </a>

            <!-- Notepads -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Notepads</span>
            </a>

            <!-- Office supplies -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Office supplies</span>
            </a>

            <!-- Postcards -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Postcards</span>
            </a>

            <!-- Posters -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Posters</span>
            </a>

            <!-- Promotional items -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Promotional items</span>
            </a>

            <!-- Roller banners -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Roller banners</span>
            </a>

            <!-- Signs -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Signs</span>
            </a>

            <!-- Stickers -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Stickers</span>
            </a>

            <!-- Sticky notes -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Sticky notes</span>
            </a>

            <!-- Tarpaulins & Banners -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-all group text-center">
                <svg class="w-12 h-12 mx-auto mb-3 text-gray-700 group-hover:text-[#4a6741] transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/>
                </svg>
                <span class="text-sm font-bold text-gray-900">Tarpaulins & Banners</span>
            </a>
        </div>
    </div>
</section>

<!-- Online Design Made Easy Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-12">"Online design" made easy!</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="text-center">
                <div class="mb-6">
                    <svg class="w-24 h-24 mx-auto text-[#5a7a5a]" fill="currentColor" viewBox="0 0 24 24">
                        <rect x="4" y="4" width="6" height="6" opacity="0.7"/>
                        <rect x="4" y="12" width="6" height="6" opacity="0.7"/>
                        <rect x="12" y="4" width="6" height="6" opacity="0.7"/>
                        <rect x="12" y="12" width="6" height="6" opacity="0.7"/>
                        <path d="M20 2L18 4L16 2L14 4V8L16 6L18 8L20 6V2Z" opacity="0.9"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">1. Choose a product</h3>
                <p class="text-sm text-gray-600">Select the format, paper type and quantity.</p>
            </div>

            <!-- Step 2 -->
            <div class="text-center">
                <div class="mb-6">
                    <svg class="w-24 h-24 mx-auto text-[#5a7a5a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <rect x="6" y="4" width="12" height="16" rx="1" stroke-width="1.5"/>
                        <path d="M8 8h8M8 12h8" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M14 3L16 5M18 3L16 5" stroke-width="1.5" stroke-linecap="round"/>
                        <circle cx="10" cy="16" r="1.5" fill="currentColor"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">2. Choose a template</h3>
                <p class="text-sm text-gray-600">Click "Design online" and pick a layout template</p>
            </div>

            <!-- Step 3 -->
            <div class="text-center">
                <div class="mb-6">
                    <svg class="w-24 h-24 mx-auto text-[#5a7a5a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <rect x="4" y="4" width="10" height="8" rx="1" stroke-width="1.5"/>
                        <rect x="10" y="13" width="10" height="7" rx="1" stroke-width="1.5"/>
                        <text x="9" y="10" font-size="6" fill="currentColor" font-weight="bold">T</text>
                        <path d="M16 16h2M16 18h2" stroke-width="1" stroke-linecap="round"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">3. Add custom content</h3>
                <p class="text-sm text-gray-600">Insert text and visuals and use the professional image material.</p>
            </div>

            <!-- Step 4 -->
            <div class="text-center">
                <div class="mb-6">
                    <svg class="w-24 h-24 mx-auto text-[#5a7a5a]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M3 3h7l4 9-4 9H3z" stroke-width="1.5" fill="currentColor" opacity="0.3"/>
                        <circle cx="9" cy="19" r="2" stroke-width="1.5"/>
                        <circle cx="18" cy="19" r="2" stroke-width="1.5"/>
                        <path d="M6 6h15l-2 7h-10" stroke-width="1.5" stroke-linecap="round"/>
                        <path d="M17 10l-2-2l2-2" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-900 mb-2">4. Check out</h3>
                <p class="text-sm text-gray-600">Finalize your design and order the product.</p>
            </div>
        </div>
    </div>
</section>

<!-- Benefits at a Glance Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-12">Quick and easy: Your benefits at a glance</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Benefit 1 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <div class="aspect-[4/3] overflow-hidden">
                    <img 
                        src="{{ asset('images/benefit-design-1.jpg') }}" 
                        alt="Create your own designs" 
                        class="w-full h-full object-cover"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center\'><span class=\'text-gray-400\'>Design easily</span></div>'">
                </div>
                <div class="p-6">
                    <p class="text-xs text-gray-500 mb-2">No extra software, graphic design expertise or artwork</p>
                    <h3 class="text-xl font-bold text-gray-900">Create your own designs quickly and easily</h3>
                </div>
            </div>

            <!-- Benefit 2 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <div class="aspect-[4/3] overflow-hidden">
                    <img 
                        src="{{ asset('images/benefit-design-2.jpg') }}" 
                        alt="Ultimate freedom of design" 
                        class="w-full h-full object-cover"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center\'><span class=\'text-gray-400\'>Design freedom</span></div>'">
                </div>
                <div class="p-6">
                    <p class="text-xs text-gray-500 mb-2">Lots of layout templates and over 20 m quality images</p>
                    <h3 class="text-xl font-bold text-gray-900">Enjoy ultimate freedom of design for any occasion</h3>
                </div>
            </div>

            <!-- Benefit 3 -->
            <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <div class="aspect-[4/3] overflow-hidden">
                    <img 
                        src="{{ asset('images/benefit-design-3.jpg') }}" 
                        alt="Top quality production" 
                        class="w-full h-full object-cover"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center\'><span class=\'text-gray-400\'>Top quality</span></div>'">
                </div>
                <div class="p-6">
                    <p class="text-xs text-gray-500 mb-2">With great attention to detail and years of experience</p>
                    <h3 class="text-xl font-bold text-gray-900">We produce your print products in top quality</h3>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Promotional Items Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8">Your company logo on pens, mugs or other items? Design promotional items online</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <!-- Canvas bags -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                <div class="aspect-square bg-white p-8 flex items-center justify-center">
                    <img 
                        src="{{ asset('images/promo-canvas-bag.jpg') }}" 
                        alt="Canvas bags" 
                        class="w-full h-full object-contain"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center bg-gray-50\'><svg class=\'w-16 h-16 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z\'/></svg></div>'">
                </div>
                <div class="p-4 border-t border-gray-100">
                    <h3 class="font-bold text-gray-900 text-center">Canvas bags</h3>
                </div>
            </a>

            <!-- Cups & mugs -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                <div class="aspect-square bg-white p-8 flex items-center justify-center">
                    <img 
                        src="{{ asset('images/promo-cups-mugs.jpg') }}" 
                        alt="Cups & mugs" 
                        class="w-full h-full object-contain"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center bg-gray-50\'><svg class=\'w-16 h-16 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2\'/></svg></div>'">
                </div>
                <div class="p-4 border-t border-gray-100">
                    <h3 class="font-bold text-gray-900 text-center">Cups & mugs</h3>
                </div>
            </a>

            <!-- Memory sticks, lighters and more -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                <div class="aspect-square bg-white p-8 flex items-center justify-center">
                    <img 
                        src="{{ asset('images/promo-memory-sticks.jpg') }}" 
                        alt="Memory sticks and more" 
                        class="w-full h-full object-contain"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center bg-gray-50\'><svg class=\'w-16 h-16 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z\'/></svg></div>'">
                </div>
                <div class="p-4 border-t border-gray-100">
                    <h3 class="font-bold text-gray-900 text-center">Memory sticks, lighters and more</h3>
                </div>
            </a>

            <!-- Pens & pencils -->
            <a href="#" class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                <div class="aspect-square bg-white p-8 flex items-center justify-center">
                    <img 
                        src="{{ asset('images/promo-pens.jpg') }}" 
                        alt="Pens & pencils" 
                        class="w-full h-full object-contain"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full flex items-center justify-center bg-gray-50\'><svg class=\'w-16 h-16 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z\'/></svg></div>'">
                </div>
                <div class="p-4 border-t border-gray-100">
                    <h3 class="font-bold text-gray-900 text-center">Pens & pencils</h3>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- Customer Service Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <!-- Team Image -->
            <div class="rounded-lg overflow-hidden">
                <img 
                    src="{{ asset('images/team-support.jpg') }}" 
                    alt="Customer Service Team" 
                    class="w-full h-full object-cover"
                    onerror="this.parentElement.innerHTML='<div class=\'w-full aspect-[4/3] bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center\'><svg class=\'w-24 h-24 text-gray-300\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'1.5\' d=\'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z\'/></svg></div>'">
            </div>

            <!-- Contact Info -->
            <div class="bg-gray-50 p-8 rounded-lg">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">We are glad to assist you!</h2>
                <p class="text-gray-700 mb-8 leading-relaxed">
                    Do you have questions about products, options and print runs? Do you have a particular idea in mind, and 
                    you do not know how to put it together in the shop? Just ask us. We are glad to assist you and will be 
                    happy to support you in realising your print ideas.
                </p>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <p class="text-sm font-semibold text-gray-900 mb-2">Monday to Friday</p>
                        <p class="text-sm text-gray-600">8 a.m. – 5 p.m., CET</p>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-900 mb-2">Service hotline</p>
                        <p class="text-sm text-gray-600">+49 9161 6209801</p>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-gray-900 mb-2">E-mail</p>
                        <p class="text-sm text-gray-600">service@onlineprinters.org</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-white" id="faq">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8">Frequently asked questions about the "Design Online" tool.</h2>
        
        <div class="space-y-4 max-w-4xl">
            <!-- FAQ 1 - Expanded by default -->
            <details class="bg-blue-50 border border-blue-200 rounded-lg p-6" open>
                <summary class="font-bold text-gray-900 cursor-pointer flex items-start gap-3">
                    <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>Is the "Design Online" tool free of charge?</span>
                </summary>
                <div class="mt-4 pl-8 text-blue-800 text-sm leading-relaxed">
                    Our customers can use our tool free of charge. You only pay for the printing of your products. There is no price difference between products created in the tool and products for which you create the artwork externally. The flyers are available at the same low price.
                </div>
            </details>

            <!-- FAQ 2 -->
            <details class="bg-white border border-gray-200 rounded-lg p-6">
                <summary class="font-bold text-gray-900 cursor-pointer">How does the Online Design tool work?</summary>
                <p class="mt-4 text-gray-600">Simply select your desired product, choose a template, customize it with your content, and place your order. The tool guides you through each step.</p>
            </details>

            <!-- FAQ 3 -->
            <details class="bg-white border border-gray-200 rounded-lg p-6">
                <summary class="font-bold text-gray-900 cursor-pointer">Do I have to install software to use the "Design Online" tool?</summary>
                <p class="mt-4 text-gray-600">No, our online design tool works directly in your browser. No installation required.</p>
            </details>

            <!-- FAQ 4 -->
            <details class="bg-white border border-gray-200 rounded-lg p-6">
                <summary class="font-bold text-gray-900 cursor-pointer">I don't have my own photos yet. How can I still create a professional design?</summary>
                <p class="mt-4 text-gray-600">Through our partnership with Shutterstock, you have access to over 20 million professional images that you can use in your designs.</p>
            </details>

            <!-- FAQ 5 -->
            <details class="bg-white border border-gray-200 rounded-lg p-6">
                <summary class="font-bold text-gray-900 cursor-pointer">How do I add my own images and logos to my layout?</summary>
                <p class="mt-4 text-gray-600">You can easily upload your own images and logos directly in the design tool and place them anywhere in your layout.</p>
            </details>

            <!-- FAQ 6 -->
            <details class="bg-white border border-gray-200 rounded-lg p-6">
                <summary class="font-bold text-gray-900 cursor-pointer">Can I use my corporate colours in the tool?</summary>
                <p class="mt-4 text-gray-600">Yes, you can enter your corporate colors using RGB, CMYK, or HEX values to maintain your brand identity.</p>
            </details>

            <!-- FAQ 7 -->
            <details class="bg-white border border-gray-200 rounded-lg p-6">
                <summary class="font-bold text-gray-900 cursor-pointer">Which fonts are available in the tool?</summary>
                <p class="mt-4 text-gray-600">The tool offers a wide selection of professional fonts suitable for various design needs.</p>
            </details>
        </div>
    </div>
</section>

<!-- Looking for paper or ideas Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-900 mb-8">Are you looking for the right paper or brilliant idea?</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Paper Samples -->
            <a href="{{ route('sampel-produk') }}" class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow block">
                <div class="aspect-[4/3] overflow-hidden">
                    <img 
                        src="{{ asset('images/paper-samples-promo.jpg') }}" 
                        alt="Paper samples" 
                        class="w-full h-full object-cover"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center\'><span class=\'text-gray-400\'>Paper Samples</span></div>'">
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Discover the look and feel of paper types and print substrates in our sample sets</h3>
                </div>
            </a>

            <!-- Newsletter -->
            <a href="#" class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow block">
                <div class="aspect-[4/3] overflow-hidden">
                    <img 
                        src="{{ asset('images/newsletter-promo.jpg') }}" 
                        alt="Newsletter" 
                        class="w-full h-full object-cover"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center\'><span class=\'text-gray-400\'>Newsletter</span></div>'">
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Subscribe to our newsletter and get exclusive benefits</h3>
                </div>
            </a>

            <!-- Support Centre -->
            <a href="#" class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow block">
                <div class="aspect-[4/3] overflow-hidden">
                    <img 
                        src="{{ asset('images/support-centre.jpg') }}" 
                        alt="Support Centre" 
                        class="w-full h-full object-cover"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center\'><span class=\'text-gray-400\'>Support</span></div>'">
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-bold text-gray-900 mb-2">Find all you need to know about products, orders and the like in our Support Centre</h3>
                </div>
            </a>
        </div>
    </div>
</section>

@endsection
