<x-app-layout>
    @if (session('Payment_success'))
        <div class="bg-green-500 text-white font-bold py-2 px-4 rounded mb-4">
            {{ session('Payment_success') }}
        </div>
    @elseif (session('Payment_cancel'))
        <div class="bg-red-500 text-white font-bold py-2 px-4 rounded mb-4">
            {{ session('Payment_cancel') }}
        </div>
    @endif
    <div class="container mx-auto mt-1 bg-white p-4 shadow rounded">
        <h2 class="text-2xl font-bold text-gray-800 mx-auto text-center mx-10">My Order History</h2>
        <div class="px-4 sm:px-6 lg:px-8 bg-white pt-4">

            <div class="sm:flex sm:items-center">
                <div class="sm:flex-auto">
                    <p class="mt-2 text-sm text-gray-700">A list of all the orders including their details.</p>
                </div>
            </div>

            <div class="mt-8 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Shipping
                                        Address</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Billing
                                        Address</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Payment Status
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Delivery
                                        Status</th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Created at
                                    </th>
                                    <th scope="col"
                                        class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Total</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $order->shipping_address }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $order->billing_address }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $order->payment_status }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $order->shipping_status }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            {{ $order->created_at }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                            ${{ $order->total }}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm font-medium">
                                            <div class="flex gap-5">
                                                <a href="{{ route('order.show', $order->id) }}"
                                                    class="text-indigo-600 hover:text-indigo-900">Show</a>
                                                @if ($order->payment_status == 'Unpaid')
                                                    <a href="{{ route('pay', $order) }}"
                                                        class="text-green-600 hover:text-green-900">Pay now</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex justify-center mb-20">
                {{ $orders->links('pagination::tailwind') }}
            </div>

        </div>
    </div>
</x-app-layout>
