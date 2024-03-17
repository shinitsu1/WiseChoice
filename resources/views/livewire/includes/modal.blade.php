@if ($isOpen)
    <div class="fixed inset-0 flex items-center justify-center z-50">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="flex items-center relative bg-gray-100 p-4 rounded-xl shadow-lg w-1/2 ">
            <!-- Modal content goes here -->
            <div class="flex items-center justify-between mr-4">
                <h2 class="pl-2 text-xl font-semibold text-gray-900 dark:text-white">

                    <img src="{{ $image }}" alt=""
                        class="w-[1000px] h-64 border border-black rounded-xl shadow-2xl">
                </h2>

            </div>
            <div class="">
                <div class="flex mb-2 mr-4">
                    <h1 class="font-bold mr-1 text-3xl"> {{ $name }}</h1>
                </div>
                <div class="flex mb-2 mr-5">
                    <h1 class="font-bold mr-1 text-red-400">Price: ₱{{ $sell_price }} </h1>
                </div>
                <div class="mb-2 mr-5">
                    <h1 class="font-bold mr-1">Description: </h1> {{ $desc }}
                </div>
                <div class="flex mb-2 mr-5">
                    <h1 class="font-bold mr-1">Items Sold: </h1> {{ $sold }}
                </div>
            </div>
            <div class="absolute top-2 right-3 flex h-full justify-start items-start">
                <button wire:click.prevent="$set('isOpen', false)"
                    class="text-white bg-red-300 hover:bg-red-200 hover:text-red-900 rounded-full text-sm w-6 h-6 ms-auto inline-flex justify-center items-center dark:hover:bg-red-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span></button>
            </div>
        </div>
    </div>
@endif
