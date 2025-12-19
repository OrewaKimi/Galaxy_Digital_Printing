@extends('layouts.app')

@section('title', 'Produk Baru - Galaxy Digital Printing')

@section('content')
<!-- Hero Banner -->
<section class="relative bg-gradient-to-r from-stone-300 via-stone-200 to-stone-100 overflow-hidden py-20 lg:py-32">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl">
            <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Ready for a breath of fresh air?</h1>
            <p class="text-lg text-gray-700 leading-relaxed">
                Brand new additions: Discover the latest products, services and shop updates. Get inspired.
            </p>
        </div>
    </div>
</section>

<!-- Tab Navigation -->
<section class="bg-white border-b border-gray-200 py-6">
    <div class="container mx-auto px-4">
        <div class="flex gap-4 flex-wrap">
            <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-900 font-semibold rounded-full transition-colors text-sm">
                Brand new
            </button>
            <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-900 font-semibold rounded-full transition-colors text-sm">
                Updates
            </button>
            <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-900 font-semibold rounded-full transition-colors text-sm">
                Shop features
            </button>
            <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-900 font-semibold rounded-full transition-colors text-sm">
                New possibilities
            </button>
        </div>
    </div>
</section>

<!-- Brand New & Red-Hot Section -->
<section class="bg-white py-12 lg:py-16">
    <div class="container mx-auto px-4">
        <div class="mb-12">
            <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-2">Brand new & red-hot</h2>
            <p class="text-sm text-gray-600 uppercase tracking-wide">WE ARE HAPPY TO PRESENT OUR NEW PRODUCTS TO YOU! FROM A MINIMUM QUANTITY OF 1 ONLY!</p>
        </div>

        <!-- Featured Products Carousel -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <!-- LED Displays -->
            <div class="bg-white rounded-lg overflow-hidden hover:shadow-lg transition-shadow group">
                <div class="relative h-64 bg-gray-100 overflow-hidden">
                    <img 
                        src="{{ asset('images/products/new-products/led-displays.jpg') }}" 
                        alt="LED displays & pop-up displays - Brilliant appearance with even illumination" 
                        title="LED displays & pop-up displays"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                        loading="lazy"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400\'>LED Displays</div>'">
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-gray-900 text-lg mb-2">LED displays & pop-up displays</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Brilliant appearance of your brand! Evenly illuminated and B1-certified. Wall mounting or free-standing, perfect for shops, showrooms and trade shows.</p>
                </div>
            </div>

            <!-- Sticky Lettering -->
            <div class="bg-white rounded-lg overflow-hidden hover:shadow-lg transition-shadow group">
                <div class="relative h-64 bg-gray-100 overflow-hidden">
                    <img 
                        src="{{ asset('images/products/new-products/sticky-lettering.jpg') }}" 
                        alt="Sticky lettering - Strong adhesive properties and waterproof" 
                        title="Sticky lettering"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                        loading="lazy"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400\'>Sticky Lettering</div>'">
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-gray-900 text-lg mb-2">Sticky lettering</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Strong adhesive properties and waterproof – precisely cut in freeform for logos, texts & designs. Broadly applicable on smooth surfaces.</p>
                </div>
            </div>

            <!-- Ceiling Banner -->
            <div class="bg-white rounded-lg overflow-hidden hover:shadow-lg transition-shadow group">
                <div class="relative h-64 bg-gray-100 overflow-hidden">
                    <img 
                        src="{{ asset('images/products/new-products/ceiling-banner.jpg') }}" 
                        alt="Ceiling banner - Maximum long-distance effect for your performance" 
                        title="Ceiling banner"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" 
                        loading="lazy"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400\'>Ceiling Banner</div>'">
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-gray-900 text-lg mb-2">Ceiling banner</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">Maximum long-distance effect for your performance! Available in three designs – with attachment set & bag. Perfect for orientation and brand staging indoors.</p>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <div class="border-t-4 border-gray-900 mb-12"></div>

        <!-- Canvas Bags & Umbrellas Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="space-y-6">
                <div>
                    <p class="text-xs text-gray-600 uppercase tracking-wider mb-2">CANVAS BAGS AND UMBRELLAS</p>
                    <h2 class="text-2xl lg:text-3xl font-bold text-gray-900">Two sides. Many segments. An a whole lot of impact.</h2>
                </div>
                <p class="text-gray-700 leading-relaxed">
                    Our canvas bags can be designed on both sides in various styles – perfect for logo & message combined. Also umbrellas now provide even more space for your ideas: Thanks to printing on multiple segments, you can create your all around visible brand presence – even in rainy weather.
                </p>
                <div class="flex gap-4">
                    <button class="border-2 border-gray-900 hover:bg-gray-900 hover:text-white text-gray-900 font-semibold px-6 py-3 rounded transition-colors">
                        Canvas bags
                    </button>
                    <button class="border-2 border-gray-900 hover:bg-gray-900 hover:text-white text-gray-900 font-semibold px-6 py-3 rounded transition-colors">
                        Umbrellas
                    </button>
                </div>
            </div>

            <!-- Right Image -->
            <div class="relative">
                <img 
                    src="{{ asset('images/products/new-products/canvas-umbrellas.jpg') }}" 
                    alt="Canvas bags and umbrellas - Two sides many segments" 
                    class="w-full h-auto rounded-lg" 
                    onerror="this.parentElement.innerHTML='<div class=\'w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center text-gray-400\'>Canvas & Umbrellas</div>'">
            </div>
        </div>
    </div>
</section>

<!-- Updates on Popular Products Section -->
<section class="bg-white py-12 lg:py-16 border-t border-gray-200">
    <div class="container mx-auto px-4">
        <div class="mb-12">
            <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-2">Updates on popular print products</h2>
            <p class="text-sm text-gray-600 uppercase tracking-wide">DISCOVER THE NEW ADDITIONS TO OUR RANGE OF PRODUCTS!</p>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Mini Roller Banners -->
            <div class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-shadow">
                <div class="h-48 bg-gray-100 rounded-lg mb-4 overflow-hidden flex items-center justify-center">
                    <img 
                        src="{{ asset('images/products/produk-baru/mini-roller-banners.jpg') }}" 
                        alt="Mini roller banners" 
                        title="Mini roller banners"
                        class="w-full h-full object-cover" 
                        loading="lazy"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-sm\'>Mini Roller</div>'">
                </div>
                <h3 class="font-bold text-gray-900 mb-3">Mini roller banners</h3>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li>• compact roller banner in A3 or A4 table-top format</li>
                    <li>• high-quality aluminium frame – lightweight, portable & quickly erected</li>
                    <li>• perfect for counters, tables or receptions – strikingly close to the customer</li>
                </ul>
            </div>

            <!-- Metal Ball Pen -->
            <div class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-shadow">
                <div class="h-48 bg-gray-100 rounded-lg mb-4 overflow-hidden flex items-center justify-center">
                    <img 
                        src="{{ asset('images/products/produk-baru/metal-ballpen.jpg') }}" 
                        alt="Metal ball pen with Ohara touch function" 
                        title="Metal ball pen with Ohara touch function"
                        class="w-full h-full object-cover" 
                        loading="lazy"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-sm\'>Metal Pen</div>'">
                </div>
                <h3 class="font-bold text-gray-900 mb-3">Metal ball pen with Ohara touch function</h3>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li>• with touch tip & handy rubber finish</li>
                    <li>• laser engraving with metallic look on the shaft</li>
                    <li>• blue writing, elegant metal design</li>
                </ul>
            </div>

            <!-- Molu Notebook -->
            <div class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-shadow">
                <div class="h-48 bg-gray-100 rounded-lg mb-4 overflow-hidden flex items-center justify-center">
                    <img 
                        src="{{ asset('images/products/produk-baru/molu-notebook.jpg') }}" 
                        alt="Molu notebook with Port St. Lucie pen" 
                        title="Molu notebook with Port St. Lucie pen"
                        class="w-full h-full object-cover" 
                        loading="lazy"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-sm\'>Notebook</div>'">
                </div>
                <h3 class="font-bold text-gray-900 mb-3">Molu notebook with Port St. Lucie pen</h3>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li>• noble set with notebook & ball pen</li>
                    <li>• blue writing refill & high-quality laser engraving on the notebook</li>
                    <li>• perfect for daily routines, office & on the go</li>
                </ul>
            </div>

            <!-- Mugs with Pad Printing -->
            <div class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-shadow">
                <div class="h-48 bg-gray-100 rounded-lg mb-4 overflow-hidden flex items-center justify-center">
                    <img 
                        src="{{ asset('images/products/produk-baru/mugs-pad-printing.jpg') }}" 
                        alt="Mugs with pad printing" 
                        title="Mugs with pad printing"
                        class="w-full h-full object-cover" 
                        loading="lazy"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-sm\'>Mugs</div>'">
                </div>
                <h3 class="font-bold text-gray-900 mb-3">Mugs with pad printing</h3>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li>• brilliant printing quality also on convex surfaces</li>
                    <li>• dishwasher-proof – for long-term impact</li>
                    <li>• short production time: ready within 5 days only</li>
                </ul>
            </div>

            <!-- Weekly Desk Calendar -->
            <div class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-shadow">
                <div class="h-48 bg-gray-100 rounded-lg mb-4 overflow-hidden flex items-center justify-center">
                    <img 
                        src="{{ asset('images/products/produk-baru/weekly-calendar.jpg') }}" 
                        alt="Weekly desk calendar" 
                        title="Weekly desk calendar"
                        class="w-full h-full object-cover" 
                        loading="lazy"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-sm\'>Calendar</div>'">
                </div>
                <h3 class="font-bold text-gray-900 mb-3">Weekly desk calendar</h3>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li>• convenient weekly overview for dates, tasks & notes</li>
                    <li>• with table talker & spiral binding in white, black or silver</li>
                    <li>• in A5 & A6, optionally with additional page and title page</li>
                </ul>
            </div>

            <!-- NFC Security Wristbands -->
            <div class="bg-white rounded-lg border border-gray-200 p-6 hover:shadow-md transition-shadow">
                <div class="h-48 bg-gray-100 rounded-lg mb-4 overflow-hidden flex items-center justify-center">
                    <img 
                        src="{{ asset('images/products/produk-baru/nfc-wristbands.jpg') }}" 
                        alt="NFC security wristbands" 
                        title="NFC security wristbands"
                        class="w-full h-full object-cover" 
                        loading="lazy"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-sm\'>NFC Bands</div>'">
                </div>
                <h3 class="font-bold text-gray-900 mb-3">NFC security wristbands</h3>
                <ul class="text-sm text-gray-600 space-y-2">
                    <li>• high-quality satin wristbands with integrated wooden NFC chip</li>
                    <li>• quick, non-contact use for events, trade fairs & festivals</li>
                    <li>• versatile use as ticket, payment device or content trigger</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="bg-gray-50 py-12 lg:py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left: Team Image -->
            <div class="flex justify-center">
                <div class="w-80 h-80 rounded-full overflow-hidden bg-gray-200">
                    <img 
                        src="{{ asset('images/products/produk-baru/team-contact.jpg') }}" 
                        alt="Our helpful support team" 
                        title="Our team"
                        class="w-full h-full object-cover" 
                        loading="lazy"
                        onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-sm\'>Team</div>'">
                </div>
            </div>

            <!-- Right: Contact Info -->
            <div class="space-y-6">
                <div>
                    <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-2">Individual questions or wishes?</h2>
                    <p class="text-sm text-gray-600 uppercase tracking-wider font-semibold mb-4">WE ARE THERE FOR YOU! INDIVIDUAL, TRUSTWORTHY AND RELIABLE ASSISTANCE</p>
                    <p class="text-gray-700 leading-relaxed">
                        Do you have any questions about our products or a personal request, and require, for instance, a certain quantity of products? Just ask us – we will be glad to assist you. Together we will find the best possible solution: We will be happy to support you in your print projects!
                    </p>
                </div>

                <!-- Contact Details Grid -->
                <div class="grid grid-cols-2 gap-6">
                    <div>
                        <p class="text-xs text-gray-600 uppercase tracking-wider font-semibold mb-1">Monday to Friday</p>
                        <p class="text-gray-900 font-semibold">8 a.m. – 5 p.m., CET</p>
                    </div>
                    <div>
                        <p class="text-xs text-gray-600 uppercase tracking-wider font-semibold mb-1">Service hotline</p>
                        <p class="text-gray-900 font-semibold">+49 9161 6209801</p>
                    </div>
                    <div class="col-span-2">
                        <p class="text-xs text-gray-600 uppercase tracking-wider font-semibold mb-1">E-mail</p>
                        <p class="text-gray-900 font-semibold">
                            <a href="mailto:service@onlineprinters.org" class="hover:text-[#4a6741] transition-colors">service@onlineprinters.org</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection