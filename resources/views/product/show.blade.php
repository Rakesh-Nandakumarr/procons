<x-app-layout>
    <!-- Product Detail Section -->
    <div class="container mx-auto px-6 py-12">
        <div class="flex flex-col lg:flex-row bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Product Image -->
            <div class="lg:w-1/2">
                <div class="relative">
                    <img class="w-full h-full object-cover" src="{{ $product->getThumbnail() }}"
                        alt="{{ $product->name }}">
                </div>
            </div>

            <!-- Product Details -->
            <div class="lg:w-1/2 p-6">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $product->name }}</h1>
                <p class="text-gray-600 mb-4">{{ $product->description }}</p>
                <p class="text-2xl font-semibold text-indigo-600 mb-4">${{ number_format($product->price, 2) }}</p>

                <!-- Availability Status -->
                <div class="flex items-center mb-6">
                    @if ($product->quantity > 0)
                        <span class="text-sm text-gray-600 mr-2">In Stock</span>
                        <svg class="w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    @else
                        <span class="text-sm text-red-600 mr-2">Out of Stock</span>
                        <svg class="w-5 h-5 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    @endif
                </div>

                <!-- Add to Cart Button -->
                @livewire('product-add-to-cart', ['product' => $product], key($product->id))

            </div>
        </div>

        <!-- Product Description and Additional Info -->
        <div class="bg-white rounded-lg shadow-lg p-6 mt-8">

            <!-- Additional product details or reviews can be included here -->
        </div>
    </div>

    <!-- AlpineJS Scripts -->
    <script>
        function addToCart() {
            // Add to cart logic here
            alert('Product added to cart!');
        }
    </script>
</x-app-layout>
