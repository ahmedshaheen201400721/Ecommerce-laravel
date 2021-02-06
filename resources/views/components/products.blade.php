<div class="mt-12 w-7/12 mx-auto text-center border-2 rounded-2xl p-8">
    <div class="text-5xl ">laravel Ecommerce</div>
    <div class="mt-4 mb-8">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio <br> est excepturi fugit libero nam neque pariatur porro unde voluptatem. Omnis?</div>

    <div class="mt-4">
        <a href="" class="p-4 rounded-lg font-bold mr-2 bg-gradient-to-l from-blue-400 to-gray-500">blogPost</a>
        <a href='' class="p-4 rounded-lg font-bold mr-2 bg-gradient-to-l from-blue-400 to-gray-500"> GitHub</a>
    </div>
</div>


<div class="grid md:grid-cols-3 grid-cols-1 gap-4 w-3/4 mx-auto mt-12 border p-4 ">
    @foreach($products as $product)

        <div class="card1 rounded-lg overflow-hidden m-4 ">
            <a href="{{route('shop.product',$product->slug)}}">
            <div class="bg-gray-900 relative pb-2/3 bg-blue-400" style="padding-bottom: 66%">
                <img class="h-full w-full ri shadow hover:shadow-2xl absolute  object-cover object-center" src="{{asset('storage/'.$product->slug.'.jpg')}}" alt="">
            </div>
            </a>
            <div class="px-4 -mt-8 relative z-30 ">
                <div class=" p-2 bg-white space-y-2 shadow-lg bg-white rounded-lg">
                    <div class="capitalize font-bold text-3xl text-gray-900 ">{{$product->pricing()}}</div>
                    <div class="capitalize font-bold   text-blue-600">{{$product->name}}</div>
                    <p class="text-gray-600 truncate hover:whitespace-normal hover:overflow-ellipsis ">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae blanditiis delectus dignissimos explicabo inventore itaque optio qui recusandae. Doloribus, temporibus.</p>
                    <div>
                        <a href="{{route('shop.product',$product->slug)}}" class="inline-block py-2 px-4 mt-4 rounded-full bg-blue-400 text-white capitalize font-bold hover:bg-blue-300"> book your laptop </a>
                    </div>
                </div>
            </div>

        </div>

    @endforeach
</div>
