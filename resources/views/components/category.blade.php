<div class="mx-auto w-3/4 flex mt-12">
    <div class="capitalize w-2/12">
        <div class="w-full">
            <div class="text-lg font-extrabold ">by category</div>
            <div>computer</div>
            <div>tvs</div>
            <div>fans</div>
            <div>headphones</div>
            <div>Mobiles</div>
            <div>Radios</div>
        </div>
        <div>
            <div class="text-lg font-extrabold"> By price</div>
            <div>0-700$</div>
            <div>700$-2500$</div>
            <div>2500&+</div>
        </div>
    </div>


    <div class="grid md:grid-cols-3 grid-cols-1 gap-4 mx-auto w-10/12 border p-4 ">
            @foreach($products as $product)

                <div class="card1 rounded-lg overflow-hidden m-4 ">
                    <a href="{{route('single',$product->slug)}}">
                    <div class="bg-gray-900 relative pb-2/3 bg-blue-400" style="padding-bottom: 66%">
                        <img class="h-full w-full ri shadow hover:shadow-2xl absolute  object-cover object-center" src="{{asset('storage/product.jpg')}}" alt="">
                    </div>
                    </a>
                    <div class="px-4 -mt-8 relative z-30 ">
                        <div class=" p-2 bg-white space-y-2 shadow-lg bg-white rounded-lg">
                            <div class="capitalize font-bold  text-gray-900 ">{{$product->pricing()}}</div>
                            <div class="capitalize font-bold   text-blue-600">{{$product->name}}</div>
                            <p class="text-gray-600 truncate hover:whitespace-normal hover:overflow-ellipsis ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae blanditiis delectus dignissimos explicabo inventore itaque optio qui recusandae. Doloribus, temporibus.</p>
                            <div>
                                <a href="" class="inline-block py-2 px-3 mt-4 rounded-full bg-blue-400 text-white capitalize font-bold hover:bg-blue-300"> book your laptop </a>
                            </div>
                        </div>
                    </div>

                </div>

            @endforeach
    </div>

</div>


