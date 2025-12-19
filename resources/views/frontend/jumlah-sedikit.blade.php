@extends('layouts.app')

@section('title', 'Jumlah Sedikit, Dampak Besar - Galaxy Digital Printing')

@section('content')
<!-- Hero Banner -->
<section class="relative bg-gradient-to-r from-gray-300 via-gray-200 to-gray-100 overflow-hidden">
    <div class="container mx-auto px-4 py-16 lg:py-24">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="space-y-6">
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">
                    Jumlah sedikit, dampak besar
                </h1>
                <p class="text-lg text-gray-700 leading-relaxed max-w-xl">
                    Wujudkan ide Anda menjadi kenyataan dengan cara unik dan individual – dari brosur hingga mug, dari kuantitas pesanan minimal satu.
                </p>
                <button class="bg-[#4a6741] hover:bg-[#3a5631] text-white font-semibold px-8 py-3 rounded transition-colors inline-block">
                    Temukan Sekarang
                </button>
            </div>
            
            <!-- Right Product Images -->
            <div class="relative h-64 lg:h-96">
                <img src="{{ asset('images/small-quantity-hero.jpg') }}" alt="Small quantity products" class="w-full h-full object-contain" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 rounded-lg flex items-center justify-center text-gray-400\'>Product Display</div>'">
            </div>
        </div>
    </div>
</section>

<!-- Tab Navigation -->
<section class="bg-white border-b border-gray-200">
    <div class="container mx-auto px-4">
        <nav class="flex gap-8 overflow-x-auto">
            <button class="py-4 px-2 border-b-2 border-[#4a6741] text-gray-900 font-semibold whitespace-nowrap">
                Product overview
            </button>
            <button class="py-4 px-2 border-b-2 border-transparent text-gray-600 hover:text-gray-900 whitespace-nowrap">
                Inspiration
            </button>
            <button class="py-4 px-2 border-b-2 border-transparent text-gray-600 hover:text-gray-900 whitespace-nowrap">
                Sample sets
            </button>
            <button class="py-4 px-2 border-b-2 border-transparent text-gray-600 hover:text-gray-900 whitespace-nowrap">
                Practical
            </button>
        </nav>
    </div>
</section>

<!-- Product Overview Section -->
<section class="bg-white py-12 lg:py-16">
    <div class="container mx-auto px-4">
        <div class="mb-10">
            <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-2">Sekilas: produk dalam jumlah kecil</h2>
            <p class="text-sm text-gray-600 uppercase tracking-wide">UNTUK REALISASI INDIVIDUAL IDE & DESAIN ANDA</p>
        </div>

        <!-- Product Cards Grid - Row 1 -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6 mb-6">
            <!-- Leaflets -->
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow group">
                <div class="aspect-[3/4] bg-gray-100 overflow-hidden">
                    <img src="{{ asset('images/leaflets-small.jpg') }}" alt="Leaflets" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Leaflets</div>'">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-900 mb-1">Leaflets</h3>
                    <p class="text-sm text-gray-600 mb-3">min. quantity of 25</p>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded transition-colors">
                        Design online
                    </button>
                </div>
            </div>

            <!-- Brochures -->
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow group">
                <div class="aspect-[3/4] bg-gray-100 overflow-hidden">
                    <img src="{{ asset('images/brochures-small.jpg') }}" alt="Brochures" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Brochures</div>'">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-900 mb-1">Brochures</h3>
                    <p class="text-sm text-gray-600 mb-3">min. quantity of 1</p>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded transition-colors">
                        Design online
                    </button>
                </div>
            </div>

            <!-- Posters/Plots -->
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow group">
                <div class="aspect-[3/4] bg-gray-100 overflow-hidden">
                    <img src="{{ asset('images/posters-small.jpg') }}" alt="Posters" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Posters</div>'">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-900 mb-1">Posters/Plots</h3>
                    <p class="text-sm text-gray-600 mb-3">min. quantity of 1</p>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded transition-colors">
                        Design online
                    </button>
                </div>
            </div>

            <!-- Postcards -->
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow group">
                <div class="aspect-[3/4] bg-gray-100 overflow-hidden">
                    <img src="{{ asset('images/postcards-small.jpg') }}" alt="Postcards" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Postcards</div>'">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-900 mb-1">Postcards</h3>
                    <p class="text-sm text-gray-600 mb-3">min. quantity of 25</p>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded transition-colors">
                        Design online
                    </button>
                </div>
            </div>

            <!-- Letterheads -->
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow group">
                <div class="aspect-[3/4] bg-gray-100 overflow-hidden">
                    <img src="{{ asset('images/letterheads-small.jpg') }}" alt="Letterheads" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Letterheads</div>'">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-900 mb-1">Letterheads</h3>
                    <p class="text-sm text-gray-600 mb-3">min. quantity of 25</p>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded transition-colors">
                        Design online
                    </button>
                </div>
            </div>
        </div>

        <!-- Product Cards Grid - Row 2 -->
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
            <!-- Magazines -->
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow group">
                <div class="aspect-[3/4] bg-gray-100 overflow-hidden">
                    <img src="{{ asset('images/magazines-small.jpg') }}" alt="Magazines" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Magazines</div>'">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-900 mb-1">Magazines</h3>
                    <p class="text-sm text-gray-600 mb-3">min. quantity of 1</p>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded transition-colors">
                        Design online
                    </button>
                </div>
            </div>

            <!-- Calendars -->
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow group">
                <div class="aspect-[3/4] bg-gray-100 overflow-hidden">
                    <img src="{{ asset('images/calendars-small.jpg') }}" alt="Calendars" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Calendars</div>'">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-900 mb-1">Calendars</h3>
                    <p class="text-sm text-gray-600 mb-3">min. quantity of 1</p>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded transition-colors">
                        Design online
                    </button>
                </div>
            </div>

            <!-- Mouse Pads -->
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow group">
                <div class="aspect-[3/4] bg-gray-100 overflow-hidden">
                    <img src="{{ asset('images/mousepads-small.jpg') }}" alt="Mouse Pads" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Mouse Pads</div>'">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-900 mb-1">Mouse Pads</h3>
                    <p class="text-sm text-gray-600 mb-3">min. quantity of 1</p>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded transition-colors">
                        Design online
                    </button>
                </div>
            </div>

            <!-- Notepads -->
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow group">
                <div class="aspect-[3/4] bg-gray-100 overflow-hidden">
                    <img src="{{ asset('images/notepads-small.jpg') }}" alt="Notepads" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Notepads</div>'">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-900 mb-1">Notepads</h3>
                    <p class="text-sm text-gray-600 mb-3">min. quantity of 1</p>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded transition-colors">
                        Design online
                    </button>
                </div>
            </div>

            <!-- Pens -->
            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition-shadow group">
                <div class="aspect-[3/4] bg-gray-100 overflow-hidden">
                    <img src="{{ asset('images/pens-small.jpg') }}" alt="Pens" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>Pens</div>'">
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-gray-900 mb-1">Pens</h3>
                    <p class="text-sm text-gray-600 mb-3">min. quantity of 100</p>
                    <button class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-semibold px-4 py-2 rounded transition-colors">
                        Design online
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Get Inspired Section -->
<section class="bg-gray-50 py-12 lg:py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-10">
            Dapatkan inspirasi: jumlah kecil akan memungkinkan
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <!-- Office essentials -->
            <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <div class="aspect-[16/9] bg-gray-100 overflow-hidden">
                    <img src="{{ asset('images/office-essentials.jpg') }}" alt="Office essentials" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400\'>Office essentials</div>'">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Perlengkapan kantor untuk tim kecil</h3>
                    <p class="text-gray-600 text-sm">Bisnis start-up dan perusahaan kecil juga ingin memiliki perlengkapan kantor dengan desain korporat mereka</p>
                </div>
            </div>

            <!-- Exclusive unique items -->
            <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <div class="aspect-[16/9] bg-gray-100 overflow-hidden">
                    <img src="{{ asset('images/exclusive-unique.jpg') }}" alt="Exclusive items" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400\'>Exclusive items</div>'">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Item unik eksklusif</h3>
                    <p class="text-gray-600 text-sm">Penawaran khusus untuk pelanggan teratas – dalam brosur yang dirancang khusus untuk mereka</p>
                </div>
            </div>

            <!-- Event-related -->
            <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                <div class="aspect-[16/9] bg-gray-100 overflow-hidden">
                    <img src="{{ asset('images/event-related.jpg') }}" alt="Event products" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400\'>Event products</div>'">
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Produk cetak terkait acara</h3>
                    <p class="text-gray-600 text-sm">Tampilan pameran yang disesuaikan atau poster yang dirancang secara artistik untuk acara perusahaan – individual & mengesankan</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sample Sets Section -->
<section class="bg-gradient-to-r from-stone-200 to-stone-100 py-12 lg:py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Left Content -->
            <div class="space-y-6">
                <h2 class="text-2xl lg:text-3xl font-bold text-gray-900">
                    Set sampel: kertas dan sebagainya dari dekat dan personal
                </h2>
                <p class="text-gray-700 leading-relaxed">
                    Kertas art print atau kertas daur ulang – kertas mana yang Anda suka? Set sampel kami memungkinkan Anda untuk melihat dan merasakan perbedaannya. <strong>Baru: sampel kartu nama.</strong>
                </p>
                <button class="border-2 border-gray-900 hover:bg-gray-900 hover:text-white text-gray-900 font-semibold px-6 py-3 rounded transition-colors inline-block">
                    Pesan sampel sekarang
                </button>
            </div>

            <!-- Right Image -->
            <div class="relative">
                <img src="{{ asset('images/sample-sets.jpg') }}" alt="Sample sets" class="w-full h-auto rounded-lg" onerror="this.parentElement.innerHTML='<div class=\'w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center text-gray-400\'>Sample Sets</div>'">
            </div>
        </div>
    </div>
</section>

<!-- Team Events Testimonial Section -->
<section class="bg-white py-12 lg:py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center">
            <!-- Left - Profile Image -->
            <div class="lg:col-span-3 flex justify-center lg:justify-start">
                <div class="w-64 h-64 rounded-full overflow-hidden bg-gray-200">
                    <img src="{{ asset('images/hr-manager-pamela.jpg') }}" alt="HR Manager Pamela Horneber" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400\'>HR Manager</div>'">
                </div>
            </div>

            <!-- Right - Content -->
            <div class="lg:col-span-9 space-y-4">
                <h2 class="text-2xl lg:text-3xl font-bold text-gray-900">
                    Acara tim: karena gestur kecil benar-benar membuat perbedaan
                </h2>
                <p class="text-sm font-bold text-gray-900 uppercase tracking-wide italic">
                    HR MANAGER PAMELA HORNEBER MENAWARKAN TIP PRIBADI
                </p>
                <p class="text-gray-700 leading-relaxed">
                    "Ada satu hal yang saya pelajari di waktu saya sebagai manajer HR: Detail yang penting. Di acara tim, misalnya, bukan hanya tentang kesenangan untuk semua orang, tetapi juga tentang perasaan apresiasi. Mug, kartu atau pulpen yang disesuaikan khusus dirancang untuk acara tersebut oleh karena itu bukan hanya hadiah. Mereka menyampaikan pesan bahwa acara – dan dengan demikian setiap anggota tim – penting dan unik bagi perusahaan. Detail kecil ini meningkatkan rasa memiliki dan membuat acara benar-benar tak terlupakan. Tip saya untuk Anda: Murah hati dengan gestur ini – mereka bekerja dengan luar biasa untuk loyalitas staf!"
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="bg-white py-12 lg:py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- Left - Team Image -->
            <div class="relative h-64 lg:h-auto">
                <img src="{{ asset('images/team-support.jpg') }}" alt="Support Team" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400\'>Support Team</div>'">
            </div>

            <!-- Right - Contact Info -->
            <div class="bg-gradient-to-br from-gray-100 to-gray-50 p-8 lg:p-12 flex flex-col justify-center">
                <p class="text-xs text-gray-600 uppercase tracking-wider mb-2">APAKAH ANDA PUNYA PERTANYAAN? APAKAH ANDA MEMERLUKAN BANTUAN?</p>
                <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 mb-6">
                    Kami ada untuk Anda dan proyek yang Anda sayangi!
                </h2>
                <p class="text-gray-700 mb-8 leading-relaxed">
                    Apakah Anda memiliki pertanyaan tentang produk, opsi, dan hasil cetak? Apakah Anda memiliki ide khusus dalam pikiran, dan Anda tidak tahu cara menyatukannya di toko? Tanyakan saja kepada kami. Kami senang membantu Anda dan akan dengan senang hati mendukung Anda dalam mewujudkan ide cetak Anda.
                </p>

                <div class="space-y-4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Hours -->
                        <div>
                            <p class="text-sm font-semibold text-gray-900 mb-1">Senin sampai Jumat</p>
                            <p class="text-sm text-gray-700">8 a.m. – 5 p.m.</p>
                        </div>

                        <!-- Phone -->
                        <div>
                            <p class="text-sm font-semibold text-gray-900 mb-1">Service hotline</p>
                            <a href="tel:+6281234567890" class="text-sm text-gray-700 hover:text-[#4a6741]">+62 812 3456 7890</a>
                        </div>

                        <!-- Email -->
                        <div>
                            <p class="text-sm font-semibold text-gray-900 mb-1">E-mail</p>
                            <a href="mailto:service@galaxyprinting.com" class="text-sm text-gray-700 hover:text-[#4a6741] break-words">service@galaxyprinting.com</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
