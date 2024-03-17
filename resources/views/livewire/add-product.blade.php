<div>
    <form wire:submit.prevent="store">
        @if (session('message'))
            <div class="text-green-500 text-md">{{ session('message') }}</div>
        @endif

        <div>
            <x-input-label for="image" :value="__('Product Image')" />
            <input wire:model="image" accept="image/png, image/jpeg" type="file" id="image"
                class="ring-1 ring-inset ring-blue-300 bg-blue-100 text-gray-900 text-md rounded block w-full">
            @error('image')
                <p class="text-white text-xs p-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="pt-4">
            <x-input-label for="product" :value="__('Name of Product:')" />
            <x-text-input wire:model="product" id="product" class="block mt-1 w-full" type="text" name="product"
                :value="old('product')" required autofocus autocomplete="product" />
            <x-input-error :messages="$errors->get('product')" class="mt-2" />
        </div>
        <div class="pt-4">
            <x-input-label for="base_price" :value="__('Base Price:')" />
            <x-text-input wire:model="base_price" id="base_price" class="block mt-1 w-full" type="text"
                name="base_price" :value="old('base_price')" required autofocus autocomplete="base_price" />
            <x-input-error :messages="$errors->get('base_price')" class="mt-2" />
        </div>
        <div class="pt-4">
            <x-input-label for="sell_price" :value="__('Sell Price:')" />
            <x-text-input wire:model="sell_price" id="sell_price" class="block mt-1 w-full" type="text"
                name="sell_price" :value="old('sell_price')" required autofocus autocomplete="sell_price" />
            <x-input-error :messages="$errors->get('sell_price')" class="mt-2" />
        </div>
        <div class="pt-4">
            <x-input-label for="quantity" :value="__('Quantity')" />
            <x-text-input wire:model="quantity" id="quantity" class="block mt-1 w-full" type="text" name="quantity"
                :value="old('quantity')" required autofocus autocomplete="quantity" />
            <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
        </div>
        <div class="pt-4">
            <x-input-label for="category" :value="__('Category')" />
            <select name="category" wire:model="category"
                class="w-full bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm text-xs rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white  mb-2">
                <option value="" {{ old('category') == '' ? 'selected' : '' }}></option>
                <option value="Pre Workout" {{ old('category') == 'Pre Workout' ? 'selected' : '' }}>Pre Workout
                </option>
                <option value="Weight Gainers" {{ old('category') == 'Weight Gainers' ? 'selected' : '' }}>Weight
                    Gainers</option>
                <option value="Whey Protein" {{ old('category') == 'Whey Protein' ? 'selected' : '' }}>Whey Protein
                </option>
                <option value="Fat Burner" {{ old('category') == 'Fat Burner' ? 'selected' : '' }}>Fat Burner</option>
            </select>
            @error('category')
                <p class="text-red-500 text-xs p-1">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <div class="pt-4">
            <x-input-label for="desc" :value="__('Product Description:')" />
            <x-text-input wire:model="desc" id="desc" class="block mt-1 w-full" type="text"
                name="desc" :value="old('desc')" required autofocus autocomplete="desc" />
            <x-input-error :messages="$errors->get('desc')" class="mt-2" />
        </div>


        <div class="pt-4 flex justify-end">
            <button type="button"
                class= "text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-400 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                wire:click="closeModal">Cancel
            </button>
            <button type="submit"
                class="ml-4 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Add Product
            </button>
        </div>
</div>
