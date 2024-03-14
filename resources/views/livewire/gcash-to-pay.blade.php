<div>
    <div class="w-screen h-[280px] bg-blue-700 flex justify-center">
        <img src="images/image.png" alt="" class="absolute top-4 l-[500px]w-46 h-20">
        <div class="w-[460px] h-[360px] bg-white rounded-lg border shadow-md mt-[120px] flex flex-col justify-center">


        <div class="flex flex-col w-full justify-start items-center gap-y-3">
            <div class="w-80 h-full flex flex-col justify-center">
                    <h1 class="mb-10 text-2xl font-semi text-blue-600 text-center">
                    Wisechoice
                    </h1>

                <h1 class="font-bold">Total Amount to Pay: ₱{{$grand_total}} </h1>

            </div>
            <div class="flex flex-col">
            <a href="">
            <button wire:click="pay" class="w-80 h-12 bg-blue-600 text-white rounded-full shadow-lg border border-blue-400 mt-4">Pay</button>
            </div>
            </a>
        </div>

        </div>
   </div>
</div>
