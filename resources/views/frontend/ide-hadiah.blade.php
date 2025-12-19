@extends('layouts.app')

@section('title', 'Ide Hadiah - Galaxy Digital Printing')

@section('content')
<section class="bg-[#f7f6f0]">
    <div class="container mx-auto px-4 py-12 lg:py-16">
        <div class="grid lg:grid-cols-2 gap-10 items-center">
            <div class="space-y-5">
                <p class="text-sm font-semibold text-[#4a6741] uppercase tracking-wide">Waktunya mikirin hadiah!</p>
                <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 leading-tight">Hadiah 2025 &ndash; inspiratif, berkesan, impresif</h1>
                <p class="text-lg text-gray-700 max-w-2xl">Dari kartu ucapan, ide gift box, hingga dekorasi & packaging musiman &mdash; semua kebutuhan hadiah cetak ada di satu tempat.</p>
                <div class="flex flex-wrap gap-3">
                    <a href="#hadiah-utama" class="inline-flex items-center px-4 py-2.5 rounded-full bg-[#4a6741] text-white text-sm font-semibold hover:bg-[#3a5631] transition-colors">Lihat katalog hadiah</a>
                    <a href="{{ Route::has('contact') ? route('contact') : '#' }}" class="inline-flex items-center px-4 py-2.5 rounded-full border border-gray-300 text-sm font-semibold text-gray-800 hover:border-[#4a6741] hover:text-[#4a6741] transition-colors">Diskusikan kebutuhan</a>
                </div>
                <div class="flex flex-wrap gap-2 pt-1">
                    @foreach ([
                        'Kartu ucapan',
                        'Gift box',
                        'Voucher & kupon',
                        'Packaging',
                        'Merch ringan'
                    ] as $chip)
                        <span class="px-3 py-1.5 rounded-full bg-white border border-gray-200 text-xs font-semibold text-gray-700 shadow-sm">{{ $chip }}</span>
                    @endforeach
                </div>
            </div>
            <div class="relative">
                <div class="aspect-[4/3] rounded-2xl overflow-hidden shadow-md">
                    <img src="{{ asset('images/ide-hadiah-hero.jpg') }}" alt="Inspirasi hadiah" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-[#e8efe3] flex items-center justify-center text-[#4a6741] font-semibold\'>Inspirasi Hadiah</div>'">
                </div>
            </div>
        </div>
    </div>
</section>

<section id="hadiah-utama" class="bg-white">
    <div class="container mx-auto px-4 py-12 lg:py-16 space-y-8">
        <div class="space-y-2">
            <p class="text-sm font-semibold text-[#4a6741] uppercase tracking-wide">Mulai musim hadiah dengan tepat</p>
            <div class="flex items-center justify-between flex-wrap gap-3">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Semua yang kamu butuhkan untuk kampanye hadiah</h2>
                <span class="h-1 w-16 bg-[#4a6741] rounded-full"></span>
            </div>
            <p class="text-sm md:text-base text-gray-600">Pesan cepat dengan kuantitas fleksibel, finishing premium, dan produksi di tim kami sendiri.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @php
                $utama = [
                    [
                        'title' => 'Poster (jumlah kecil)',
                        'desc' => 'Iklan musiman yang mencolok mulai dari 1 pcs',
                        'image' => 'images/ide-hadiah-poster.jpg',
                    ],
                    [
                        'title' => 'Voucher & kartu diskon',
                        'desc' => 'Dorong repeat order dengan voucher cetak eksklusif',
                        'image' => 'images/ide-hadiah-voucher.jpg',
                    ],
                    [
                        'title' => 'Kartu Natal bisnis',
                        'desc' => 'Ucapan personal dengan kesan premium untuk klien',
                        'image' => 'images/ide-hadiah-kartu.jpg',
                    ],
                ];
            @endphp

            @foreach ($utama as $item)
                <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-lg transition-shadow group">
                    <div class="aspect-[16/10] overflow-hidden bg-gray-100">
                        <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover group-hover:scale-[1.03] transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>{{ $item['title'] }}</div>'">
                    </div>
                    <div class="p-5 bg-[#fdfbf7] border-t border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $item['title'] }}</h3>
                        <p class="text-sm text-gray-600">{{ $item['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-white">
    <div class="container mx-auto px-4 pb-12 lg:pb-16">
        <div class="grid lg:grid-cols-2 gap-6 items-stretch overflow-hidden rounded-2xl shadow-sm border border-gray-200">
            <div class="bg-gray-100">
                <div class="aspect-[16/9] h-full">
                    <img src="{{ asset('images/ide-hadiah-deal.jpg') }}" alt="Deal finishing" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-500 font-semibold\'>Finishing Premium</div>'">
                </div>
            </div>
            <div class="bg-[#4a6741] text-white p-8 flex flex-col justify-center space-y-4">
                <p class="text-sm font-semibold uppercase tracking-wide">Promo musiman</p>
                <h3 class="text-2xl md:text-3xl font-bold leading-tight">Finishing premium diskon 20% untuk kartu ucapan</h3>
                <p class="text-sm md:text-base text-[#e7f1e3]">Foil, emboss, atau varnish elegan yang bikin kartu hadiah terlihat lebih istimewa tanpa kode promo tambahan.</p>
                <div class="flex flex-wrap gap-3">
                    <a href="#hadiah-utama" class="inline-flex items-center px-4 py-2.5 rounded-full bg-white text-[#2f3e2b] font-semibold text-sm hover:bg-[#e6e9e3] transition-colors">Pesan kartu sekarang</a>
                    <span class="inline-flex items-center text-sm font-semibold text-[#d8e5d5]">Berlaku hingga 31 Des 2025</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white">
    <div class="container mx-auto px-4 pb-12 lg:pb-16 space-y-8">
        <div class="space-y-2">
            <p class="text-sm font-semibold text-[#4a6741] uppercase tracking-wide">Ide untuk pelanggan & partner</p>
            <div class="flex items-center justify-between flex-wrap gap-3">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Hadiah siap pakai</h2>
                <span class="h-1 w-16 bg-[#4a6741] rounded-full"></span>
            </div>
            <p class="text-sm md:text-base text-gray-600">Mulai dari souvenir ringan sampai paket eksklusif. Pilih, personalisasi, kirim.</p>
        </div>

        @php
            $gifts = [
                ['title' => 'Clip pohon mini', 'image' => 'images/ide-hadiah-tree.jpg'],
                ['title' => 'Kaos kaki Natal', 'image' => 'images/ide-hadiah-socks.jpg'],
                ['title' => 'Kaleidoskop Natal', 'image' => 'images/ide-hadiah-kaleido.jpg'],
                ['title' => 'Ornamen scratch-off', 'image' => 'images/ide-hadiah-ornamen.jpg'],
                ['title' => 'Set stiker meriah', 'image' => 'images/ide-hadiah-stiker.jpg'],
            ];
        @endphp

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach ($gifts as $gift)
                <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-lg transition-shadow group">
                    <div class="aspect-[4/5] bg-gray-100 overflow-hidden">
                        <img src="{{ asset($gift['image']) }}" alt="{{ $gift['title'] }}" class="w-full h-full object-cover group-hover:scale-[1.05] transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>{{ $gift['title'] }}</div>'">
                    </div>
                    <div class="p-4">
                        <p class="text-sm font-semibold text-gray-900">{{ $gift['title'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-white pb-16">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-6 items-center rounded-2xl overflow-hidden shadow-sm border border-gray-200">
            <div class="bg-[#f3f0e8] p-8 space-y-4 h-full flex flex-col justify-center">
                <h3 class="text-2xl font-bold text-gray-900">Desain hadiahmu online, mudah</h3>
                <p class="text-base text-gray-700 max-w-xl">Ratusan template siap pakai, editor online sederhana, dan bantuan tim desain kami jika kamu butuh sentuhan ekstra.</p>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ Route::has('kartu-ucapan') ? route('kartu-ucapan') : '#' }}" class="inline-flex items-center px-4 py-2.5 rounded-full bg-[#4a6741] text-white text-sm font-semibold hover:bg-[#3a5631] transition-colors">Coba editor online</a>
                    <a href="{{ Route::has('contact') ? route('contact') : '#' }}" class="inline-flex items-center px-4 py-2.5 rounded-full border border-gray-300 text-sm font-semibold text-gray-800 hover:border-[#4a6741] hover:text-[#4a6741] transition-colors">Butuh bantuan desain?</a>
                </div>
            </div>
            <div class="bg-gray-100">
                <div class="aspect-[16/9] h-full">
                    <img src="{{ asset('images/ide-hadiah-editor.jpg') }}" alt="Editor online" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-500 font-semibold\'>Editor Online</div>'">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white">
    <div class="container mx-auto px-4 pb-12 lg:pb-16 space-y-10">
        <div class="space-y-2">
            <p class="text-sm font-semibold text-[#4a6741] uppercase tracking-wide">Christmas gifts for staff members</p>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Terima kasih untuk tim, tutup tahun dengan hadiah</h2>
            <p class="text-sm md:text-base text-gray-600 max-w-3xl">Pilihan gift siap cetak untuk karyawan: praktis, personal, dan bisa disesuaikan dengan brandmu.</p>
        </div>

        @php
            $staffGifts = [
                ['title' => 'Kalender meja', 'image' => 'images/ide-hadiah-kalender.jpg'],
                ['title' => 'Sweater & apparel', 'image' => 'images/ide-hadiah-sweater.jpg'],
                ['title' => 'Notebook gabus', 'image' => 'images/ide-hadiah-notebook.jpg'],
                ['title' => 'Set pena & penggaris', 'image' => 'images/ide-hadiah-stationery.jpg'],
                ['title' => 'Botol & gelas kaca', 'image' => 'images/ide-hadiah-botol.jpg'],
            ];
        @endphp

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
            @foreach ($staffGifts as $gift)
                <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-lg transition-shadow group">
                    <div class="aspect-[4/5] bg-gray-100 overflow-hidden">
                        <img src="{{ asset($gift['image']) }}" alt="{{ $gift['title'] }}" class="w-full h-full object-cover group-hover:scale-[1.04] transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>{{ $gift['title'] }}</div>'">
                    </div>
                    <div class="p-4">
                        <p class="text-sm font-semibold text-gray-900">{{ $gift['title'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="border-b-4 border-gray-900 w-16"></div>
    </div>
</section>

<section class="bg-white pb-12 lg:pb-16">
    <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-6 items-stretch rounded-2xl overflow-hidden shadow-sm border border-gray-200">
            <div class="bg-[#e8e1d3] p-8 space-y-4 flex flex-col justify-center">
                <h3 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight">Waktu cozy: mug & tumbler</h3>
                <p class="text-sm md:text-base text-gray-700 max-w-xl">Serahkan mug bertema musim dingin atau tumbler kaca berlogo untuk acara kantor akhir tahun. Mulai dari 10 pcs, siap cetak cepat.</p>
                <div class="flex flex-wrap gap-3">
                    <a href="#hadiah-utama" class="inline-flex items-center px-4 py-2.5 rounded-full bg-[#4a6741] text-white text-sm font-semibold hover:bg-[#3a5631] transition-colors">Lihat pilihan mug</a>
                    <a href="{{ Route::has('contact') ? route('contact') : '#' }}" class="inline-flex items-center px-4 py-2.5 rounded-full border border-gray-300 text-sm font-semibold text-gray-800 hover:border-[#4a6741] hover:text-[#4a6741] transition-colors">Butuh rekomendasi?</a>
                </div>
            </div>
            <div class="bg-gray-100">
                <div class="aspect-[16/9] h-full">
                    <img src="{{ asset('images/ide-hadiah-mug.jpg') }}" alt="Mug & tumbler" class="w-full h-full object-cover" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-500 font-semibold\'>Mug & Tumbler</div>'">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-white">
    <div class="container mx-auto px-4 pb-12 lg:pb-16 space-y-8">
        <div class="space-y-2">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Must-haves untuk pesta Navidad</h2>
            <p class="text-xs md:text-sm font-semibold text-[#4a6741] uppercase tracking-wide">Dari undangan hingga dekorasi meja: Natal ada di mana-mana</p>
            <p class="text-sm md:text-base text-gray-600">Semua yang kamu butuh untuk acara Natal sempurna & berkesan.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @php
                $partyItems = [
                    [
                        'title' => 'Kartu undangan',
                        'desc' => 'Tunjukkan apresiasi dengan undangan personal',
                        'image' => 'images/ide-hadiah-invitation.jpg',
                    ],
                    [
                        'title' => 'Tiket masuk',
                        'desc' => 'Semua info satu kartu – cocok juga untuk undangan',
                        'image' => 'images/ide-hadiah-ticket.jpg',
                    ],
                    [
                        'title' => 'Table talkers',
                        'desc' => 'Dekorasi meja bermerek atau menu minuman yang menarik',
                        'image' => 'images/ide-hadiah-talker.jpg',
                    ],
                ];
            @endphp

            @foreach ($partyItems as $item)
                <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-lg transition-shadow group">
                    <div class="aspect-[4/3] overflow-hidden bg-gray-100">
                        <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover group-hover:scale-[1.03] transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>{{ $item['title'] }}</div>'">
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-1 text-base">{{ $item['title'] }}</h3>
                        <p class="text-sm text-gray-600">{{ $item['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="border-b-4 border-gray-900 w-16"></div>
    </div>
</section>

<section class="bg-white pb-12 lg:pb-16">
    <div class="container mx-auto px-4 space-y-8">
        <div class="space-y-2">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">Kemasan Natal</h2>
            <p class="text-sm md:text-base text-gray-600">Ingin mengirim hadiah Natal atau kado dan butuh packaging cantik? Kami punya solusi tepat untuk kamu:</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $packaging = [
                    [
                        'title' => 'Kemasan',
                        'desc' => 'Stylish dan aman – bungkus hadiah untuk pelanggan',
                        'image' => 'images/ide-hadiah-packaging.jpg',
                    ],
                    [
                        'title' => 'Kertas kado',
                        'desc' => 'Kertas kado yang dapat disesuaikan akan membuat kamu yakin pelanggan mendapat perhatian penuh',
                        'image' => 'images/ide-hadiah-wrapping.jpg',
                    ],
                    [
                        'title' => 'Kertas sutra di gulungan',
                        'desc' => 'Padding, pengemasan aman, dan pesan padu dengan hati',
                        'image' => 'images/ide-hadiah-silk.jpg',
                    ],
                    [
                        'title' => 'Kemasan pengiriman kardus bergelombang',
                        'desc' => 'Kemasan pengiriman khusus untuk hadiah berat',
                        'image' => 'images/ide-hadiah-shipping.jpg',
                    ],
                ];
            @endphp

            @foreach ($packaging as $item)
                <div class="bg-white rounded-xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-lg transition-shadow group">
                    <div class="aspect-[3/4] overflow-hidden bg-gray-100">
                        <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover group-hover:scale-[1.03] transition-transform duration-300" onerror="this.parentElement.innerHTML='<div class=\'w-full h-full bg-gray-200 flex items-center justify-center text-gray-400 text-xs\'>{{ $item['title'] }}</div>'">
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 mb-1 text-base">{{ $item['title'] }}</h3>
                        <p class="text-sm text-gray-600">{{ $item['desc'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection

