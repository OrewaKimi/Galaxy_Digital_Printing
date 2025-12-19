@extends('layouts.app')

@section('title', 'Detail Pesanan')

@section('content')
<div class="container mx-auto px-4 py-8">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Detail Pesanan</h1>
            <p class="text-gray-600">{{ $order->order_number }}</p>
        </div>
        <a href="{{ route('orders.index') }}" class="text-blue-600 hover:underline">
            ← Kembali ke Daftar Pesanan
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Left Column -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Order Status -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-xl font-bold text-gray-800">Status Pesanan</h2>
                    <span 
                        class="px-4 py-2 rounded-full text-sm font-semibold"
                        style="background-color: {{ $order->status->color }}20; color: {{ $order->status->color }}"
                    >
                        {{ $order->status->status_name }}
                    </span>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                    <div>
                        <p class="text-gray-500 mb-1">Tanggal Pesan</p>
                        <p class="font-semibold">{{ $order->order_date->format('d M Y') }}</p>
                    </div>
                    @if($order->deadline)
                    <div>
                        <p class="text-gray-500 mb-1">Deadline</p>
                        <p class="font-semibold">{{ $order->deadline->format('d M Y') }}</p>
                    </div>
                    @endif
                    @if($order->completed_date)
                    <div>
                        <p class="text-gray-500 mb-1">Selesai</p>
                        <p class="font-semibold">{{ $order->completed_date->format('d M Y') }}</p>
                    </div>
                    @endif
                    <div>
                        <p class="text-gray-500 mb-1">Status Bayar</p>
                        <p class="font-semibold">
                            @if($order->payment_status == 'paid')
                                <span class="text-green-600">Lunas</span>
                            @elseif($order->payment_status == 'partial')
                                <span class="text-yellow-600">Sebagian</span>
                            @else
                                <span class="text-red-600">Belum Bayar</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <!-- Order Items -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Item Pesanan</h2>
                
                <div class="space-y-4">
                    @foreach($order->orderItems as $item)
                        <div class="border-b pb-4 last:border-b-0">
                            <div class="flex justify-between items-start">
                                <div class="flex-1">
                                    <h3 class="font-semibold text-gray-800">{{ $item->product->product_name }}</h3>
                                    
                                    @if($item->width && $item->height)
                                        <p class="text-sm text-gray-600">
                                            Ukuran: {{ $item->width }} cm × {{ $item->height }} cm
                                        </p>
                                        <p class="text-sm text-gray-600">
                                            Luas: {{ number_format($item->area, 2) }} m²
                                        </p>
                                    @endif
                                    
                                    <p class="text-sm text-gray-600">
                                        Jumlah: {{ $item->quantity }} {{ $item->unit }}
                                    </p>

                                    @if($item->notes)
                                        <p class="text-sm text-gray-600 mt-1">
                                            <span class="font-medium">Catatan:</span> {{ $item->notes }}
                                        </p>
                                    @endif

                                    @if($item->specifications)
                                        <p class="text-sm text-gray-600 mt-1">
                                            <span class="font-medium">Spesifikasi:</span> {{ $item->specifications }}
                                        </p>
                                    @endif
                                </div>
                                <div class="text-right ml-4">
                                    <p class="text-sm text-gray-500">@ {{ $item->formatted_subtotal }}</p>
                                    <p class="font-bold text-gray-800">
                                        Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Upload Design -->
            @if($order->status->status_code == 'PENDING' || $order->status->status_code == 'PAID')
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Upload File Desain</h2>
                
                <form method="POST" action="{{ route('orders.upload-design', $order->order_id) }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            File Desain (PDF, JPG, PNG, AI, PSD, CDR - Max 10MB)
                        </label>
                        <input 
                            type="file" 
                            name="design_file" 
                            accept=".pdf,.jpg,.jpeg,.png,.ai,.psd,.cdr"
                            required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        >
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Catatan (Opsional)
                        </label>
                        <textarea 
                            name="notes" 
                            rows="3"
                            placeholder="Tambahkan catatan untuk file desain ini..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        ></textarea>
                    </div>

                    <button 
                        type="submit" 
                        class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200"
                    >
                        Upload Desain
                    </button>
                </form>
            </div>
            @endif

            <!-- Design Files -->
            @if($order->designFiles->count() > 0)
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">File Desain yang Diupload</h2>
                
                <div class="space-y-3">
                    @foreach($order->designFiles as $file)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center">
                                <svg class="w-8 h-8 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                <div>
                                    <p class="font-semibold text-gray-800">{{ $file->file_name }}</p>
                                    <p class="text-sm text-gray-600">
                                        {{ $file->formatted_file_size }} • {{ $file->uploaded_date->format('d M Y H:i') }}
                                    </p>
                                    @if($file->notes)
                                        <p class="text-sm text-gray-600">{{ $file->notes }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="flex items-center space-x-2">
                                @if($file->is_approved)
                                    <span class="px-3 py-1 bg-green-100 text-green-700 text-sm font-semibold rounded">
                                        Disetujui
                                    </span>
                                @else
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-sm font-semibold rounded">
                                        Menunggu
                                    </span>
                                @endif
                                <a 
                                    href="{{ Storage::url($file->file_path) }}" 
                                    target="_blank"
                                    class="text-blue-600 hover:text-blue-800"
                                >
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Payment History -->
            @if($order->payments->count() > 0)
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Riwayat Pembayaran</h2>
                
                <div class="space-y-3">
                    @foreach($order->payments as $payment)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div>
                                <p class="font-semibold text-gray-800">{{ $payment->payment_number }}</p>
                                <p class="text-sm text-gray-600">
                                    {{ $payment->payment_date->format('d M Y H:i') }} • {{ $payment->method_name }}
                                </p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-gray-800">{{ $payment->formatted_amount }}</p>
                                <span class="px-2 py-1 text-xs font-semibold rounded"
                                    style="background-color: {{ $payment->status_badge == 'success' ? '#DEF7EC' : ($payment->status_badge == 'warning' ? '#FEF3C7' : '#FEE2E2') }}; 
                                           color: {{ $payment->status_badge == 'success' ? '#03543F' : ($payment->status_badge == 'warning' ? '#92400E' : '#991B1B') }}">
                                    {{ ucfirst($payment->payment_status) }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <!-- Right Column - Summary & Actions -->
        <div class="lg:col-span-1">
            <!-- Payment Summary -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6 sticky top-4">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Ringkasan Pembayaran</h2>
                
                <div class="space-y-3 mb-6">
                    <div class="flex justify-between text-gray-600">
                        <span>Subtotal</span>
                        <span>{{ $order->formatted_total_price }}</span>
                    </div>
                    @if($order->discount_amount > 0)
                    <div class="flex justify-between text-gray-600">
                        <span>Diskon ({{ $order->discount_percentage }}%)</span>
                        <span>- Rp {{ number_format($order->discount_amount, 0, ',', '.') }}</span>
                    </div>
                    @endif
                    <div class="flex justify-between text-gray-600">
                        <span>PPN ({{ $order->tax_percentage }}%)</span>
                        <span>Rp {{ number_format($order->tax_amount, 0, ',', '.') }}</span>
                    </div>
                    <div class="border-t pt-3 flex justify-between text-lg font-bold text-gray-800">
                        <span>Total</span>
                        <span>{{ $order->formatted_total_price }}</span>
                    </div>
                    <div class="flex justify-between text-green-600">
                        <span>Dibayar</span>
                        <span>Rp {{ number_format($order->paid_amount, 0, ',', '.') }}</span>
                    </div>
                    <div class="border-t pt-3 flex justify-between text-lg font-bold text-red-600">
                        <span>Sisa</span>
                        <span>{{ $order->formatted_remaining_amount }}</span>
                    </div>
                </div>

                <!-- Payment Button -->
                @if($order->remaining_amount > 0)
                    <a 
                        href="{{ route('payments.show', $order->order_id) }}" 
                        class="block w-full text-center px-6 py-3 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-200"
                    >
                        Bayar Sekarang
                    </a>
                @else
                    <div class="bg-green-50 border border-green-200 rounded-lg p-4 text-center">
                        <svg class="w-12 h-12 text-green-600 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <p class="font-semibold text-green-800">Pembayaran Lunas</p>
                    </div>
                @endif

                @if($order->customer_notes)
                <div class="mt-4 pt-4 border-t">
                    <p class="text-sm font-semibold text-gray-700 mb-1">Catatan Pesanan:</p>
                    <p class="text-sm text-gray-600">{{ $order->customer_notes }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection