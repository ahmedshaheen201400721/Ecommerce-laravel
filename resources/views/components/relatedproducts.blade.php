
<div class=" w-3/4 mx-auto mb-6 mt-12">
    <div class="font-bold text-6xl">similiar product</div>

    <div class="grid md:grid-cols-4 grid-cols-1 gap-4 mt-6 border p-4 ">
        @foreach($products as $product)

            <div class="card1 rounded-lg overflow-hidden m-2 ">
                <a href="{{route('shop.product',$product->slug)}}">
                    <div class="bg-gray-900 relative pb-2/3 bg-blue-400" style="padding-bottom: 66%">
                        <img class="h-full w-full ri shadow hover:shadow-2xl absolute  object-cover object-center" src="{{image($product->slug)}}" alt="">
                    </div>
                </a>
                <div class="px-4 -mt-8 relative z-30 ">
                    <div class=" p-2 bg-white space-y-2 shadow-lg bg-white rounded-lg">
                        <div class="capitalize font-bold  text-gray-900 ">{{$product->pricing()}}</div>
                        <div class="capitalize font-bold   text-blue-600">{{$product->name}}</div>
                        <p class="text-gray-600 truncate hover:whitespace-normal hover:overflow-ellipsis ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae blanditiis delectus dignissimos explicabo inventore itaque optio qui recusandae. Doloribus, temporibus.</p>
                        <div>
                            <a href="{{route('shop.product',$product->slug)}}" class="inline-block py-1 px-2 mt-4 rounded-full bg-blue-400 text-white capitalize font-bold hover:bg-blue-300"> add to cart </a>
                        </div>
                    </div>
                </div>

            </div>

        @endforeach
    </div>

</div>
