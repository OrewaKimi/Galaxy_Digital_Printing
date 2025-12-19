@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Pesanan Saya</h1>

    @if($orders->count() > 0)
        <div class="space-y-4">
            @foreach($orders as $order)
                <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition duration-200">
                    <div class="flex flex-col md:flex-row md:items-center justify-between mb-4">
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">{{ $order->order_number }}</h3>
                            <p class="text-sm text-gray-600">{{ $order->order_date->format('d M Y, H:i') }}</p>
                        </div>
                        <div class="mt-2 md:mt-0">
                            <span 
                                class="px-4 py-2 rounded-full text-sm font-semibold inline-block"
                                style="background-color: {{ $order->status->color }}20; color: {{ $order->status->color }}"
                            >
                                {{ $order->status->status_name }}
                            </span>
                        </div>
                    </div>

                    <!-- Order Items Summary -->
                    <div class="mb-4">
                        <p class="text-sm text-gray-600 mb-2">Item Pesanan:</p>
                        <div class="space-y-1">
                            @foreach($order->orderItems->take(3) as $item)
                                <p class="text-sm text-gray-800">
                                    • {{ $item->product->product_name }} 
                                    <span class="text-gray-600">({{ $item->quantity }} {{ $item->unit }})</span>
                                </p>
                            @endforeach
                            @if($order->orderItems->count() > 3)
                                <p class="text-sm text-blue-600">
                                    dan {{ $order->orderItems->count() - 3 }} item lainnya...
                                </p>
                            @endif
                        </div>
                    </div>

                    <!-- Order Info -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-4 text-sm">
                        <div>
                            <p class="text-gray-500">Total</p>
                            <p class="font-bold text-gray-800">{{ $order->formatted_total_price }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Dibayar</p>
                            <p class="font-bold text-green-600">Rp {{ number_format($order->paid_amount, 0, ',', '.') }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Sisa</p>
                            <p class="font-bold text-red-600">{{ $order->formatted_remaining_amount }}</p>
                        </div>
                        <div>
                            <p class="text-gray-500">Status Bayar</p>
                            <p class="font-bold">
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

                    <!-- Actions -->
                    <div class="flex flex-col sm:flex-row gap-2 pt-4 border-t">
                        <a 
                            href="{{ route('orders.show', $order->order_id) }}" 
                            class="flex-1 text-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200"
                        >
                            Lihat Detail
                        </a>
                        
                        @if($order->remaining_amount > 0)
                            <a 
                                href="{{ route('payments.show', $order->order_id) }}" 
                                class="flex-1 text-center px-4 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition duration-200"
                            >
                                Bayar
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $orders->links() }}
        </div>
    @else
        <div class="text-center py-16">
            <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Belum Ada Pesanan</h2>
            <p class="text-gray-600 mb-6">Anda belum memiliki pesanan</p>
            <a 
                href="{{ route('products.index') }}" 
                class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200"
            >
                Mulai Belanja
            </a>
        </div>
    @endif
</div>
@endsection