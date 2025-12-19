<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Galaxy Digital Printing')</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>

<body class="bg-white">
    <!-- Top Bar -->
    <div class="bg-[#f5f1e8] text-gray-700 py-2.5 text-xs border-b border-gray-200">
        <div class="container mx-auto px-4">
            <div class="flex justify-center items-center gap-8">
                <a href="#" class="hover:text-gray-900 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span>Gratis ongkos kirim standar</span>
                </a>
                <a href="#" class="hover:text-gray-900 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <span>5 tahun pengalaman</span>
                </a>
                <a href="#" class="hover:text-gray-900 flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <span>Produksi sendiri</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <header class="bg-[#4a6741] sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center">
                    <div class="bg-white w-10 h-10 rounded-full flex items-center justify-center mr-3 shadow-sm">
                        <i class="fas fa-print text-[#4a6741] text-lg"></i>
                    </div>
                    <span class="text-2xl font-semibold text-white tracking-tight">Galaxy Printing</span>
                </a>

                <!-- Search Bar -->
                <div class="flex-1 max-w-xl mx-8">
                    <div class="relative">
                        <input type="text" placeholder="Cari produk..." class="w-full px-4 py-2.5 pr-12 rounded text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-white focus:ring-opacity-50">
                        <button class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Right Menu Icons -->
                <div class="flex items-center gap-6">
                    @auth
                        <div class="relative group">
                            <button class="text-white hover:text-gray-200 flex flex-col items-center" title="Profil">
                                <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                                <span class="text-xs">Profil</span>
                            </button>
                            <div class="hidden group-hover:block absolute right-0 bg-white text-gray-800 rounded shadow-lg w-48 py-2 z-10">
                                <a href="{{ route('profile') }}" class="block px-4 py-2 hover:bg-gray-100">Profil Saya</a>
                                <form method="POST" action="{{ route('logout') }}" class="block">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-white hover:text-gray-200 flex flex-col items-center" title="Masuk">
                            <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="text-xs">Masuk</span>
                        </a>
                    @endauth
                </div>

                    <a href="#" class="text-white hover:text-gray-200 flex flex-col items-center" title="Bantuan">
                        <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <span class="text-xs">Bantuan</span>
                    </a>

                    <a href="#" class="text-white hover:text-gray-200 flex flex-col items-center" title="Favorit">
                        <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                        </svg>
                        <span class="text-xs">Favorit</span>
                    </a>

                    <a href="#" class="text-white hover:text-gray-200 flex flex-col items-center" title="Keranjang">
                        <svg class="w-6 h-6 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <span class="text-xs">Keranjang</span>
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Navigation Menu -->
    <nav class="bg-white border-b border-gray-200">
        <div class="container mx-auto px-4">
            <div class="flex items-center gap-1 py-3 text-sm">
                <a href="#" class="text-gray-700 hover:text-[#4a6741] px-3 py-2 font-medium whitespace-nowrap">Semua Produk</a>
                <span class="text-gray-300">|</span>
    
                <!-- Brosur Dropdown -->
                <div class="relative group">
                    <button class="text-gray-700 hover:text-[#4a6741] px-3 py-2 flex items-center gap-1 whitespace-nowrap group">
                        Brosur
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    
                    <!-- Mega Dropdown Menu -->
                    <div class="hidden group-hover:block fixed left-0 right-0 top-[128px] mx-auto w-full bg-white border-b border-gray-200 shadow-xl z-20 py-8 px-4">
                        <div class="container mx-auto max-w-7xl">
                            <!-- Grid Layout for Product Categories -->
                            <div class="grid grid-cols-5 gap-10 mb-8">
                                <!-- Card 1: Adhesive-bound -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">📋</div>
                                            <p class="text-xs text-gray-500">Katalog</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Brosur/Katalog</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">Adhesive-bound</p>
                                </a>

                                <!-- Card 2: Digitally printed -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">🖨️</div>
                                            <p class="text-xs text-gray-500">Digital</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Brosur</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">Digitally printed</p>
                                </a>

                                <!-- Card 3: Eco/natural paper -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">🌿</div>
                                            <p class="text-xs text-gray-500">Alami</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Brosur</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">Eco/natural paper</p>
                                </a>

                                <!-- Card 4: Books -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">📚</div>
                                            <p class="text-xs text-gray-500">Buku</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Books</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">&nbsp;</p>
                                </a>

                                <!-- Card 5: Show All -->
                                <a href="{{ route('brosur') }}" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <p class="text-sm font-bold text-gray-700 leading-tight">LIHAT SEMUA<br/>BROSUR</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">&nbsp;</h3>
                                    <p class="text-xs text-gray-600">&nbsp;</p>
                                </a>
                            </div>

                            <!-- Bottom Links -->
                            <div class="pt-4 border-t border-gray-200">
                                <p class="text-xs text-gray-600 mb-2 font-semibold">Temukan lebih lanjut:</p>
                                <div class="flex gap-3 flex-wrap text-xs">
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Folded Leaflets</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Folders/Binders</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Mailers</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Newspapers</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Catalogues</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <span class="text-gray-300">|</span>

                <!-- Flyer & Selebaran Dropdown -->
                <div class="relative group">
                    <button class="text-gray-700 hover:text-[#4a6741] px-3 py-2 flex items-center gap-1 whitespace-nowrap group">
                        Flyer & Selebaran
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Mega Dropdown Menu -->
                    <div class="hidden group-hover:block fixed left-0 right-0 top-[128px] mx-auto w-full bg-white border-b border-gray-200 shadow-xl z-20 py-8 px-4">
                        <div class="container mx-auto max-w-7xl">
                            <!-- Grid Layout for Product Categories -->
                            <div class="grid grid-cols-5 gap-10 mb-8">
                                <!-- Card 1: Printed on one side -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">📄</div>
                                            <p class="text-xs text-gray-500">One Side</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Flyer & Leaflets</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">Printed on one side</p>
                                </a>

                                <!-- Card 2: Printed on both sides -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">📑</div>
                                            <p class="text-xs text-gray-500">Both Sides</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Flyer & Leaflets</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">Printed on both sides</p>
                                </a>

                                <!-- Card 3: Folded Leaflets -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">📰</div>
                                            <p class="text-xs text-gray-500">Folded</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Folded Leaflets</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">Lipat 3 & Lipat 4</p>
                                </a>

                                <!-- Card 4: With spot finish -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">✨</div>
                                            <p class="text-xs text-gray-500">Spot Finish</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Flyer & Leaflets</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">With spot finish</p>
                                </a>

                                <!-- Card 5: Show All -->
                                <a href="{{ route('flyer') }}" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <p class="text-sm font-bold text-gray-700 leading-tight">LIHAT SEMUA<br/>FLYER</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">&nbsp;</h3>
                                    <p class="text-xs text-gray-600">&nbsp;</p>
                                </a>
                            </div>

                            <!-- Bottom Links -->
                            <div class="pt-4 border-t border-gray-200">
                                <p class="text-xs text-gray-600 mb-2 font-semibold">Temukan lebih lanjut:</p>
                                <div class="flex gap-3 flex-wrap text-xs">
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Counter top dispenser</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Postcards</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Business cards</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Paper samples</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Certified papers</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="text-gray-300">|</span>

                <!-- Posters Dropdown -->
                <div class="relative group">
                    <button class="text-gray-700 hover:text-[#4a6741] px-3 py-2 flex items-center gap-1 whitespace-nowrap group">
                        Poster
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Mega Dropdown Menu -->
                    <div class="hidden group-hover:block fixed left-0 right-0 top-[128px] mx-auto w-full bg-white border-b border-gray-200 shadow-xl z-20 py-8 px-4">
                        <div class="container mx-auto max-w-7xl">
                            <!-- Grid Layout for Product Categories -->
                            <div class="grid grid-cols-5 gap-10 mb-8">
                                <!-- Card 1: Posters -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">🎨</div>
                                            <p class="text-xs text-gray-500">Posters</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Posters</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">&nbsp;</p>
                                </a>

                                <!-- Card 2: Neon posters -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">✨</div>
                                            <p class="text-xs text-gray-500">Neon</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Neon posters</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">&nbsp;</p>
                                </a>

                                <!-- Card 3: Corrugated plastic sheets -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">📦</div>
                                            <p class="text-xs text-gray-500">Coroplast</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Corrugated plastic sheets</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">&nbsp;</p>
                                </a>

                                <!-- Card 4: Printed sheets -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">📄</div>
                                            <p class="text-xs text-gray-500">Sheets</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Printed sheets</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">&nbsp;</p>
                                </a>

                                <!-- Card 5: Show All -->
                                <a href="{{ route('poster') }}" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <p class="text-sm font-bold text-gray-700 leading-tight">LIHAT SEMUA<br/>POSTER</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">&nbsp;</h3>
                                    <p class="text-xs text-gray-600">&nbsp;</p>
                                </a>
                            </div>

                            <!-- Bottom Links -->
                            <div class="pt-4 border-t border-gray-200">
                                <p class="text-xs text-gray-600 mb-2 font-semibold">Temukan lebih lanjut:</p>
                                <div class="flex gap-3 flex-wrap text-xs">
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Roller banners</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Banners</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Stickers</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Flags</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Signs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="text-gray-300">|</span>

                <!-- Pakaian Dropdown -->
                <div class="relative group">
                    <button class="text-gray-700 hover:text-[#4a6741] px-3 py-2 flex items-center gap-1 whitespace-nowrap group">
                        Pakaian
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Mega Dropdown Menu -->
                    <div class="hidden group-hover:block fixed left-0 right-0 top-[128px] mx-auto w-full bg-white border-b border-gray-200 shadow-xl z-20 py-8 px-4">
                        <div class="container mx-auto max-w-7xl">
                            <!-- Grid Layout for Product Categories -->
                            <div class="grid grid-cols-5 gap-10 mb-8">
                                <!-- Card 1: T-Shirt -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">👕</div>
                                            <p class="text-xs text-gray-500">T-Shirt</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">T-Shirt</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">Cotton & Polyester</p>
                                </a>

                                <!-- Card 2: Polo Shirt -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">🎽</div>
                                            <p class="text-xs text-gray-500">Polo</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Polo Shirt</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">Premium Quality</p>
                                </a>

                                <!-- Card 3: Hoodie -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">🧥</div>
                                            <p class="text-xs text-gray-500">Hoodie</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Hoodie</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">Warm & Comfortable</p>
                                </a>

                                <!-- Card 4: Tote Bag -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">👜</div>
                                            <p class="text-xs text-gray-500">Tote Bag</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Tote Bag</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">Canvas & Durable</p>
                                </a>

                                <!-- Card 5: Show All -->
                                <a href="{{ route('pakaian') }}" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <p class="text-sm font-bold text-gray-700 leading-tight">LIHAT SEMUA<br/>PAKAIAN</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">&nbsp;</h3>
                                    <p class="text-xs text-gray-600">&nbsp;</p>
                                </a>
                            </div>

                            <!-- Bottom Links -->
                            <div class="pt-4 border-t border-gray-200">
                                <p class="text-xs text-gray-600 mb-2 font-semibold">Temukan lebih lanjut:</p>
                                <div class="flex gap-3 flex-wrap text-xs">
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Jacket</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Pants</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Cap/Hat</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Sports Wear</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Uniform</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="text-gray-300">|</span>

                <!-- Kartu Nama & Kartu Dropdown -->
                <div class="relative group">
                    <button class="text-gray-700 hover:text-[#4a6741] px-3 py-2 flex items-center gap-1 whitespace-nowrap group">
                        Kartu Nama & Kartu
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Mega Dropdown Menu -->
                    <div class="hidden group-hover:block fixed left-0 right-0 top-[128px] mx-auto w-full bg-white border-b border-gray-200 shadow-xl z-20 py-8 px-4">
                        <div class="container mx-auto max-w-7xl">
                            <!-- Grid Layout for Product Categories -->
                            <div class="grid grid-cols-5 gap-10 mb-8">
                                <!-- Card 1: Business cards -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">🗂️</div>
                                            <p class="text-xs text-gray-500">Business</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Business cards</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">&nbsp;</p>
                                </a>

                                <!-- Card 2: Postcards -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">📮</div>
                                            <p class="text-xs text-gray-500">Postcard</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Postcards</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">&nbsp;</p>
                                </a>

                                <!-- Card 3: Folded cards -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">📄</div>
                                            <p class="text-xs text-gray-500">Folded</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Folded cards</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">&nbsp;</p>
                                </a>

                                <!-- Card 4: Inserts -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">📋</div>
                                            <p class="text-xs text-gray-500">Insert</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Inserts</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">&nbsp;</p>
                                </a>

                                <!-- Card 5: Show All -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <p class="text-sm font-bold text-gray-700 leading-tight">SHOW ALL<br/>CARDS</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">&nbsp;</h3>
                                    <p class="text-xs text-gray-600">&nbsp;</p>
                                </a>
                            </div>

                            <!-- Bottom Links -->
                            <div class="pt-4 border-t border-gray-200">
                                <p class="text-xs text-gray-600 mb-2 font-semibold">Discover more:</p>
                                <div class="flex gap-3 flex-wrap text-xs">
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Envelopes</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Sweets</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Business card samples</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Folders</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Ballpoint pens</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="text-gray-300">|</span>

                <!-- Perlengkapan Kantor Dropdown -->
                <div class="relative group">
                    <button class="text-gray-700 hover:text-[#4a6741] px-3 py-2 flex items-center gap-1 whitespace-nowrap group">
                        Perlengkapan Kantor
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Mega Dropdown Menu -->
                    <div class="hidden group-hover:block fixed left-0 right-0 top-[128px] mx-auto w-full bg-white border-b border-gray-200 shadow-xl z-20 py-8 px-4">
                        <div class="container mx-auto max-w-7xl">
                            <!-- Grid Layout for Product Categories -->
                            <div class="grid grid-cols-5 gap-10 mb-8">
                                <!-- Card 1: Letterheads -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">📝</div>
                                            <p class="text-xs text-gray-500">Letterhead</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Letterheads</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">&nbsp;</p>
                                </a>

                                <!-- Card 2: Envelopes -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">✉️</div>
                                            <p class="text-xs text-gray-500">Envelope</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Envelopes</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">&nbsp;</p>
                                </a>

                                <!-- Card 3: Notepads -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">📓</div>
                                            <p class="text-xs text-gray-500">Notepad</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Notepads</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">&nbsp;</p>
                                </a>

                                <!-- Card 4: NCR pads -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">📋</div>
                                            <p class="text-xs text-gray-500">NCR Pad</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">NCR pads</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">&nbsp;</p>
                                </a>

                                <!-- Card 5: Show All -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <p class="text-sm font-bold text-gray-700 leading-tight">SHOW ALL</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">&nbsp;</h3>
                                    <p class="text-xs text-gray-600">&nbsp;</p>
                                </a>
                            </div>

                            <!-- Bottom Links -->
                            <div class="pt-4 border-t border-gray-200">
                                <p class="text-xs text-gray-600 mb-2 font-semibold">Discover more:</p>
                                <div class="flex gap-3 flex-wrap text-xs">
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Business cards</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Stamps</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Ballpoint pens</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Calendars</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Sticky notes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="text-gray-300">|</span>

                <!-- Stiker Dropdown -->
                <div class="relative group">
                    <button class="text-gray-700 hover:text-[#4a6741] px-3 py-2 flex items-center gap-1 whitespace-nowrap group">
                        Stiker
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Mega Dropdown Menu -->
                    <div class="hidden group-hover:block fixed left-0 right-0 top-[128px] mx-auto w-full bg-white border-b border-gray-200 shadow-xl z-20 py-8 px-4">
                        <div class="container mx-auto max-w-7xl">
                            <!-- Grid Layout for Product Categories -->
                            <div class="grid grid-cols-5 gap-10 mb-8">
                                <!-- Card 1: Labels on roll -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">🏷️</div>
                                            <p class="text-xs text-gray-500">Roll</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Labels on roll</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">&nbsp;</p>
                                </a>

                                <!-- Card 2: Promotional stickers -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">⭐</div>
                                            <p class="text-xs text-gray-500">Promotion</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Promotional stickers</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">&nbsp;</p>
                                </a>

                                <!-- Card 3: Address stickers -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">📍</div>
                                            <p class="text-xs text-gray-500">Address</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Address stickers</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">&nbsp;</p>
                                </a>

                                <!-- Card 4: Adhesive film -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">🎬</div>
                                            <p class="text-xs text-gray-500">Adhesive</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Adhesive film</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">Large-sized</p>
                                </a>

                                <!-- Card 5: Show All -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <p class="text-sm font-bold text-gray-700 leading-tight">SHOW ALL<br/>STICKERS</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">&nbsp;</h3>
                                    <p class="text-xs text-gray-600">&nbsp;</p>
                                </a>
                            </div>

                            <!-- Bottom Links -->
                            <div class="pt-4 border-t border-gray-200">
                                <p class="text-xs text-gray-600 mb-2 font-semibold">Discover more:</p>
                                <div class="flex gap-3 flex-wrap text-xs">
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Exhibition systems</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Envelopes</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Folders</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Posters</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="text-gray-300">|</span>

                <!-- Pulpen Promosi Dropdown -->
                <div class="relative group">
                    <button class="text-gray-700 hover:text-[#4a6741] px-3 py-2 flex items-center gap-1 whitespace-nowrap group">
                        Pulpen Promosi
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Mega Dropdown Menu -->
                    <div class="hidden group-hover:block fixed left-0 right-0 top-[128px] mx-auto w-full bg-white border-b border-gray-200 shadow-xl z-20 py-8 px-4">
                        <div class="container mx-auto max-w-7xl">
                            <!-- Grid Layout for Product Categories -->
                            <div class="grid grid-cols-5 gap-10 mb-8">
                                <!-- Card 1: Ballpoint pens -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">🖊️</div>
                                            <p class="text-xs text-gray-500">Ballpoint</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Ballpoint pens</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">Classic & reliable</p>
                                </a>

                                <!-- Card 2: Gel pens -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">✏️</div>
                                            <p class="text-xs text-gray-500">Gel</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Gel pens</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">Smooth writing</p>
                                </a>

                                <!-- Card 3: Highlighter pens -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">🖍️</div>
                                            <p class="text-xs text-gray-500">Highlighter</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Highlighter pens</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">Vibrant colors</p>
                                </a>

                                <!-- Card 4: Marker pens -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">🖌️</div>
                                            <p class="text-xs text-gray-500">Marker</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Marker pens</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">Permanent ink</p>
                                </a>

                                <!-- Card 5: Show All -->
                                <a href="{{ route('pulpen') }}" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <p class="text-sm font-bold text-gray-700 leading-tight">LIHAT SEMUA<br/>PULPEN</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">&nbsp;</h3>
                                    <p class="text-xs text-gray-600">&nbsp;</p>
                                </a>
                            </div>

                            <!-- Bottom Links -->
                            <div class="pt-4 border-t border-gray-200">
                                <p class="text-xs text-gray-600 mb-2 font-semibold">Temukan lebih lanjut:</p>
                                <div class="flex gap-3 flex-wrap text-xs">
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Pencil</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Pen sets</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">USB drives</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Keychains</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="text-gray-300">|</span>

                <!-- Sampel Produk Dropdown -->
                <div class="relative group">
                    <button class="text-gray-700 hover:text-[#4a6741] px-3 py-2 flex items-center gap-1 whitespace-nowrap group">
                        Sampel Produk
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Mega Dropdown Menu -->
                    <div class="hidden group-hover:block fixed left-0 right-0 top-[128px] mx-auto w-full bg-white border-b border-gray-200 shadow-xl z-20 py-8 px-4">
                        <div class="container mx-auto max-w-7xl">
                            <!-- Grid Layout for Product Categories -->
                            <div class="grid grid-cols-5 gap-10 mb-8">
                                <!-- Card 1: Pens & pencils -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">✒️</div>
                                            <p class="text-xs text-gray-500">Pens</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Pens & pencils</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">Writing samples</p>
                                </a>

                                <!-- Card 2: Bags -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">👜</div>
                                            <p class="text-xs text-gray-500">Bags</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Bags</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">Totes & gym bags</p>
                                </a>

                                <!-- Card 3: Cups/Bottles -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">🍿</div>
                                            <p class="text-xs text-gray-500">Drinkware</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Cups/Bottles</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">Mugs & water bottles</p>
                                </a>

                                <!-- Card 4: Sweets -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">🍬</div>
                                            <p class="text-xs text-gray-500">Candy</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Sweets</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">Gums & biscuits</p>
                                </a>

                                <!-- Card 5: Show All -->
                                <a href="{{ route('sampel-produk') }}" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <p class="text-sm font-bold text-gray-700 leading-tight">SHOW ALL</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">&nbsp;</h3>
                                    <p class="text-xs text-gray-600">&nbsp;</p>
                                </a>
                            </div>

                            <!-- Bottom Links -->
                            <div class="pt-4 border-t border-gray-200">
                                <p class="text-xs text-gray-600 mb-2 font-semibold">Discover more:</p>
                                <div class="flex gap-3 flex-wrap text-xs">
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Notepads</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Exhibition systems</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Packaging</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="text-gray-300">|</span>

                <!-- Layanan Dropdown -->
                <div class="relative group">
                    <button class="text-gray-700 hover:text-[#4a6741] px-3 py-2 flex items-center gap-1 whitespace-nowrap group">
                        Layanan
                        <svg class="w-3 h-3 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Mega Dropdown Menu -->
                    <div class="hidden group-hover:block fixed left-0 right-0 top-[128px] mx-auto w-full bg-white border-b border-gray-200 shadow-xl z-20 py-8 px-4">
                        <div class="container mx-auto max-w-7xl">
                            <!-- Grid Layout for Product Categories -->
                            <div class="grid grid-cols-5 gap-10 mb-8">
                                <!-- Card 1: Product samples -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">📦</div>
                                            <p class="text-xs text-gray-500">Samples</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Product samples</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">&nbsp;</p>
                                </a>

                                <!-- Card 2: Corporate solutions -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">🏢</div>
                                            <p class="text-xs text-gray-500">Corporate</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Corporate solutions</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">Punchout, custom designs</p>
                                </a>

                                <!-- Card 3: Design online -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">🎨</div>
                                            <p class="text-xs text-gray-500">Designer</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Design online</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">&nbsp;</p>
                                </a>

                                <!-- Card 4: Support Centre -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <div class="text-5xl mb-2">💬</div>
                                            <p class="text-xs text-gray-500">Support</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">Support Centre</h3>
                                    <p class="text-xs text-gray-600 group-hover/card:text-[#4a6741] transition-colors">&nbsp;</p>
                                </a>

                                <!-- Card 5: Show All -->
                                <a href="#" class="group/card flex flex-col hover:no-underline">
                                    <div class="bg-[#f5f1e8] rounded-lg overflow-hidden mb-4 h-48 flex items-center justify-center group-hover/card:shadow-lg transition-shadow">
                                        <div class="text-center">
                                            <p class="text-sm font-bold text-gray-700 leading-tight">LIHAT SEMUA<br/>LAYANAN</p>
                                        </div>
                                    </div>
                                    <h3 class="font-bold text-gray-800 text-sm mb-1">&nbsp;</h3>
                                    <p class="text-xs text-gray-600">&nbsp;</p>
                                </a>
                            </div>

                            <!-- Bottom Links -->
                            <div class="pt-4 border-t border-gray-200">
                                <p class="text-xs text-gray-600 mb-2 font-semibold">Discover more:</p>
                                <div class="flex gap-3 flex-wrap text-xs">
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Finishing options</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Binding guide</a>
                                    <span class="text-gray-300">|</span>
                                    <a href="#" class="text-[#4a6741] hover:underline font-medium">Material guide</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main>
        <!-- Success Message -->
        @if ($message = Session::get('success'))
            <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6" role="alert">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700">{{ $message }}</p>
                    </div>
                    <button onclick="this.parentElement.parentElement.style.display='none';" class="ml-auto text-green-500 hover:text-green-700">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        <!-- Error Message -->
        @if ($message = Session::get('error'))
            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6" role="alert">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700">{{ $message }}</p>
                    </div>
                    <button onclick="this.parentElement.parentElement.style.display='none';" class="ml-auto text-red-500 hover:text-red-700">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Newsletter Section -->
    <section class="py-12 bg-white border-t border-gray-200">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto text-center">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Berlangganan newsletter & dapatkan diskon 15%</h3>
                <form class="flex gap-3 max-w-md mx-auto">
                    <input type="email" placeholder="Alamat email Anda" class="flex-1 px-4 py-3 border border-gray-300 rounded text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-[#4a6741] focus:border-[#4a6741]" required>
                    <button type="submit" class="bg-[#f0ad4e] hover:bg-[#ec971f] text-white font-bold px-6 py-3 rounded transition-colors">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </form>
                <p class="text-xs text-gray-500 mt-4">Dengan berlangganan, Anda menyetujui kebijakan privasi kami</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#4a6741] text-gray-200 pt-12 pb-6">
        <div class="container mx-auto px-4">
            <!-- Footer Top -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-10">
                <!-- About Column -->
                <div>
                    <h4 class="text-white font-bold text-sm mb-4">Tentang Kami</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="#" class="hover:text-white transition-colors">Perusahaan</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Info Media</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Karir</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Lingkungan</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Kontak</a></li>
                    </ul>
                </div>

                <!-- Service Column -->
                <div>
                    <h4 class="text-white font-bold text-sm mb-4">Layanan</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="#" class="hover:text-white transition-colors">Metode Pembayaran</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Pengiriman</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Kategori</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Program Premium</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">FAQ</a></li>
                    </ul>
                </div>

                <!-- Newsletter & Payment -->
                <div class="col-span-2">
                    <h4 class="text-white font-bold text-sm mb-4">Metode Pembayaran</h4>
                    <div class="flex flex-wrap gap-3">
                        <!-- E-Wallet -->
                        <div class="bg-white rounded-md px-5 py-3 flex items-center justify-center min-w-[90px]">
                            <img src="{{ asset('images/Ovo_Logo.png') }}" alt="OVO" class="h-7 w-auto max-w-full object-contain" onerror="this.parentElement.innerHTML='<span class=\'text-sm text-gray-800 font-bold\'>OVO</span>'">
                        </div>
                        <div class="bg-white rounded-md px-5 py-3 flex items-center justify-center min-w-[90px]">
                            <img src="{{ asset('images/Gopay_Logo.png') }}" alt="GoPay" class="h-7 w-auto max-w-full object-contain" onerror="this.parentElement.innerHTML='<span class=\'text-sm text-gray-800 font-bold\'>GoPay</span>'">
                        </div>
                        <div class="bg-white rounded-md px-5 py-3 flex items-center justify-center min-w-[90px]">
                            <img src="{{ asset('images/Dana_Logo.png') }}" alt="Dana" class="h-7 w-auto max-w-full object-contain" onerror="this.parentElement.innerHTML='<span class=\'text-sm text-gray-800 font-bold\'>Dana</span>'">
                        </div>
                        
                        <!-- QRIS -->
                        <div class="bg-white rounded-md px-5 py-3 flex items-center justify-center min-w-[90px]">
                            <img src="{{ asset('images/Qris_Logo.png') }}" alt="QRIS" class="h-7 w-auto max-w-full object-contain" onerror="this.parentElement.innerHTML='<span class=\'text-sm text-gray-800 font-bold\'>QRIS</span>'">
                        </div>
                        
                        <!-- Bank Transfer -->
                        <div class="bg-white rounded-md px-5 py-3 flex items-center justify-center min-w-[90px]">
                            <img src="{{ asset('images/Bri_Logo.jpg') }}" alt="BRI" class="h-7 w-auto max-w-full object-contain" onerror="this.parentElement.innerHTML='<span class=\'text-sm text-gray-800 font-bold\'>BRI</span>'">
                        </div>
                        <div class="bg-white rounded-md px-5 py-3 flex items-center justify-center min-w-[90px]">
                            <img src="{{ asset('images/Bni_Logo.jpg') }}" alt="BNI" class="h-7 w-auto max-w-full object-contain" onerror="this.parentElement.innerHTML='<span class=\'text-sm text-gray-800 font-bold\'>BNI</span>'">
                        </div>
                        <div class="bg-white rounded-md px-5 py-3 flex items-center justify-center min-w-[90px]">
                            <img src="{{ asset('images/Mandiri_Logo.png') }}" alt="Mandiri" class="h-7 w-auto max-w-full object-contain" onerror="this.parentElement.innerHTML='<span class=\'text-sm text-gray-800 font-bold\'>Mandiri</span>'">
                        </div>
                        <div class="bg-white rounded-md px-5 py-3 flex items-center justify-center min-w-[90px]">
                            <img src="{{ asset('images/Bank_Transfer.png') }}" alt="Bank Transfer" class="h-7 w-auto max-w-full object-contain" onerror="this.parentElement.innerHTML='<span class=\'text-sm text-gray-800 font-bold\'>Transfer</span>'">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="border-t border-white border-opacity-20 pt-6">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-xs">
                    <div class="flex items-center gap-2">
                        <button class="flex items-center gap-2 bg-white bg-opacity-10 px-3 py-2 rounded hover:bg-opacity-20 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="text-xs">Indonesia</span>
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                    </div>

                    <div class="flex gap-6 text-xs">
                        <a href="#" class="hover:text-white transition-colors">Ketentuan Hukum</a>
                        <a href="#" class="hover:text-white transition-colors">Syarat & Ketentuan</a>
                        <a href="#" class="hover:text-white transition-colors">Kebijakan Privasi</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating Chat Button -->
    <a href="https://wa.me/6281234567890" target="_blank" class="fixed bottom-6 right-6 bg-green-600 hover:bg-green-700 text-white p-4 rounded-full shadow-lg transition-all hover:scale-110 z-50">
        <i class="fab fa-whatsapp text-2xl"></i>
    </a>

    @yield('scripts')
</body>
</html>