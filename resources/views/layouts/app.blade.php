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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
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
    <div class="bg-green-800 text-white py-2">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center text-sm">
                <div class="flex gap-6">
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                        </svg>
                        Pengiriman standar gratis
                    </span>
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        5 tahun pengalaman
                    </span>
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Kualitas terjamin
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center">
                    <div class="bg-green-800 text-white p-2 rounded-full mr-3">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                        </svg>
                    </div>
                    <span class="text-xl font-bold text-gray-800">Galaxy Digital Printing</span>
                </a>

                <!-- Search Bar -->
                <div class="hidden md:flex flex-1 max-w-2xl mx-8">
                    <div class="relative w-full">
                        <input type="text" placeholder="Cari produk..." class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-blue-600 text-white p-2 rounded">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Right Menu -->
                <div class="flex items-center gap-4">
                    @auth
                        <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-blue-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="hidden md:inline">{{ Auth::user()->full_name ?? 'Akun' }}</span>
                        </a>
                    @else
                        <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-blue-600">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="hidden md:inline">Login</span>
                        </a>
                    @endauth

                    <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-blue-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                        <span class="hidden md:inline">Favorit</span>
                    </a>

                    <a href="#" class="flex items-center gap-2 text-gray-700 hover:text-blue-600 relative">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        <span class="hidden md:inline">Keranjang</span>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">0</span>
                    </a>
                </div>
            </div>

            <!-- Category Menu -->
            <div class="border-t">
                <div class="flex justify-center flex-wrap items-center gap-6 py-3 text-center">
                    <a href="#" class="text-sm text-gray-700 hover:text-blue-600 font-medium">Semua produk</a>
                    <a href="#" class="text-sm text-gray-700 hover:text-blue-600">Brosur</a>
                    <a href="#" class="text-sm text-gray-700 hover:text-blue-600">Flyers & Leaflet</a>
                    <a href="#" class="text-sm text-gray-700 hover:text-blue-600">Poster</a>
                    <a href="#" class="text-sm text-gray-700 hover:text-blue-600">Spanduk Roll</a>
                    <a href="#" class="text-sm text-gray-700 hover:text-blue-600">Kartu Bisnis & Kartu</a>
                    <a href="#" class="text-sm text-gray-700 hover:text-blue-600">Surat & Kop Surat</a>
                    <a href="#" class="text-sm text-gray-700 hover:text-blue-600">Stiker</a>
                    <a href="#" class="text-sm text-gray-700 hover:text-blue-600">Item Promosi</a>
                    <a href="#" class="text-sm text-gray-700 hover:text-blue-600">Layanan</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 pt-12 pb-6">
        <div class="container mx-auto px-4">
            <!-- Footer Top -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <!-- About Column -->
                <div>
                    <h4 class="text-white font-bold text-lg mb-4">Tentang Kami</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition-colors">Perusahaan</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Info Pers</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Jobs & Karir</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Perlindungan Lingkungan</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Kontak</a></li>
                    </ul>
                </div>

                <!-- Service Column -->
                <div>
                    <h4 class="text-white font-bold text-lg mb-4">Layanan</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition-colors">Opsi Pembayaran</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Pengiriman</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Komplain</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Program Premium</a></li>
                    </ul>
                </div>

                <!-- Support Column -->
                <div>
                    <h4 class="text-white font-bold text-lg mb-4">Dukungan</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Template</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Tutorial</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Hubungi Kami</a></li>
                    </ul>
                </div>

                <!-- Newsletter Column -->
                <div>
                    <h4 class="text-white font-bold text-lg mb-4">Newsletter</h4>
                    <p class="text-sm mb-4">Berlangganan newsletter kami & dapatkan diskon 15%</p>
                    <form class="flex gap-2">
                        <input type="email" placeholder="Email Anda" class="flex-1 px-3 py-2 rounded bg-gray-800 text-white border border-gray-700 focus:outline-none focus:border-blue-500 text-sm">
                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold px-4 py-2 rounded transition-colors">
                            →
                        </button>
                    </form>

                    <!-- Payment Methods -->
                    <div class="mt-6">
                        <h5 class="text-white font-semibold text-sm mb-3">Metode Pembayaran</h5>
                        <div class="flex flex-wrap gap-2">
                            <div class="bg-white rounded px-2 py-1">
                                <span class="text-xs font-bold text-blue-600">VISA</span>
                            </div>
                            <div class="bg-white rounded px-2 py-1">
                                <span class="text-xs font-bold text-red-600">Mastercard</span>
                            </div>
                            <div class="bg-white rounded px-2 py-1">
                                <span class="text-xs font-bold text-blue-800">AMEX</span>
                            </div>
                            <div class="bg-white rounded px-2 py-1 flex items-center">
                                <span class="text-xs font-bold text-blue-600">GoPay</span>
                            </div>
                            <div class="bg-white rounded px-2 py-1 flex items-center">
                                <span class="text-xs font-bold text-green-600">OVO</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="border-t border-gray-800 pt-6">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-sm">
                    <div class="flex items-center gap-2">
                        <button class="flex items-center gap-2 bg-gray-800 px-3 py-2 rounded hover:bg-gray-700 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Indonesia
                        </button>
                    </div>

                    <div class="text-center">
                        <p>&copy; {{ date('Y') }} Galaxy Digital Printing. All rights reserved.</p>
                    </div>

                    <div class="flex gap-4">
                        <a href="#" class="hover:text-white transition-colors">Legal Notice</a>
                        <a href="#" class="hover:text-white transition-colors">GTC</a>
                        <a href="#" class="hover:text-white transition-colors">Privacy Notice</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating Chat Button -->
    <a href="https://wa.me/6281234567890" target="_blank" class="fixed bottom-6 right-6 bg-green-600 hover:bg-green-700 text-white p-4 rounded-full shadow-lg transition-all hover:scale-110 z-50">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
        </svg>
    </a>

    @yield('scripts')
</body>
</html>