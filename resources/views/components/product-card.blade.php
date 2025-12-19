<div class="bg-white rounded-lg shadow hover:shadow-lg transition-all duration-300 overflow-hidden h-full flex flex-col group">
    <div class="relative overflow-hidden bg-gray-100 aspect-square">
        <img 
            src="{{ $product->image ?? 'https://via.placeholder.com/200' }}" 
            alt="{{ $product->name }}"
            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
        >
        @if(isset($product->discount) && $product->discount > 0)
            <div class="absolute top-3 right-3 bg-red-500 text-white px-2 py-1 rounded text-xs font-bold">
                -{{ $product->discount }}%
            </div>
        @endif
    </div>
    
    <div class="p-4 flex-1 flex flex-col">
        <a href="{{ route('products.show', $product->id) }}" class="text-sm font-semibold text-gray-900 hover:text-green-600 line-clamp-2 mb-2">
            {{ $product->name }}
        </a>
        
        <p class="text-xs text-gray-600 mb-3 line-clamp-1">
            {{ $product->category ?? 'Kategori' }}
        </p>
        
        <div class="flex items-center mb-3">
            <div class="flex text-yellow-400 text-xs">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
            </div>
            <span class="text-xs text-gray-500 ml-2">({{ rand(10, 50) }})</span>
        </div>
        
        <div class="mt-auto">
            <div class="flex items-center justify-between mb-3">
                <span class="text-lg font-bold text-gray-900">
                    Rp {{ number_format($product->price ?? 0, 0, ',', '.') }}
                </span>
            </div>
            
            <form action="{{ route('cart.add') }}" method="POST" class="flex gap-2">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="quantity" value="1">
                <button 
                    type="submit"
                    class="flex-1 bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded text-sm transition-colors"
                >
                    <i class="fas fa-shopping-cart mr-1"></i>Beli
                </button>
            </form>
        </div>
    </div>
</div>
