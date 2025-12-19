<aside class="w-full md:w-64">
    <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
        <h3 class="text-lg font-bold text-gray-900 mb-6 pb-4 border-b-2 border-green-600">
            <i class="fas fa-filter mr-2 text-green-600"></i>Kategori
        </h3>
        
        <nav class="space-y-2 mb-8">
            <a href="{{ route('products.index') }}" 
               class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded transition-colors font-medium">
                <i class="fas fa-box mr-3"></i>Semua Produk
            </a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded transition-colors">
                <i class="fas fa-file-pdf mr-3"></i>Brochures
            </a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded transition-colors">
                <i class="fas fa-bookmark mr-3"></i>Flyers & Leaflets
            </a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded transition-colors">
                <i class="fas fa-image mr-3"></i>Posters
            </a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded transition-colors">
                <i class="fas fa-credit-card mr-3"></i>Business Cards
            </a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded transition-colors">
                <i class="fas fa-layer-group mr-3"></i>Stickers
            </a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded transition-colors">
                <i class="fas fa-gift mr-3"></i>Promotional Items
            </a>
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50 hover:text-green-600 rounded transition-colors">
                <i class="fas fa-tshirt mr-3"></i>Clothing & Textiles
            </a>
        </nav>
        
        <div class="pt-6 border-t">
            <h4 class="font-semibold text-gray-900 mb-4">Range Harga</h4>
            <input type="range" min="0" max="1000000" class="w-full accent-green-600">
            <div class="flex justify-between text-sm text-gray-600 mt-3">
                <span>Rp 0</span>
                <span>Rp 1.000.000</span>
            </div>
        </div>
    </div>
</aside>
