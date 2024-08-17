<!-- resources/views/admin/order/show.blade.php -->
<x-app-layout>
    <div class="container max-w-4xl mx-auto mt-1">
        <div class="space-y-10 divide-y divide-gray-900/10">
            <div class="px-4 sm:px-0">
                <h2 class="text-base font-semibold leading-7 text-orange-700">Order Details</h2>
                <p class="mt-1 text-sm leading-6 text-gray-600">View the details of the order and its products.</p>
            </div>

            <div class="shadow rounded">
                <div class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2 p-6">
                    <h3 class="text-lg font-semibold leading-7 text-gray-900">Delivery Details</h3>
                    <p>Name: {{ $order->shipping_first_name }} {{ $order->shipping_last_name }}</p>
                    <p>Address: {{ $order->shipping_address }}, {{ $order->shipping_post_code }}, {{ $order->shipping_city }}, {{ $order->shipping_district }}</p>
                    <p>Phone: {{ $order->shipping_phone }}</p>

                    <h3 class="text-lg font-semibold leading-7 text-gray-900 mt-4">Billing Details</h3>
                    <p>Name: {{ $order->billing_first_name }} {{ $order->billing_last_name }}</p>
                    <p>Address: {{ $order->billing_address }}, {{ $order->billing_post_code }}, {{ $order->billing_city }}, {{ $order->billing_district }}</p>
                    <p>Phone: {{ $order->billing_phone }}</p>

                    <h3 class="text-lg font-semibold leading-7 text-gray-900 mt-4">Order Summary</h3>
                    <p>Payment Status: {{ $order->payment_status }}</p>
                    <p>Delivery Status: {{ $order->shipping_status }}</p>
                    <p>Total: {{ $order->total }}</p>
                    
                    <h3 class="text-lg font-semibold leading-7 text-gray-900 mt-4">Products in this Order</h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 mt-4">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-orange-500 uppercase tracking-wider">Product Name</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-orange-500 uppercase tracking-wider">Quantity</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-orange-500 uppercase tracking-wider">Price</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-orange-500 uppercase tracking-wider">Tax</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-orange-500 uppercase tracking-wider">Discount</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($products as $product)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->pivot->quantity }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->pivot->price }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->pivot->tax }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $product->pivot->discount }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('order.index') }}" class="text-sm font-semibold leading-6 text-orange-900">Back to Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
