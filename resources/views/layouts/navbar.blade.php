<div class="flex justify-between items-center text-white p-6">
    <a href="{{route('main')}}"> <div class="text-3xl  font-extrabold"> Laravel Ecommerce</div></a>
    <div class="capitalize text-xl flex space-x-12">
        <a href="{{route('shop.index')}}" class="block ">shop</a>
        <a href="" class="block mx-">about</a>
        <a href="" class="block mx-">blog</a>
        <div>
            <a href="{{route('cart.index')}}" class=" ">card
                <p class="bg-yellow-300 w-6 h-6 inline-block text-center  rounded-full">{{\Gloudemans\Shoppingcart\Facades\Cart::instance('default')->count()}}</p>
            </a>
        </div>

    </div>

</div>
