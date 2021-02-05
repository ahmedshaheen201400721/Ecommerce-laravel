<div class="flex w-3/4 mx-auto mt-12">
    <div class="w-1/2">
        <img class="shadow h-full hover:shadow-2xl object-cover object-center" src="{{asset('storage/product.jpg')}}" alt="">
    </div>

    <div class="w-1/2 pl-4 ">
        <div class="text-3xl font-extrabold">Mach book</div>
        <div class="text-xl text-gray-700">
            12inch 8Giga Ram core I5
        </div>
        <div class="text-3xl font-extrabold"> 294.99$</div>
        <div class="mt-4 ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nihil, voluptatem! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, pariatur?</div>
        <div class="my-4 "> consectetur adipisicing elit. Nihil, voluptatem! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, pariatur?</div>

            <a href="" class="text-gray-50 inline-block p-4 rounded-lg font-bold mr-2 bg-gradient-to-l from-black to-gray-500">blogPost</a>

    </div>

</div>

<div class=" w-3/4 mx-auto mb-6 mt-12">
    <div class="font-bold text-6xl">similiar product</div>

    <div class="flex">
        @for($i=0;$i<4;$i++)
            <div class="card1 rounded-lg overflow-hidden m-4 ">

                <div class="bg-gray-900 relative pb-2/3 bg-blue-400" style="padding-bottom: 66%">
                    <img class="h-full w-full ri shadow hover:shadow-2xl absolute  object-cover object-center" src="{{asset('storage/product.jpg')}}" alt="">
                </div>

                <div class="px-4 -mt-8 relative z-30 ">
                    <div class=" p-2 bg-white space-y-2 shadow-lg bg-white rounded-lg">
                        <div class="capitalize font-bold  text-gray-900 ">you can buy from anywhere</div>
                        <div class="capitalize font-bold   text-blue-600">Take advantage of it</div>
                        <p class="text-gray-600 truncate hover:whitespace-normal hover:overflow-ellipsis ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae blanditiis delectus dignissimos explicabo inventore itaque optio qui recusandae. Doloribus, temporibus.</p>
                        <div>
                            <a href="" class="inline-block py-4 px-6 mt-4 rounded-full bg-blue-400 text-white capitalize font-bold hover:bg-blue-300"> book your laptop </a>
                        </div>
                    </div>
                </div>

            </div>

        @endfor

    </div>
</div>
