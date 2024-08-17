<x-app-layout>
    <!-- Hero Section -->
    <div class="bg-white px-6 py-16">
        <div class="text-center lg:text-left">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Welcome to <span class="text-indigo-600">ProconShop</span>
            </h2>
            <p class="text-lg text-gray-600 mb-8">Discover premium products curated just for you. ProconShop brings you the
                latest in fashion, electronics, home decor, and more.</p>
            <div class="flex justify-center lg:justify-start space-x-4">
                <a class="px-6 py-3 bg-indigo-600 text-white text-sm font-semibold rounded hover:bg-indigo-700 transition duration-200"
                    href="/shop">Shop Now</a>
                <a class="px-6 py-3 bg-gray-300 text-gray-900 text-sm font-semibold rounded hover:bg-gray-400 transition duration-200"
                    href="/about-us">Learn More</a>
            </div>
        </div>
    </div>

    <div class="bg-gray-100 py-12">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-gray-800">Our Products</h2>
        </div>
    </div>

    @livewire('search')
    <div class="container mx-auto py-12 max-w-7xl">
        @foreach ($categories as $category)
            <div class="mb-12" x-data="{ showMore: false }">
                <h3 class="text-3xl font-bold text-gray-800 mb-6">{{ $category->name }}</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach ($category->products->take(4) as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
                <template x-if="showMore">
                    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                        @foreach ($category->products->skip(4) as $product)
                            <x-product-card :product="$product" />
                        @endforeach
                    </div>
                </template>
                <div class="mt-4 flex justify-center">
                    <button @click="showMore = !showMore"
                        class="px-6 py-3 bg-gray-300 text-gray-900 text-sm font-semibold rounded hover:bg-gray-400 transition duration-200">
                        <span x-text="showMore ? 'Show Less' : 'Show More'"></span>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
