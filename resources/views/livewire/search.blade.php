<?php

use function Livewire\Volt\{state, mount};
use App\Models\Product;

state([
    'products' => null,
]);

mount(function () {
    $this->products = Product::where('status', true)->get();
});

?>

<div x-data="{
    searchQuery: '',
    filteredProducts() {
        const query = this.searchQuery.toLowerCase();
        const resultsContainer = document.querySelector('.search-results');
        
        // Hide all products by default
        document.querySelectorAll('.product-item').forEach(product => {
            product.style.display = 'none';
        });

        // Show products if query is not empty
        if (query !== '') {
            document.querySelectorAll('.product-item').forEach(product => {
                const productName = product.getAttribute('data-name').toLowerCase();
                if (productName.includes(query)) {
                    product.style.display = 'flex';
                }
            });
            resultsContainer.style.display = 'block';
        } else {
            resultsContainer.style.display = 'none';
        }
    },
    clearSearch() {
        this.searchQuery = '';
        this.filteredProducts();
    }
}" class="relative max-w-3xl mx-auto mt-5">
    
    <!-- Search Bar -->
    <div class="relative">
        <input
            type="text"
            placeholder="Search products..."
            class="w-full px-4 py-2 border rounded-lg shadow-lg focus:outline-none focus:ring focus:ring-indigo-500"
            x-model="searchQuery"
            @input="filteredProducts"
            @keyup="filteredProducts"
        />
        <button
            x-show="searchQuery !== ''"
            @click="clearSearch"
            class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600"
            type="button"
        >
            &times;
        </button>
    </div>

    <!-- Search Results -->
    <div class="search-results absolute mx-auto mt-2 bg-white border rounded-lg shadow-lg w-full" style="display: none;">
        @foreach($products as $product)
            <a
                href="{{ route('products.show', $product->slug) }}"
                class="product-item flex items-center p-2 border-b last:border-b-0 hover:bg-gray-100 transition"
                data-name="{{ $product->name }}"
                style="display: none;">
                <img src="{{ $product->getThumbnail() }}" alt="{{ $product->name }}" class="w-12 h-12 rounded-lg">
                <div class="ml-2">
                    <p class="text-sm font-medium">{{ $product->name }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>



