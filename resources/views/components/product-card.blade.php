<div class="bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 block">
    <div class="bg-gray-200">
        <img class="w-full h-56 object-cover" src="{{ $product->getThumbnail() }}" alt="{{ $product->name }}">
    </div>
    <div class="p-4">
        <h3 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
        <p class="text-gray-600 mt-2 text-sm">{{ \Illuminate\Support\Str::limit($product->description, 100) }}</p>
        <div class="flex justify-between items-center mt-4">
            <span class="text-xl font-bold text-indigo-600">${{ number_format($product->price, 2) }}</span>
        </div>
    </div>
    <div class="p-4 bg-gray-100 flex justify-between items-center">
        <div class="flex items-center">
            @if ($product->stock > 0)
                <span class="text-sm text-gray-600">In Stock</span>
                <svg class="w-5 h-5 text-green-500 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            @else
                <span class="text-sm text-red-600">Out of Stock</span>
                <svg class="w-5 h-5 text-red-500 ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            @endif
        </div>
        <a href="{{ route('products.show', $product->slug) }}"
            class="bg-gray-900 text-white text-sm font-semibold px-4 py-2 rounded hover:bg-gray-800 transition duration-200" >
            show details
        </a>
    </div>
</div>
