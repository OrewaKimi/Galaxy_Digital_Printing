<!-- resources/views/layouts/checkout.blade.php -->
@extends('layouts.app')

@section('title', 'Checkout')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-md mx-auto">
        <div class="bg-white rounded-lg shadow-lg p-8">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Checkout</h2>
                <p class="text-gray-600 mb-2">Anda akan melakukan pembelian produk</p>
                <p class="text-xl font-semibold text-gray-800">{{ $product->product_name }}</p>
            </div>

            <div class="border-t border-b py-4 mb-6">
                <div class="flex justify-between mb-2">
                    <span class="text-gray-600">Harga:</span>
                    <span class="font-semibold">Rp{{ number_format($product->base_price, 0, ',', '.') }}</span>
                </div>
            </div>

            <button type="button" id="pay-button" 
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-6 rounded-lg transition-colors duration-300">
                Bayar Sekarang
            </button>

            <div class="mt-4 text-center">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-gray-800">
                    &larr; Kembali ke Home
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
        snap.pay('{{ $transaction->snap_token }}', {
            onSuccess: function(result){
                window.location.href = '{{ route("home") }}?status=success';
            },
            onPending: function(result){
                window.location.href = '{{ route("home") }}?status=pending';
            },
            onError: function(result){
                window.location.href = '{{ route("home") }}?status=error';
            }
        });
    };
</script>
@endsection