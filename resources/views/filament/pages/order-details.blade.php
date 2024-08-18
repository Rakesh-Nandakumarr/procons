<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f9fafb;
        }
    </style>
</head>

<body class="antialiased">

    <div class="container max-w-4xl mx-auto mt-10">
        <div class="bg-white shadow rounded-lg p-6 space-y-5 divide-y divide-gray-200">
            <h2 class="text-2xl font-bold text-gray-800 text-center">Order Details</h2>

            <div class="pt-5">
                <h3 class="text-lg font-semibold leading-7 text-indigo-900">Delivery Details</h3>
                <p>Name: {{ $order->shipping_first_name }} {{ $order->shipping_last_name }}</p>
                <p>Address: {{ $order->shipping_address }}, {{ $order->shipping_post_code }},
                    {{ $order->shipping_city }}, {{ $order->shipping_district }}</p>
                <p>Phone: {{ $order->shipping_phone }}</p>

                <h3 class="text-lg font-semibold leading-7 text-indigo-900 mt-4">Billing Details</h3>
                <p>Name: {{ $order->billing_first_name }} {{ $order->billing_last_name }}</p>
                <p>Address: {{ $order->billing_address }}, {{ $order->billing_post_code }},
                    {{ $order->billing_city }}, {{ $order->billing_district }}</p>
                <p>Phone: {{ $order->billing_phone }}</p>
            </div>

            <div class="pt-5">
                <h3 class="text-lg font-semibold leading-7 text-indigo-900">Order Summary</h3>
                <p>Payment Status: {{ $order->payment_status }}</p>
                <p>Delivery Status: {{ $order->shipping_status }}</p>
                <p>Total: {{ $order->total }}</p>
            </div>

            <div class="pt-5">
                <h3 class="text-lg font-semibold leading-7 text-indigo-900">Products in this Order</h3>
                <div class="overflow-x-auto mt-4">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-indigo-500 uppercase tracking-wider">
                                    Product Name
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-indigo-500 uppercase tracking-wider">
                                    Quantity
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-indigo-500 uppercase tracking-wider">
                                    Price
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-indigo-500 uppercase tracking-wider">
                                    Tax
                                </th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-indigo-500 uppercase tracking-wider">
                                    Discount
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($order->cart->products as $product)
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
            </div>
        </div>
    </div>

</body>

</html>
