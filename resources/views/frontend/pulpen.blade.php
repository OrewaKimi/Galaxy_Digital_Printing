@extends('layouts.app')

@section('title', 'Promotional pens - Galaxy Digital Printing')

@section('content')
<!-- Breadcrumb -->
<div class="bg-white border-b border-gray-200">
    <div class="container mx-auto px-4 py-3">
        <nav class="flex items-center gap-2 text-sm flex-wrap">
            <a href="/" class="text-gray-700 hover:text-[#4a6741]">Start page</a>
            <span class="text-gray-400">></span>
            <a href="#" class="text-gray-700 hover:text-[#4a6741]">Promotional items</a>
            <span class="text-gray-400">></span>
            <a href="#" class="text-gray-700 hover:text-[#4a6741]">Office</a>
            <span class="text-gray-400">></span>
            <a href="#" class="text-gray-700 hover:text-[#4a6741]">Pens & pencils</a>
            <span class="text-gray-400">></span>
            <span class="text-gray-900 font-semibold">Promotional pens</span>
        </nav>
    </div>
</div>

<!-- Page Body -->
<section class="bg-white">
    <div class="container mx-auto px-4 pb-12 lg:pb-16">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Filters Sidebar -->
            <aside class="lg:col-span-1 lg:sticky lg:top-24 h-max">
                <div class="space-y-6">
                    <!-- Header -->
                    <div class="flex items-center justify-between border-b border-gray-200 pb-4">
                        <h3 class="font-bold text-gray-900 text-base">Filter</h3>
                        <a href="#" class="text-xs text-gray-600 hover:text-[#4a6741]">Reset all</a>
                    </div>

                    <!-- Product Color -->
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="font-semibold text-gray-900 text-sm">product color</h4>
                            <span class="text-xs text-gray-400">▲</span>
                        </div>
                        <ul class="space-y-3">
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="w-3 h-3 rounded-full bg-black"></span>
                                    <span class="text-sm text-gray-700">Black</span>
                                </label>
                                <span class="text-xs text-gray-500">59</span>
                            </li>
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="w-3 h-3 rounded-full bg-blue-600"></span>
                                    <span class="text-sm text-gray-700">Blue</span>
                                </label>
                                <span class="text-xs text-gray-500">44</span>
                            </li>
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="w-3 h-3 rounded-full bg-green-600"></span>
                                    <span class="text-sm text-gray-700">Green</span>
                                </label>
                                <span class="text-xs text-gray-500">26</span>
                            </li>
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="w-3 h-3 rounded-full bg-gray-500"></span>
                                    <span class="text-sm text-gray-700">Grey</span>
                                </label>
                                <span class="text-xs text-gray-500">18</span>
                            </li>
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="w-3 h-3 rounded-full bg-orange-500"></span>
                                    <span class="text-sm text-gray-700">Orange</span>
                                </label>
                                <span class="text-xs text-gray-500">33</span>
                            </li>
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="w-3 h-3 rounded-full bg-pink-400"></span>
                                    <span class="text-sm text-gray-700">Pink</span>
                                </label>
                                <span class="text-xs text-gray-500">8</span>
                            </li>
                        </ul>
                        <button class="text-xs text-gray-600 hover:text-[#4a6741] mt-3 font-semibold">Show more (11)</button>
                    </div>

                    <!-- Material -->
                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="font-semibold text-gray-900 text-sm">Material</h4>
                            <span class="text-xs text-gray-400">▲</span>
                        </div>
                        <ul class="space-y-3">
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="text-sm text-gray-700">metal</span>
                                </label>
                                <span class="text-xs text-gray-500">5</span>
                            </li>
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="text-sm text-gray-700">metal/plastic</span>
                                </label>
                                <span class="text-xs text-gray-500">1</span>
                            </li>
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="text-sm text-gray-700">metal/wood</span>
                                </label>
                                <span class="text-xs text-gray-500">1</span>
                            </li>
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="text-sm text-gray-700">plastic</span>
                                </label>
                                <span class="text-xs text-gray-500">35</span>
                            </li>
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="text-sm text-gray-700">plastic/corn</span>
                                </label>
                                <span class="text-xs text-gray-500">1</span>
                            </li>
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="text-sm text-gray-700">plastic/metal</span>
                                </label>
                                <span class="text-xs text-gray-500">9</span>
                            </li>
                        </ul>
                        <button class="text-xs text-gray-600 hover:text-[#4a6741] mt-3 font-semibold">Show more (7)</button>
                    </div>

                    <!-- Availability Toggle -->
                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex items-center justify-between">
                            <h4 class="font-semibold text-gray-900 text-sm">Availability</h4>
                            <label class="relative inline-flex cursor-pointer">
                                <input type="checkbox" class="sr-only peer" checked>
                                <div class="w-9 h-5 bg-green-600 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all"></div>
                            </label>
                        </div>
                    </div>

                    <!-- Features -->
                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="font-semibold text-gray-900 text-sm">Features</h4>
                            <span class="text-xs text-gray-400">▲</span>
                        </div>
                        <ul class="space-y-3">
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="text-sm text-gray-700">Best Price</span>
                                </label>
                                <span class="text-xs text-gray-500">3</span>
                            </li>
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="text-sm text-gray-700">certified</span>
                                </label>
                                <span class="text-xs text-gray-500">4</span>
                            </li>
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="text-sm text-gray-700">Made in Germany</span>
                                </label>
                                <span class="text-xs text-gray-500">18</span>
                            </li>
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="text-sm text-gray-700">new</span>
                                </label>
                                <span class="text-xs text-gray-500">1</span>
                            </li>
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="text-sm text-gray-700">premium</span>
                                </label>
                                <span class="text-xs text-gray-500">5</span>
                            </li>
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="text-sm text-gray-700">recommended</span>
                                </label>
                                <span class="text-xs text-gray-500">5</span>
                            </li>
                        </ul>
                        <button class="text-xs text-gray-600 hover:text-[#4a6741] mt-3 font-semibold">Show more (7)</button>
                    </div>

                    <!-- Fast Shipping Toggle -->
                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex items-center justify-between">
                            <h4 class="font-semibold text-gray-900 text-sm">Fast shipping</h4>
                            <label class="relative inline-flex cursor-pointer">
                                <input type="checkbox" class="sr-only peer" checked>
                                <div class="w-9 h-5 bg-green-600 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all"></div>
                            </label>
                        </div>
                    </div>

                    <!-- Online Design Option Toggle -->
                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex items-center justify-between">
                            <h4 class="font-semibold text-gray-900 text-sm">Online design option</h4>
                            <label class="relative inline-flex cursor-pointer">
                                <input type="checkbox" class="sr-only peer" checked>
                                <div class="w-9 h-5 bg-green-600 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all"></div>
                            </label>
                        </div>
                    </div>

                    <!-- Printing Method -->
                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex items-center justify-between mb-4">
                            <h4 class="font-semibold text-gray-900 text-sm">Printing method</h4>
                            <span class="text-xs text-gray-400">▲</span>
                        </div>
                        <ul class="space-y-3">
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="text-sm text-gray-700">Digital printing</span>
                                </label>
                                <span class="text-xs text-gray-500">2</span>
                            </li>
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="text-sm text-gray-700">Laser engraving</span>
                                </label>
                                <span class="text-xs text-gray-500">8</span>
                            </li>
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="text-sm text-gray-700">Pad printing</span>
                                </label>
                                <span class="text-xs text-gray-500">24</span>
                            </li>
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="text-sm text-gray-700">Screen printing</span>
                                </label>
                                <span class="text-xs text-gray-500">18</span>
                            </li>
                            <li class="flex items-center justify-between gap-2">
                                <label class="flex items-center gap-2 cursor-pointer flex-1">
                                    <input type="checkbox" class="rounded">
                                    <span class="text-sm text-gray-700">UV printing</span>
                                </label>
                                <span class="text-xs text-gray-500">1</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>

            <!-- Content column -->
            <div class="lg:col-span-3 space-y-8">
                <!-- Banner Heading -->
                <div class="relative rounded-lg overflow-hidden bg-gradient-to-r from-stone-300 via-stone-200 to-stone-100 h-40 flex items-center px-8">
                    <h1 class="text-gray-900 text-2xl lg:text-3xl font-bold">Promotional pens</h1>
                </div>

                <!-- Product Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @php
                        $pens = [
                            ['slug'=>'plastic-ball-pen-banana','title'=>'Plastic ball pen Banana','size'=>'Ø 1.3 x 14.5 cm','badge'=>'recommended'],
                            ['slug'=>'ball-pen-baltimore','title'=>'Ball pen Baltimore','size'=>'Ø 1.0 x 13.8 cm','badge'=>'recommended'],
                            ['slug'=>'ballpoint-pen-brasilia','title'=>'Ballpoint pen Brasilia','size'=>'Ø 1.0 x 14.0 cm','badge'=>'recommended'],
                            ['slug'=>'liberty-soft-touch-blue','title'=>'Liberty Soft Touch press button pen','size'=>'Ø 1.5 x 14.5 cm','badge'=>'recommended'],
                            ['slug'=>'ballpoint-1-0x14-8','title'=>'Ballpoint pens, 1.0 x 14.8 cm','size'=>'Ø 1.0 x 14.8 cm','badge'=>'premium'],
                            ['slug'=>'recycled-semi-gel-horizonte','title'=>'Recycled Semi Gel Pen Belo Horizonte','size'=>'Ø 1.0 x 14.8 cm','badge'=>'new'],
                            ['slug'=>'intkess-pencil-halmstad','title'=>'Intkess pencil Halmstad','size'=>'Ø 0.9 x 15.0 cm','badge'=>'premium'],
                            ['slug'=>'challenger-clear-press','title'=>'Challenger Clear press button pen','size'=>'Ø 1.2 x 14.9 cm','badge'=>'premium'],
                            ['slug'=>'metal-pen-black','title'=>'Metal pen black','size'=>'Ø 1.0 x 13.6 cm','badge'=>'best'],
                            ['slug'=>'metal-pen-white','title'=>'Metal pen white','size'=>'Ø 1.0 x 13.6 cm','badge'=>'best'],
                            ['slug'=>'green-pen','title'=>'Green promotional pen','size'=>'Ø 1.0 x 14.0 cm','badge'=>'best'],
                            ['slug'=>'white-green-clip','title'=>'White pen with green clip','size'=>'Ø 1.0 x 14.0 cm','badge'=>'recommended'],
                        ];
                    @endphp

                    @foreach($pens as $pen)
                    <div class="bg-white rounded-lg border border-gray-200 overflow-hidden hover:shadow-md transition-shadow">
                        <div class="relative p-4 h-52 flex items-center justify-center bg-white">
                            @if($pen['badge']==='new')
                                <span class="absolute left-3 top-3 text-[10px] uppercase bg-red-600 text-white px-2 py-0.5 rounded">new</span>
                            @elseif($pen['badge']==='premium')
                                <span class="absolute left-3 top-3 text-[10px] uppercase bg-amber-500 text-white px-2 py-0.5 rounded">premium</span>
                            @elseif($pen['badge']==='best')
                                <span class="absolute left-3 top-3 text-[10px] uppercase bg-sky-600 text-white px-2 py-0.5 rounded">best price</span>
                            @elseif($pen['badge']==='recommended')
                                <span class="absolute left-3 top-3 text-[10px] uppercase bg-indigo-500 text-white px-2 py-0.5 rounded">recommended</span>
                            @endif

                            <img 
                                src="{{ asset('images/products/pens/'.$pen['slug'].'.jpg') }}" 
                                alt="{{ $pen['title'] }}" 
                                title="{{ $pen['title'] }}"
                                class="max-h-44 object-contain"
                                loading="lazy"
                                onerror="this.parentElement.innerHTML='<div class=&quot;w-full h-40 flex items-center justify-center text-gray-400 text-xs&quot;>{{ $pen['title'] }}</div>'">
                        </div>
                        <div class="px-4 pb-4">
                            <h3 class="font-semibold text-gray-900 text-sm leading-snug">{{ $pen['title'] }}</h3>
                            <p class="text-[11px] text-gray-600 mt-1">{{ $pen['size'] }}</p>
                            <div class="mt-3 flex items-center gap-1">
                                <span class="w-2.5 h-2.5 rounded-full bg-black"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-gray-500"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-green-600"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-red-600"></span>
                                <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection