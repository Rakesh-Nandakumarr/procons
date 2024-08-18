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

<div x-data="{
    product: @entangle('product'),
    quantity: @entangle('quantity'),
    cart: @entangle('cart'),
    stock: @entangle('stock'),
    decrement() {
        if (this.quantity > 1) {
            this.quantity--;
        }
    },
    increment() {
        if (this.quantity < this.stock) {
            this.quantity++;
        } else {
            this.quantity = this.stock;
            alert('Cannot add more than available stock.');
        }
    },
    validateQuantity() {
        let qty = parseInt(this.quantity);

        if (isNaN(qty) || qty < 1) {
            this.quantity = 1;
        } else if (qty > this.stock) {
            this.quantity = this.stock;
            alert('Cannot add more than available stock.');
        } else {
            this.quantity = qty;
        }
    }
}" x-init="$watch('quantity', validateQuantity)">
    <div class="flex justify-between items-center">
        <div class="flex items-center">
            <button x-on:click="decrement" class="px-4 py-2 bg-gray-200 text-gray-700 font-semibold rounded">
                -
            </button>
            <input type="text" x-model="quantity" class="px-4 py-2 w-20 bg-gray-200 text-center border-2 border-black"
                @change="validateQuantity">
            <button x-on:click="increment" class="px-4 py-2 bg-gray-200 text-gray-700 font-semibold rounded">
                +
            </button>
        </div>
    </div>
    <div class="mt-5">
        @if ($product->stock > 0)
            <button
                class="text-sm font-semibold px-6 py-3 rounded transition duration-300 bg-indigo-600 text-white hover:bg-indigo-700"
                wire:click="addToCart">
                {{ 'Add to Cart' }}
            </button>
        @else
            <button
                class="text-sm font-semibold px-6 py-3 rounded transition duration-300 bg-gray-400 text-gray-700 cursor-not-allowed">
                {{ 'Out of Stock' }}
            </button>
        @endif

    </div>

    {{ $cart?->total }}
</div>
