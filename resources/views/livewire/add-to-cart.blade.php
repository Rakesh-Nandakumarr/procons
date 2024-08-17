<?php

use function Livewire\Volt\{state, mount};
use App\Models\Cart;
use App\Models\Product;

state([
    'product' => null,
    'quantity' => 1,
    'cart' => null,
    'stock' => 0,
]);

mount(function () {
    $this->stock = Product::find($this->product->id)->stock;
});

$addToCart = function () {
    // check if the user has an active cart with the status is_paid false
    $cart = Cart::where('user_id', auth()->id())->where('is_paid', false)->first();

    // if not found, create a new cart
    if (!$cart) {
        $cart = Cart::create([
            'user_id' => auth()->id(),
            'is_paid' => false,
        ]);
    }

    // check if the product is already in the cart
    $cartItem = $cart
        ->products()
        ->where('product_id', $this->product->id)
        ->first();

    // if the product is already in the cart, update the quantity
    if ($cartItem) {
        $cartItem->pivot->quantity = $this->quantity;
        $cartItem->pivot->save();
    } else {
        // if the product is not in the cart, add the product to the cart
        $cart->products()->attach($this->product->id, [
            'quantity' => $this->quantity,
            'tax' => 0,
            'discount' => 0,
            'price' => $this->product->price,
        ]);
    }

    // calculate the total price of the cart
    $cart->total = $cart->products->sum(function ($product) {
        return $product->pivot->price * $product->pivot->quantity;
    });

    $cart->save();

    // dispatch cart refresh event
    $this->dispatch('cartRefresh');
};

?>

<div>
    <div class="mt-5">
        @auth()
            <button wire:click="addToCart"
                class="bg-indigo-600 text-white text-sm font-semibold px-6 py-3 rounded hover:bg-indigo-700 transition duration-300"
                @if ($product->stock == 0) disabled @endif>
                Add to Cart
            </button>
        @else
            <a href="{{ route('login') }}"
                class="bg-red-600 text-white text-sm font-semibold px-6 py-3 rounded hover:bg-red-700 transition duration-300">
                Login to Add to Cart
            </a>
        @endauth
    </div>

    {{ $cart?->total }}
</div>
