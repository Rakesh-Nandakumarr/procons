<x-app-layout>
    <!-- Hero Section -->
    <section class="relative bg-gray-100 text-gray-900 overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('https://img.freepik.com/free-vector/gradient-template-background-new-minimalist_483537-4975.jpg?t=st=1723932341~exp=1723935941~hmac=2000c172ed58879c10b8185c6a44510c5d67854be0b534e4999dd7981506a7bf&w=1060');"></div>
        <div class="relative z-10 container mx-auto flex flex-col lg:flex-row items-center justify-center h-screen px-6 py-12 md:px-12 md:py-24">
            <div class="flex flex-col items-center lg:items-start lg:w-1/2 text-center lg:text-left">
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-4">
                    Welcome to <span class="text-indigo-600">ProconShop</span>!
                </h1>
                <p class="text-base sm:text-lg md:text-xl mb-6 leading-relaxed">
                    Discover a curated selection of high-quality products tailored to meet all your needs. From the latest fashion trends to cutting-edge electronics and home essentials, ProconShop is your ultimate destination for exceptional value and service.
                </p>
                <div class="flex flex-col md:flex-row md:justify-start gap-4">
                    <a href="#our-products" class="bg-indigo-600 hover:bg-indigo-700 text-white py-3 px-6 rounded-lg text-base sm:text-lg font-semibold transition duration-300 ease-in-out">
                        Start Shopping
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Products Section -->
    <div id="our-products" class="bg-white py-12">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">Our Products</h2>
            <p class="text-sm sm:text-ml text-gray-600 mb-12">Explore our diverse range of products and find exactly what you're looking for.</p>
        </div>
    </div>
    @livewire('search')


    <div class="container mx-auto py-12 max-w-7xl">
        @foreach ($categories as $category)
            <div class="mb-12" x-data="{ showMore: false }">
                <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-6">{{ $category->name }}</h3>
                <p class="text-base sm:text-lg text-gray-600 mb-12">{{ $category->description }}</p>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 sm:gap-8">
                    @foreach ($category->products->take(4) as $product)
                        <x-product-card :product="$product" />
                    @endforeach
                </div>
                <template x-if="showMore">
                    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 sm:gap-8">
                        @foreach ($category->products->skip(4) as $product)
                            <x-product-card :product="$product" />
                        @endforeach
                    </div>
                </template>
                @if ($category->products->count() > 4)
                    <div class="mt-4 flex justify-center">
                        <button @click="showMore = !showMore"
                            class="px-4 sm:px-6 py-2 sm:py-3 bg-gray-200 text-gray-900 text-sm sm:text-base font-semibold rounded hover:bg-gray-300 transition duration-200">
                            <span x-text="showMore ? 'Show Less' : 'Show More'"></span>
                        </button>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</x-app-layout>
