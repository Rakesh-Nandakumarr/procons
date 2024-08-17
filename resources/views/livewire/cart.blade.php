<?php

use function Livewire\Volt\{state, mount, on};

state([
    'cart' => null,
    'showCart' => false,
]);

mount(function () {
    if (auth()->user()) {
        $cart = auth()->user()->carts()->where('is_paid', false)->first();

        $this->cart = $cart;
    }
});

$removeProduct = function ($productId) {
    $cart = $this->cart;

    $cart->products()->detach($productId);

    // calculate the total price of the cart
    $cart->total = $cart->products->sum(function ($product) {
        return $product->pivot->price * $product->pivot->quantity;
    });

    $cart->save();

    $this->cart = $cart;

    // return redirect()->route('cart');
};

on([
    'cartRefresh' => function () {
        if (auth()->user()) {
            $cart = auth()->user()->carts()->where('is_paid', false)->first();

            $this->cart = $cart;

            $this->showCart = true;
        }
    },
]);
?>

<div class="mt-6 bg-white shadow-md rounded-lg p-6">
    <div class="space-y-6">
        @if ($cart && count($cart->products) > 0)
            @foreach ($cart->products as $product)
                <div class="flex items-center bg-gray-50 p-4 rounded-lg shadow-sm">
                    <img src="{{ $product->thumbnail }}" class="w-16 h-16 object-cover rounded-lg">
                    <div class="ml-4 flex-1">
                        <h4 class="text-lg font-medium text-gray-800">{{ $product->name }}</h4>
                        <p class="mt-1 text-sm text-gray-600">{{ $product->pivot->quantity }} x
                            $ {{ number_format($product->price, 2) }}
                        </p>
                    </div>
                    <button wire:click="removeProduct({{ $product->id }})"
                        class="ml-auto text-indigo-500 hover:text-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            @endforeach
            <div class="mt-6">
                <p class="text-lg font-semibold text-gray-800">
                    Total: $ {{ number_format($cart->total, 2) }}
                </p>
                <br>
                <a href="/order/create"
                    class="bg-indigo-600 text-white text-sm font-semibold px-6 py-3 rounded hover:bg-indigo-700 transition duration-300">
                    Checkout
                </a>
            </div>
        @else
            <p class="text-sm text-gray-500">No items in the cart</p>
        @endif
    </div>
</div>
