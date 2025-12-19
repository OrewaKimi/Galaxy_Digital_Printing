@extends('layouts.app')

@section('title', 'Keranjang Belanja')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Keranjang Belanja</h1>

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

    @if(count($cart) > 0)
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Cart Items -->
            <div class="lg:col-span-2 space-y-4">
                @foreach($cart as $item)
                    <div class="bg-white rounded-lg shadow-md p-6">
                        <div class="flex flex-col md:flex-row md:items-center justify-between">
                            <!-- Product Info -->
                            <div class="flex-1 mb-4 md:mb-0">
                                <h3 class="text-lg font-bold text-gray-800 mb-2">
                                    {{ $item['product_name'] }}
                                </h3>
                                
                                @if($item['width'] && $item['height'])
                                    <p class="text-sm text-gray-600 mb-1">
                                        Ukuran: {{ $item['width'] }} cm x {{ $item['height'] }} cm
                                    </p>
                                    <p class="text-sm text-gray-600 mb-1">
                                        Luas: {{ number_format($item['area'], 2) }} m²
                                    </p>
                                @endif

                                @if($item['notes'])
                                    <p class="text-sm text-gray-600 mb-1">
                                        Catatan: {{ $item['notes'] }}
                                    </p>
                                @endif

                                <p class="text-sm font-semibold text-blue-600 mt-2">
                                    Rp {{ number_format($item['unit_price'], 0, ',', '.') }} / {{ $item['unit'] }}
                                </p>
                            </div>

                            <!-- Quantity & Actions -->
                            <div class="flex items-center space-x-4">
                                <!-- Quantity Input -->
                                <div class="flex items-center border border-gray-300 rounded-lg">
                                    <button 
                                        type="button"
                                        onclick="updateQuantity('{{ $item['id'] }}', {{ $item['quantity'] - 1 }})"
                                        class="px-3 py-2 text-gray-600 hover:bg-gray-100"
                                        {{ $item['quantity'] <= 1 ? 'disabled' : '' }}
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                                        </svg>
                                    </button>
                                    <input 
                                        type="number" 
                                        value="{{ $item['quantity'] }}" 
                                        min="1"
                                        id="quantity-{{ $item['id'] }}"
                                        class="w-16 text-center border-0 focus:ring-0"
                                        onchange="updateQuantity('{{ $item['id'] }}', this.value)"
                                    >
                                    <button 
                                        type="button"
                                        onclick="updateQuantity('{{ $item['id'] }}', {{ $item['quantity'] + 1 }})"
                                        class="px-3 py-2 text-gray-600 hover:bg-gray-100"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                        </svg>
                                    </button>
                                </div>

                                <!-- Subtotal -->
                                <div class="text-right min-w-[120px]">
                                    <p class="text-xs text-gray-500">Subtotal</p>
                                    <p class="text-lg font-bold text-gray-800" id="subtotal-{{ $item['id'] }}">
                                        Rp {{ number_format($item['subtotal'], 0, ',', '.') }}
                                    </p>
                                </div>

                                <!-- Remove Button -->
                                <form method="POST" action="{{ route('cart.remove', $item['id']) }}" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit"
                                        onclick="return confirm('Yakin ingin menghapus item ini?')"
                                        class="text-red-600 hover:text-red-800"
                                    >
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Clear Cart -->
                <div class="text-right">
                    <form method="POST" action="{{ route('cart.clear') }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button 
                            type="submit"
                            onclick="return confirm('Yakin ingin mengosongkan keranjang?')"
                            class="text-red-600 hover:text-red-800 text-sm font-semibold"
                        >
                            Kosongkan Keranjang
                        </button>
                    </form>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-4">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Ringkasan Pesanan</h2>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span>
                            <span id="cart-total">Rp {{ number_format($total, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>PPN (11%)</span>
                            <span>Rp {{ number_format($total * 0.11, 0, ',', '.') }}</span>
                        </div>
                        <div class="border-t pt-3 flex justify-between text-lg font-bold text-gray-800">
                            <span>Total</span>
                            <span>Rp {{ number_format($total * 1.11, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    <a 
                        href="{{ route('orders.create') }}" 
                        class="block w-full text-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200"
                    >
                        Lanjut ke Checkout
                    </a>

                    <a 
                        href="{{ route('products.index') }}" 
                        class="block w-full text-center px-6 py-3 mt-3 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition duration-200"
                    >
                        Lanjut Belanja
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-16">
            <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
            </svg>
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Keranjang Belanja Kosong</h2>
            <p class="text-gray-600 mb-6">Belum ada produk di keranjang Anda</p>
            <a 
                href="{{ route('products.index') }}" 
                class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200"
            >
                Mulai Belanja
            </a>
        </div>
    @endif
</div>

@push('scripts')
<script>
function updateQuantity(itemId, quantity) {
    if (quantity < 1) return;
    
    fetch(`/cart/${itemId}`, {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ quantity: quantity })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            document.getElementById(`quantity-${itemId}`).value = quantity;
            document.getElementById(`subtotal-${itemId}`).textContent = `Rp ${data.subtotal}`;
            document.getElementById('cart-total').textContent = `Rp ${data.total}`;
        }
    })
    .catch(error => console.error('Error:', error));
}
</script>
@endpush
@endsection