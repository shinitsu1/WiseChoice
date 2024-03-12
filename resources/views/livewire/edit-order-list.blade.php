<div>

    @if (Auth::user()->role == 'customer')
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                @if (session('message'))
                    <div class="flex justify-center text-green-500 text-xl">{{ session('message') }}
                    </div>
                @endif
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-4 py-3">Order #</th>
                        <th scope="col" class="px-4 py-3 ml-1">Status</th>
                        <th scope="col" class="px-4 py-3 ml-1">Payment Method</th>
                        <th scope="col" class="px-4 py-3 ml-1">Date Ordered</th>
                        <th scope="col" class="px-4 py-3 ml-1">Date Received</th>
                        <th scope="col" class="px-4 py-3 ml-1">To Pay</th>
                        <th scope="col" class="px-4 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr wire:key="{{ $order->id }}" class="border-b dark:border-gray-700">
                            <th scope="row"
                                class="text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $order->id }}</th>
                            <td class="px-4 py-3 text-blue-700">
                                {{ $order->status }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $order->payment }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $order->created_at }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $order->updated_at }}
                            </td>
                            <td class="px-4 py-3">
                                ₱{{ $order->grand_total }}
                            </td>

                            <td class="px-1 py-3">
                                @if ($order->status == 'Paid')
                                    <span class="flex items-center justify-center bg-green-200 px-4 py-2 rounded-md">
                                        Order Finished! </span>
                                @else
                                <div class="w-11/12 flex justify-end">
                                    <button class="bg-green-200 px-4 py-2 rounded-md"
                                        wire:click="update({{ $order->id }})">
                                        Payment Received
                                    </button>
                                    <button class="bg-red-200 px-4 py-2 ml-2 rounded-md"
                                        wire:click="delete({{ $order->id }})">
                                        Cancel Order
                                    </button>
                                </div>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr class="border-b dark:border-gray-700">
                            <td colspan="3" class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                No Orders yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endif

    @if (Auth::user()->role == 'admin')
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                @if (session('message'))
                    <div class="flex justify-center text-green-500 text-xl">{{ session('message') }}
                    </div>
                @endif
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-4 py-3">Order #</th>
                        <th scope="col" class="px-4 py-3 ml-1">Status</th>
                        <th scope="col" class="px-4 py-3 ml-1">Payment Method</th>
                        <th scope="col" class="px-4 py-3 ml-1">Date Ordered</th>
                        <th scope="col" class="px-4 py-3 ml-1">Date Received</th>
                        <th scope="col" class="px-4 py-3 ml-1">To Pay</th>
                        <th scope="col" class="px-4 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr wire:key="{{ $order->id }}" class="border-b dark:border-gray-700">
                            <th scope="row"
                                class="text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $order->id }}</th>
                            <td class="px-4 py-3 text-blue-700">
                                {{ $order->status }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $order->payment }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $order->created_at }}
                            </td>
                            <td class="px-4 py-3 ">
                                {{ $order->received }}
                            </td>
                            <td class="px-4 py-3">
                                ₱{{ $order->grand_total }}
                            </td>
                            <td class="px-1 py-3">
                                @if ($order->status == 'Paid')
                                    <span class="flex items-center justify-center bg-green-200 px-4 py-2 rounded-md">
                                        Order Finished! </span>
                                @else
                                <div class="w-11/12 flex justify-end">
                                    <button class="bg-green-200 px-4 py-2 rounded-md"
                                        wire:click="update({{ $order->id }})">
                                        Payment Received
                                    </button>
                                    <button class="bg-red-200 px-4 py-2 ml-2 rounded-md"
                                        wire:click="delete({{ $order->id }})">
                                        Cancel Order
                                    </button>
                                </div>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr class="border-b dark:border-gray-700">
                            <td colspan="3" class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                No Orders yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    @endif

</div>
