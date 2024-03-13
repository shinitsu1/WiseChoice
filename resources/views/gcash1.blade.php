<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="font.css">
</head>
<body>
   <div class="w-screen h-[280px] bg-blue-700 flex justify-center">
        <img src="images/image.png" alt="" class="absolute top-4 l-[500px]w-46 h-20">
        <div class="w-[460px] h-[360px] bg-white rounded-lg border shadow-md mt-[120px] flex flex-col justify-center">


        <div class="flex flex-col w-full justify-start items-center gap-y-3">
            <div class="w-80 flex flex-col justify-start">
                    <h1 class="mb-10 text-2xl font-semi">
                    Merchant: Wisechoice
                    </h1>

                <h1 class="font-bold">Login to pay with Gcash</h1>

            </div>
            <div class="flex flex-col">
            <label for="" class="mb-1 text-sm font-semibold">Mobile Number:</label>
            <input type="text" name="" id="" value="" placeholder="Enter your GCASH number" class="w-80 h-10 border border-black rounded-full pl-4 bg-gray-50 border border-gray-400 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <a href="{{route('gcash2')}}">
            <button class="w-80 h-12 bg-blue-600 text-white rounded-full shadow-lg border border-blue-400 mt-20">NEXT</button>
            </a>
            </div>

        </div>

        </div>
   </div>
   <div class="flex h-screen justify-center mt-52">
   <h1 class="">Don't have a GCASH account? <a href="" class="text-blue-600">Register Now!</a></h1>
</div>
</body>
</html>
