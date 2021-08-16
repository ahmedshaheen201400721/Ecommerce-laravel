<div class="mx-auto w-3/4 flex mt-12">
    <div class="capitalize w-2/12">
        <div class="w-full">
            <div class="text-lg font-extrabold ">by category</div>
            @foreach($categories as $category)
            <div><a href="{{route('shop.index',['category'=>$category->slug])}}">{{$category->name}}</a></div>
            @endforeach

        </div>
        <div>
            <div class="text-lg font-extrabold"> By price</div>
            <a class=" hover:underline" href="{{route('shop.index',['category'=>$name,'price1'])}}">
                <div >0-700$</div>
            </a>
            <a class=" hover:underline" href="{{route('shop.index',['category'=>$name,'price2'])}}">
                <div>700$-2500$</div>
            </a>
            <a class=" hover:underline" href="{{route('shop.index',['category'=>$name,'price3'])}}">
                <div>2500&+</div>
            </a>
        </div>
    </div>

<div class="w-10/12">
    @isset($name)
        <div class="flex items-baseline">
            <div class="text-4xl font-bold mb-6 w-1/2">{{$name}}</div>
            <div class="flex justify-around w-1/2 text-blue-400">
                <a class="block hover:underline" href="{{route('shop.index',['category'=>$name,'order'=>'desc'])}}">most expensive</a>
                <a class="block hover:underline" href="{{route('shop.index',['category'=>$name,'order'=>'asc'])}}">cheapest</a>
            </div>

        </div>
    @else
        <div class="flex justify-around w-1/2 text-blue-400">
            <a class="block hover:underline" href="{{route('shop.index',['category'=>request()->name,'order'=>'desc'])}}">most expensive</a>
            <a class="block hover:underline" href="{{route('shop.index',['category'=>request()->name,'order'=>'asc'])}}">cheapest</a>
        </div>
    @endisset
        <div class="grid md:grid-cols-3 grid-cols-1 gap-4 mx-auto  border p-4 ">

            @forelse($products as $product)

                <div class="card1 rounded-lg overflow-hidden m-4 ">
                    <a href="{{route('shop.product',$product->slug)}}">
                        <div class="bg-gray-900 relative pb-2/3 bg-blue-400" style="padding-bottom: 66%">
                            <img class="h-full w-full ri shadow hover:shadow-2xl absolute  object-cover object-center" src="{{asset($product->image)}}" alt="">
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
            @empty
                <div class="px-8 py-4 bg-gray-700 text-white text-3xl">no product found</div>
            @endforelse

        </div>
    <div class="my-8 p-4"> {{$products->links()}}</div>

</div>

</div>


