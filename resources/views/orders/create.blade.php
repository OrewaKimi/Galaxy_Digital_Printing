@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Checkout</h1>

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('orders.store') }}">
        @csrf
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Left Column - Customer Info & Order Details -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Customer Information -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Informasi Pelanggan</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                            <p class="text-gray-800">{{ $customer->name }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <p class="text-gray-800">{{ $customer->email }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Telepon</label>
                            <p class="text-gray-800">{{ $customer->phone }}</p>
                        </div>
                        @if($customer->company_name)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Perusahaan</label>
                            <p class="text-gray-800">{{ $customer->company_name }}</p>
                        </div>
                        @endif
                    </div>

                    @if($customer->address)
                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                        <p class="text-gray-800">{{ $customer->address }}</p>
                    </div>
                    @endif
                </div>

                <!-- Order Items -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Detail Pesanan</h2>
                    
                    <div class="space-y-4">
                        @foreach($cart as $item)
                            <div class="border-b pb-4 last:border-b-0">
                                <div class="flex justify-between items-start mb-2">
                                    <div class="flex-1">
                                        <h3 class="font-semibold text-gray-800">{{ $item['product_name'] }}</h3>
                                        
                                        @if($item['width'] && $item['height'])
                                            <p class="text-sm text-gray-600">
                                                Ukuran: {{ $item['width'] }} cm × {{ $item['height'] }} cm ({{ number_format($item['area'], 2) }} m²)
                                            </p>
                                        @endif
                                        
                                        <p class="text-sm text-gray-600">
                                            Jumlah: {{ $item['quantity'] }} {{ $item['unit'] }}
                                        </p>

                                        @if($item['notes'])
                                            <p class="text-sm text-gray-600">
                                                Catatan: {{ $item['notes'] }}
                                            </p>
                                        @endif
                                    </div>
                                    <div class="text-right ml-4">
                                        <p class="font-bold text-gray-800">
                                            Rp {{ number_format($item['subtotal'], 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Informasi Tambahan</h2>
                    
                    <div class="space-y-4">
                        <!-- Deadline -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Deadline (Opsional)
                            </label>
                            <input 
                                type="date" 
                                name="deadline"
                                min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            >
                            <p class="text-xs text-gray-500 mt-1">Jika tidak diisi, estimasi waktu pengerjaan akan ditentukan oleh admin</p>
                        </div>

                        <!-- Customer Notes -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Catatan Pesanan (Opsional)
                            </label>
                            <textarea 
                                name="customer_notes" 
                                rows="4"
                                placeholder="Tambahkan catatan khusus untuk pesanan ini..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            ></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Ringkasan Pembayaran</h2>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span>
                            <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>PPN (11%)</span>
                            <span>Rp {{ number_format($tax, 0, ',', '.') }}</span>
                        </div>
                        <div class="border-t pt-3 flex justify-between text-xl font-bold text-gray-800">
                            <span>Total</span>
                            <span>Rp {{ number_format($grandTotal, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <!-- Payment Info -->
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                        <h3 class="font-semibold text-blue-800 mb-2 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Informasi Pembayaran
                        </h3>
                        <p class="text-sm text-blue-700">
                            Setelah pesanan dibuat, Anda akan diarahkan ke halaman pembayaran untuk melakukan pembayaran.
                        </p>
                    </div>

                    <!-- Terms -->
                    <div class="mb-6">
                        <label class="flex items-start">
                            <input 
                                type="checkbox" 
                                required
                                class="mt-1 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                            >
                            <span class="ml-2 text-sm text-gray-600">
                                Saya setuju dengan <a href="#" class="text-blue-600 hover:underline">syarat dan ketentuan</a> yang berlaku
                            </span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200"
                    >
                        Buat Pesanan
                    </button>

                    <a 
                        href="{{ route('cart.index') }}" 
                        class="block w-full text-center px-6 py-3 mt-3 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition duration-200"
                    >
                        Kembali ke Keranjang
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection