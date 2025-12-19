@extends('layouts.app')

@section('title', 'Pembayaran')

@section('content')
<div class="container mx-auto px-4 py-8">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            {{ session('error') }}
        </div>
    @endif

    <div class="mb-6">
        <a href="{{ route('orders.show', $order->order_id) }}" class="text-blue-600 hover:underline">
            ← Kembali ke Detail Pesanan
        </a>
    </div>

    <h1 class="text-3xl font-bold text-gray-800 mb-6">Pembayaran Pesanan</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Payment Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-6">Informasi Pembayaran</h2>

                <form method="POST" action="{{ route('payments.store', $order->order_id) }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Payment Type -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tipe Pembayaran <span class="text-red-500">*</span>
                        </label>
                        <select 
                            name="payment_type_id" 
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >
                            <option value="">Pilih Tipe Pembayaran</option>
                            @foreach($paymentTypes as $type)
                                <option value="{{ $type->payment_type_id }}">
                                    {{ $type->type_name }}
                                    @if($type->minimum_percentage || $type->maximum_percentage)
                                        ({{ $type->minimum_percentage }}% - {{ $type->maximum_percentage }}%)
                                    @endif
                                </option>
                            @endforeach
                        </select>
                        <p class="text-xs text-gray-500 mt-1">Pilih tipe pembayaran sesuai kebutuhan Anda</p>
                    </div>

                    <!-- Amount -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Jumlah Pembayaran <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-3 top-2 text-gray-500">Rp</span>
                            <input 
                                type="number" 
                                name="amount" 
                                min="1"
                                max="{{ $order->remaining_amount }}"
                                placeholder="0"
                                required
                                class="w-full pl-12 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            >
                        </div>
                        <p class="text-xs text-gray-500 mt-1">
                            Maksimal: Rp {{ number_format($order->remaining_amount, 0, ',', '.') }}
                        </p>
                    </div>

                    <!-- Payment Method -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Metode Pembayaran <span class="text-red-500">*</span>
                        </label>
                        <select 
                            name="payment_method" 
                            required
                            id="payment_method"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >
                            <option value="">Pilih Metode Pembayaran</option>
                            <option value="transfer">Transfer Bank</option>
                            <option value="cash">Tunai</option>
                            <option value="e-wallet">E-Wallet</option>
                            <option value="credit_card">Kartu Kredit</option>
                            <option value="debit_card">Kartu Debit</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>

                    <!-- Bank Details (Show if transfer selected) -->
                    <div id="bank_details" class="hidden space-y-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Bank
                            </label>
                            <input 
                                type="text" 
                                name="bank_name" 
                                placeholder="Contoh: BCA, Mandiri, BNI"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nomor Rekening
                            </label>
                            <input 
                                type="text" 
                                name="account_number" 
                                placeholder="1234567890"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Pemilik Rekening
                            </label>
                            <input 
                                type="text" 
                                name="account_name" 
                                placeholder="Nama sesuai rekening"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            >
                        </div>
                    </div>

                    <!-- Payment Proof -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Bukti Pembayaran (JPG, PNG, PDF - Max 5MB)
                        </label>
                        <input 
                            type="file" 
                            name="payment_proof" 
                            accept=".jpg,.jpeg,.png,.pdf"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >
                        <p class="text-xs text-gray-500 mt-1">Upload bukti transfer atau pembayaran</p>
                    </div>

                    <!-- Notes -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Catatan (Opsional)
                        </label>
                        <textarea 
                            name="notes" 
                            rows="3"
                            placeholder="Tambahkan catatan untuk pembayaran ini..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        ></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button 
                        type="submit" 
                        class="w-full px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-200"
                    >
                        Kirim Pembayaran
                    </button>
                </form>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Ringkasan Pesanan</h2>
                
                <div class="mb-4">
                    <p class="text-sm text-gray-600">Nomor Pesanan</p>
                    <p class="font-semibold text-gray-800">{{ $order->order_number }}</p>
                </div>

                <div class="space-y-3 mb-6">
                    <div class="flex justify-between text-gray-600">
                        <span>Total Pesanan</span>
                        <span>{{ $order->formatted_total_price }}</span>
                    </div>
                    <div class="flex justify-between text-green-600">
                        <span>Sudah Dibayar</span>
                        <span>Rp {{ number_format($order->paid_amount, 0, ',', '.') }}</span>
                    </div>
                    <div class="border-t pt-3 flex justify-between text-lg font-bold text-red-600">
                        <span>Sisa Tagihan</span>
                        <span>{{ $order->formatted_remaining_amount }}</span>
                    </div>
                </div>

                <!-- Bank Account Info -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <h3 class="font-semibold text-blue-800 mb-3">Informasi Rekening Tujuan</h3>
                    <div class="space-y-2 text-sm">
                        <div>
                            <p class="text-blue-700 font-medium">Bank BCA</p>
                            <p class="text-blue-900 font-bold">1234567890</p>
                            <p class="text-blue-700">a.n. PT Printing Shop</p>
                        </div>
                        <div class="border-t border-blue-200 pt-2">
                            <p class="text-blue-700 font-medium">Bank Mandiri</p>
                            <p class="text-blue-900 font-bold">9876543210</p>
                            <p class="text-blue-700">a.n. PT Printing Shop</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('payment_method').addEventListener('change', function() {
    const bankDetails = document.getElementById('bank_details');
    if (this.value === 'transfer') {
        bankDetails.classList.remove('hidden');
    } else {
        bankDetails.classList.add('hidden');
    }
});
</script>
@endpush
@endsection