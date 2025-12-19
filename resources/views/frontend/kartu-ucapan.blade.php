@extends('layouts.app')

@section('title', 'Kartu Ucapan Personal - Galaxy Digital Printing')

@section('content')
<section class="py-10 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-10">
            <!-- Sidebar kategori -->
            <aside class="h-fit">
                <h2 class="text-sm font-semibold text-gray-900 mb-3">Cards</h2>
                <div class="space-y-1 text-sm text-gray-800 leading-6">
                    <a class="block hover:text-[#4a6741] focus:outline-none focus:ring-0">Postcards</a>
                    <a class="block hover:text-[#4a6741] focus:outline-none focus:ring-0">Folded cards</a>
                    <a class="block hover:text-[#4a6741] focus:outline-none focus:ring-0">Cards with special-effect colours</a>
                    <a class="block hover:text-[#4a6741] focus:outline-none focus:ring-0">Exclusive cards</a>
                    <a class="block hover:text-[#4a6741] focus:outline-none focus:ring-0">Voucher cards</a>
                    <a class="block hover:text-[#4a6741] focus:outline-none focus:ring-0">Greeting cards</a>
                    <a class="block hover:text-[#4a6741] focus:outline-none focus:ring-0">Thank you cards</a>
                    <a class="block hover:text-[#4a6741] focus:outline-none focus:ring-0">Invitation cards</a>
                    <a class="block hover:text-[#4a6741] focus:outline-none focus:ring-0">Wedding cards</a>
                    <a class="block font-semibold text-[#4a6741] focus:outline-none focus:ring-0">Christmas cards</a>
                    <a class="block hover:text-[#4a6741] focus:outline-none focus:ring-0">Exclusive inserts</a>
                    <a class="block hover:text-[#4a6741] focus:outline-none focus:ring-0">Autograph cards</a>
                    <a class="block hover:text-[#4a6741] focus:outline-none focus:ring-0">Menus</a>
                    <a class="block hover:text-[#4a6741] focus:outline-none focus:ring-0">Plastic cards</a>
                </div>
            </aside>

            <!-- Konten utama -->
            <div class="lg:col-span-3 space-y-6">
                <!-- Banner -->
                <div class="overflow-hidden rounded-xl border border-gray-200">
                    <div class="bg-gradient-to-r from-[#b5b09f] to-[#e6e0d6] h-48 flex items-end px-8 py-6">
                        <h1 class="text-3xl font-bold text-gray-900">Christmas cards</h1>
                    </div>
                </div>

                <!-- Grid kartu -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @php
                        $cards = [
                            [
                                'title' => 'Christmas postcards',
                                'desc' => 'Send personalised Christmas greetings on a postcard',
                                'img' => 'images/kartu-ucapan-1.jpg'
                            ],
                            [
                                'title' => 'Special-effect cards',
                                'desc' => 'Christmas greetings with dazzling details',
                                'img' => 'images/kartu-ucapan-2.jpg'
                            ],
                            [
                                'title' => 'Spot finish postcards',
                                'desc' => 'Glitter & spot UV highlights',
                                'img' => 'images/kartu-ucapan-3.jpg'
                            ],
                            [
                                'title' => 'Folded Christmas cards',
                                'desc' => 'Festive seasonal designs with a personal touch',
                                'img' => 'images/kartu-ucapan-4.jpg'
                            ],
                        ];
                    @endphp

                    @foreach($cards as $card)
                        <div class="bg-white rounded-lg border border-gray-200 overflow-hidden">
                            <div class="aspect-[3/4] bg-gray-50 overflow-hidden">
                                <img src="{{ asset($card['img']) }}" alt="{{ $card['title'] }}" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>{{ $card['title'] }}</div>'">
                            </div>
                            <div class="p-4">
                                <h3 class="font-semibold text-gray-900 text-sm mb-1">{{ $card['title'] }}</h3>
                                <p class="text-xs text-gray-600 mb-3 leading-snug">{{ $card['desc'] }}</p>
                                <a class="inline-flex items-center text-sm font-semibold text-[#4a6741] hover:underline">Lihat detail</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection