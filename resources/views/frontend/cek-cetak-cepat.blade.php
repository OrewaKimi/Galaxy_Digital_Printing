@extends('layouts.app')

@section('title', 'Cek Cetak Cepat berbasis AI - Galaxy Digital Printing')

@section('content')
<!-- Hero Header -->
<section class="bg-gradient-to-b from-[#4a6741] to-[#3a5631] text-white py-16 lg:py-24">
    <div class="container mx-auto px-4 text-center space-y-4">
        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <svg class="w-12 h-12" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="20" cy="20" r="20" fill="currentColor" opacity="0.1"/>
                <path d="M20 8L28 12V20L20 24L12 20V12L20 8Z" stroke="white" stroke-width="1.5" fill="none"/>
            </svg>
        </div>

        <!-- Main Title with Yellow Accent -->
        <h1 class="text-4xl lg:text-5xl font-bold space-x-2">
            <span>Cek Cetak</span>
            <span class="text-yellow-400">Cepat</span>
        </h1>

        <!-- Subtitle with Lightning Icon -->
        <div class="flex items-center justify-center gap-2 text-lg lg:text-xl text-gray-100">
            <span>⚡</span>
            <span>Pemeriksaan Data Cetak dengan AI: Untuk Hasil Cetak Sempurna</span>
        </div>

        <!-- Description -->
        <p class="text-gray-200 max-w-3xl mx-auto text-base lg:text-lg leading-relaxed pt-4">
            Cepat, andal dan profesional – itulah cara alat AI kami memeriksa data cetak Anda. Format, bleed, warna, font dan lainnya diperiksa untuk memberikan Anda feedback dengan cepat apakah data tersebut siap untuk dicetak.
        </p>
    </div>
</section>

<!-- Privacy Notice -->
<section class="bg-white py-8">
    <div class="container mx-auto px-4">
        <p class="text-center text-gray-700 text-sm leading-relaxed max-w-4xl mx-auto">
            Dengan mengunggah, Anda mengonfirmasi bahwa Anda berwenang untuk mengirimkan data cetak, yang mungkin juga merupakan data pribadi, kepada kami. File diproses secara eksklusif untuk memeriksa printability. Mereka tidak digunakan untuk tujuan pelatihan AI. Kebijakan privasi kami berlaku.
        </p>
    </div>
</section>

<!-- Upload Section -->
<section class="bg-gray-50 py-16 lg:py-24">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto">
            <!-- Upload Box -->
            <div class="border-2 border-dashed border-gray-300 rounded-lg p-12 bg-white text-center hover:border-[#4a6741] hover:bg-gray-50 transition-all">
                <!-- Cloud Icon -->
                <div class="flex justify-center mb-6">
                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"></path>
                    </svg>
                </div>

                <!-- Text -->
                <h2 class="text-2xl font-bold text-gray-900 mb-2">
                    Unggah File Desain Anda
                </h2>
                <p class="text-gray-600 mb-6">
                    Drag and drop file Anda atau klik untuk browse
                </p>

                <!-- Browse Button -->
                <button class="bg-[#4a6741] hover:bg-[#3a5631] text-white font-semibold px-8 py-3 rounded transition-colors mb-6">
                    Browse Files
                </button>

                <!-- Supported Formats -->
                <p class="text-gray-500 text-sm">
                    Format didukung: PDF, JPEG, PNG, TIFF
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Features Section (Optional) -->
<section class="bg-white py-12 lg:py-16">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl lg:text-3xl font-bold text-gray-900 text-center mb-12">
            Apa yang kami periksa
        </h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Validasi File PDF -->
            <div class="bg-gray-50 rounded-lg p-6 border border-gray-200 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-center w-12 h-12 bg-[#4a6741] text-white rounded-lg mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Validasi File PDF</h3>
                <p class="text-sm text-gray-600">Cek ukuran, bleed, margin aman</p>
            </div>

            <!-- Deteksi Resolusi Gambar -->
            <div class="bg-gray-50 rounded-lg p-6 border border-gray-200 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-center w-12 h-12 bg-[#4a6741] text-white rounded-lg mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Deteksi Resolusi</h3>
                <p class="text-sm text-gray-600">Peringatan jika kurang dari 300 dpi</p>
            </div>

            <!-- Konversi Warna CMYK -->
            <div class="bg-gray-50 rounded-lg p-6 border border-gray-200 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-center w-12 h-12 bg-[#4a6741] text-white rounded-lg mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Konversi CMYK</h3>
                <p class="text-sm text-gray-600">Rekomendasi profil warna cetak</p>
            </div>

            <!-- Ringkasan Kelayakan -->
            <div class="bg-gray-50 rounded-lg p-6 border border-gray-200 hover:shadow-md transition-shadow">
                <div class="flex items-center justify-center w-12 h-12 bg-[#4a6741] text-white rounded-lg mb-4">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                    </svg>
                </div>
                <h3 class="font-bold text-gray-900 mb-2">Ringkasan Kelayakan</h3>
                <p class="text-sm text-gray-600">Checklist siap cetak otomatis</p>
            </div>
        </div>
    </div>
</section>

<!-- Footer Links -->
<section class="bg-gray-100 py-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-center gap-8">
            <a href="#" class="text-gray-700 hover:text-[#4a6741] text-sm font-medium">Kebijakan Privasi</a>
            <a href="#" class="text-gray-700 hover:text-[#4a6741] text-sm font-medium">Syarat & Ketentuan</a>
            <a href="#" class="text-gray-700 hover:text-[#4a6741] text-sm font-medium">Imprint</a>
        </div>
    </div>
</section>

@endsection
