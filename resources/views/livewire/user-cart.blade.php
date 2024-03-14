<div>
    <div class="overflow-x-auto">
        @if (session('message'))
            <div class="flex justify-center text-green-500 text-xl">{{ session('message') }}</div>
        @endif
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-lg text-white uppercase bg-gray-800">
                <tr>
                    <th scope="col" class="px-4 py-3 ml-1">Image</th>
                    <th scope="col" class="px-4 py-3 ml-1">Product Name</th>
                    <th scope="col" class="px-4 py-3 ml-1">Price</th>
                    <th scope="col" class="px-4 py-3 ml-1">Quantity</th>
                    <th scope="col" class="px-4 py-3 ml-1">Total Price</th>
                    <th scope="col" class="px-4 py-3">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cart as $order)
                    <tr wire:key="{{ $order->id }}" class="border-b dark:border-gray-700">
                        <td class="px-4 py-1" style="text-align: center;">
                            <img src="{{ asset($order->image) }}" class="h-24">
                        </td>
                        <td class="px-4 py-3 text-xl text-blue-700">{{ $order->product }}</td>
                        <td class="px-4 py-3 text-xl">₱{{ $order->sell_price }}</td>
                        <td class="px-4 py-3 text-xl ">
                            @if ($editOrderId === $order->id)
                                <input wire:model="quantity" type="number"
                                    class="w-16 bg-gray-100 text-gray-900 text-sm rounded">
                            @else
                                {{ $order->quantity }}
                            @endif
                            @if ($editOrderId === $order->id)
                                <button class="bg-green-200 px-4 py-2 rounded-md" wire:click="update">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                </button>
                                <button class="bg-red-200 px-4 py-2 rounded-md" wire:click="cancel">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-xl">₱{{ $order->total_price }}</td>
                        <td class="px-1 py-3 text-xl">

                            <button class="" wire:click="edit({{ $order->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="ml-1 mt-1 w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </button>

                            <button class="" wire:click="delete({{ $order->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="ml-1 mt-1 w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr class="border-b  dark:border-gray-700">
                        <td colspan="3" class="px-6 py-10 text-lg leading-5 text-gray-900 whitespace-no-wrap">
                            No products have been added to cart yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="bg-gray-200">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="py-10 text-gray-900">
                        <div class="flex items-center">
                            <span class="flex-1 text-lg font-bold">TO PAY:</span>
                            <span class="text-3xl flex-1">₱{{$grand_total}}</span>
                            <div class="ml-10">
                                <button wire:click="type">
                                    <span class="flex items-center justify-center w-full py-2 bg-blue-600 rounded-md px-10 text-white">CHECK OUT ({{ $user_cart }})</span>
                                </button>
                            </div>
                            <div class="ml-10">
                                <button wire:click="deleteAll">
                                    <span class="flex items-center justify-center w-full py-2 bg-red-600 rounded-md px-10 text-white">{{ __('REMOVE ITEMS') }}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (session('type'))
        <div class="bg-gray-400">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="py-5 text-gray-900">
                        <div class="flex items-center">
                            <span class="flex-1 text-lg font-bold">{{ session('type') }}</span>
                            <div class="ml-10">
                                <button wire:click="store">
                                    <span class="flex items-center justify-center w-full py-2 bg-blue-600 rounded-md px-10 text-white">CASH ON DELIVERY</span>
                                </button>
                            </div>
                            <div class="ml-10">
                                <button wire:click="gcash">
                                    <span class="flex items-center justify-center w-full py-2 bg-blue-600 rounded-md px-10 text-white">{{ __('via GCash') }}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
