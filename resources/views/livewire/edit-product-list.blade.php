<div>
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            @if (session('message'))
                <div class="flex justify-center text-green-500 text-xl">{{ session('message') }}</div>
            @endif
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-4 py-3">ID</th>
                    <th scope="col" class="px-4 py-3 ml-1">Image</th>
                    <th scope="col" class="px-4 py-3 ml-1">Product Name</th>
                    <th scope="col" class="px-4 py-3 ml-1">Category</th>
                    <th scope="col" class="px-4 py-3 ml-1">Base Price</th>
                    <th scope="col" class="px-4 py-3 ml-1">Sell Price</th>
                    <th scope="col" class="px-4 py-3 ml-1">Quantity</th>
                    <th scope="col" class="px-4 py-3">
                        <span class="sr-only">Actions</span>
                    </th>
                    <th scope="col" class="px-4 py-3">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr wire:key="{{ $product->id }}" class="border-b dark:border-gray-700">
                        <th scope="row"
                            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $product->id }}</th>
                        <td class="px-4 py-1" style="text-align: center;">
                            <img src="{{ asset($product->image) }}" width='30' height="30">
                        </td>
                        <td class="px-4 py-3 text-blue-700">
                            @if ($editProductId === $product->id)
                                <input wire:model="product" type="text"
                                    class="bg-gray-100 text-gray-900 text-sm rounded">
                            @else
                                {{ $product->product }}
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            {{ $product->category }}
                        </td>
                        <td class="px-4 py-3">
                            @if ($editProductId === $product->id)
                                <input wire:model="base_price" type="text"
                                    class="w-1/2 bg-gray-100 text-gray-900 text-sm rounded">
                            @else
                                {{ $product->base_price }}
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @if ($editProductId === $product->id)
                                <input wire:model="sell_price" type="text"
                                    class="w-1/2 bg-gray-100 text-gray-900 text-sm rounded">
                            @else
                                {{ $product->sell_price }}
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @if ($editProductId === $product->id)
                                <input wire:model="quantity" type="text"
                                    class="w-1/2 bg-gray-100 text-gray-900 text-sm rounded">
                            @else
                                {{ $product->quantity }}
                            @endif
                        </td>
                        <td class="px-1 py-3">
                            @if ($editProductId === $product->id)
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
                        <td class="px-1 py-3">
                            <button class="" wire:click="edit({{ $product->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="ml-1 mt-1 w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                </svg>
                            </button>
                            <button class="" wire:click="delete({{ $product->id }})">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" class="ml-1 mt-1 w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </td>

                    </tr>
                @empty
                    <tr class="border-b dark:border-gray-700">
                        <td colspan="3" class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                            No supervisor/s found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
