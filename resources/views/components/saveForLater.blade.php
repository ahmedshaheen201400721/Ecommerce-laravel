<div class="w-3/4 mx-auto mt-12">

    @if($saved->count()>0)
    <div class="font-bold text-2xl mb-6"> {{$saved->count()}} items saved for later</div>
    @endif

    @forelse($saved  as $product)
        <div class="flex h-24 justify-center items-center border-t border-black mt-4 last:border-b ">
            <div class="w-3/12"><img class="h-20" src="{{image($product->model->slug)}}" alt=""></div>
            <div class="w-5/12">
                <div class="font-bold ">{{$product->name}}</div>
                <div class="text-gray-600">{{$product->model->details}}</div>
            </div>

            <div class="w-3/12 flex flex-col justify-center" >

                <form action="{{route('cart.back',$product->rowId)}}" method="post">
                    @csrf
                    <input type="submit"  value="get it back to cart" class="hover:underline cursor-pointer text-blue-500 bg-white">
                </form>

                <form action="{{route('cart.destroySaved',$product->rowId)}}" method="post" >
                    @csrf
                    @method('delete')
                    <input type="submit"  value="remove from saved cart" class="hover:underline cursor-pointer text-blue-500 bg-white">
                </form>

            </div>
            <div class="w-1/12 font-bold">{{pricing($product->price)}}</div>
        </div>
    @empty
       <div></div>
@endforelse

</div>

