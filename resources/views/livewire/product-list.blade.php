<div>
    @if (Auth::user()->role == 'admin')
        <div class="flex justify-center mt-4">
            <select wire:model.live="category" name="category" id="category"
                class="block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Select Category</option>
                <option value="0">Weight Gainers</option>
                <option value="1">Pre Workout</option>
                <option value="fat_burner">Fat Burner</option>
                <option value="whey_protein">Whey Protein</option>
            </select>
        </div>
        <div class="flex m-4 flex-wrap justify-center">
            @forelse ($products as $product)
                <div wire:key="{{ $product->id }}" class="hover:border-red-500 border border-black p-4 rounded m-5">
                    <div class="flex flex-col p-5">
                        <div class="flex justify-between">
                            <div>
                                Price: {{ $product->sell_price }}
                            </div>
                            <div>
                                Qty: {{ $product->quantity }}
                            </div>
                        </div>
                        <div class="flex items-center justify-center p-5">
                            <img name="img" src="{{ $product->image }}" alt="img" class="h-32">
                        </div>
                        <div class="flex items-center justify-center font-bold">
                            {{ $product->product }}
                        </div>
                        <div class="pt-2 flex items-center justify-center font-bold">
                            <span>{{ $product->sold }} Sold</span>
                        </div>
                    </div>
                    @if ($product->quantity == '0')
                        <div class="pt-2 flex items-center justify-center font-bold">
                            <span class="text-red-600 text-bold text-xl">Sold Out</span>
                        </div>
                    @endif
                </div>
            @empty
                <label class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                    No available products to display.
                </label>
            @endforelse
        </div>
    @endif
    @if (Auth::user()->role == 'customer')
        <form>
            @if (session('message'))
                <div class="flex justify-center text-green-500 text-xl">{{ session('message') }}</div>
            @endif
            <div class="flex m-4 flex-wrap justify-center">
                @forelse ($products as $product)
                    <div wire:key="{{ $product->id }}"
                        class="hover:border-red-500 hover:bg-slate-300 border border-black p-4 rounded m-5">
                        <div class="flex flex-col p-5">
                            <div class="flex justify-between">
                                <div>
                                    <h3>Price: {{ $product->sell_price }}</h3>
                                </div>
                                <div>
                                    <h3>Qty: {{ $product->quantity }}</h3>
                                </div>
                            </div>
                            <div class="flex items-center justify-center p-5">
                                <img name="img" src="{{ $product->image }}" alt="img" class="h-40">
                            </div>
                            <div class="flex items-center justify-center font-bold">
                                <label for="product">{{ $product->product }}</label>
                            </div>
                            <div class="pt-2 flex items-center justify-center font-bold">
                                <span class="text-green-600">{{ $product->sold }} Sold</span>
                            </div>
                        </div>
                        @if ($product->quantity == '0')
                            <div class="pt-2 flex items-center justify-center font-bold">
                                <span class="text-red-600 text-bold text-xl">Sold Out</span>
                            </div>
                        @else
                            <div class="flex justify-between ">
                                <div class="">
                                    <input wire:model="qty" type="number"
                                        class="w-16 py-2 px-3 border border-gray-500 rounded-md">
                                </div>
                                <div>
                                    <button wire:click.prevent="store({{ $product->id }})">
                                        <span
                                            class="flex items-center justify-center w-full py-2 bg-gradient-to-r from-blue-700 to-blue-400 rounded-md px-10 text-white">{{ __('Add to Cart') }}</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                @empty
                    <label class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        No available products to display.
                    </label>
                @endforelse
            </div>
        </form>
    @endif
</div>
