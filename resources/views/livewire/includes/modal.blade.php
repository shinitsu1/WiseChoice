@if ($isOpen)
    <div class="fixed inset-0 flex items-center justify-center z-50">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative bg-white p-4 rounded-xl shadow-lg w-1/2 ">
            <!-- Modal content goes here -->
            <div class="flex items-center justify-between pb-2 md:pb-3 border-b border-gray-500">
                <h2 class="pl-2 text-xl font-semibold text-gray-900 dark:text-white">

                    <img src="{{$image}}" alt="">
                </h2>
                <button wire:click.prevent="$set('isOpen', false)"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span></button>
            </div>
            <div>
                Item Name:{{$name}}
            </div>
            <div>
               Description: {{$desc}}
            </div>
            <div>
                Price:{{$sell_price}}
            </div>
            <div>
                Items Sold:{{$sold}}
            </div>
        </div>
    </div>
@endif
