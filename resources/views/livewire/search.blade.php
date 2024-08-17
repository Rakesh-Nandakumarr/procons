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

<div x-data="searchComponent({{ json_encode($products) }})" class="relative max-w-3xl mx-auto mt-5">
    <!-- Search Bar -->
    <input
        type="text"
        placeholder="Search products..."
        class="w-full px-4 py-2 border rounded-lg"
        x-model="searchQuery"
    />

    <!-- Search Results -->
    <div x-show="filteredProducts.length > 0" class="absolute mx-auto mt-2 bg-white border rounded-lg shadow-lg w-full">
        <template x-for="product in filteredProducts" :key="product.id">
            <a :href="`/products/${product.slug}`" class="flex items-center p-2 border-b last:border-b-0 hover:bg-gray-100 transition">
                <img :src="product.thumbnail" alt="product thumbnail" class="w-12 h-12 rounded-lg">
                <div class="ml-2">
                    <p class="text-sm font-medium" x-text="product.name"></p>
                </div>
            </a>
        </template>
    </div>

<script>
    function searchComponent(products) {
        return {
            searchQuery: '',
            products: products,
            get filteredProducts() {
                if (this.searchQuery.trim() === '') {
                    return [];
                }
                return this.products.filter(product => {
                    const query = this.searchQuery.toLowerCase();
                    return product.name.toLowerCase().includes(query) || product.description.toLowerCase().includes(query);
                });
            }
        };
    }
</script>
</div>
