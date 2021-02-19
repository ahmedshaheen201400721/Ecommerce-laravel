<div class="flex w-3/4 mx-auto mt-12">
    <div class="w-1/2">
        <img class="w-full h-60 object-cover" src="{{asset($product->image)}}" alt="" id="big">
        <div class="flex flex-wrap mt-6" >
        @isset($product->images)
                <?php $images= array_merge([$product->image],json_decode($product->images,true))?>

            @foreach($images as $image)
                        <img src="{{asset($image)}}" alt="" class="w-1/4  h-full cursor-pointer m-4 border-red-500 tobeselected ">
                @endforeach
            @endisset
                <script>
                    var big=document.getElementById('big')
                    var images=Array.from(document.querySelectorAll('.tobeselected'))
                    images[0].classList.add('chosen')
                    images.forEach(function(el){
                        el.addEventListener('mouseover',function(e){
                            big.src=el.src
                            images.forEach(function(ele){
                                ele.classList.remove('chosen')
                            })
                            el.classList.add('chosen')
                        })
                    })
                </script>
        </div>
    </div>

    <div class="w-1/2 ml-8 ">
        <div class="text-3xl font-bold mb-2">{{$product->name}}</div>
        <div class="text-gray-600 mb-2">{{$product->details}}</div>
        <div class="text-3xl font-bold mb-6">{{$product->pricing()}}</div>
        <div>{{$product->description}}</div>
        <div>
            <form action="{{route('cart.store')}}" method="post" class="inline cursor-pointer">
                @csrf
                <input class="hidden" value="{{$product->id}}" name="id"></input>
                <input class="hidden" value="{{$product->name}}" name="name"></input>
                <input class="hidden" value="{{$product->price}}" name="price"></input>
                <input class="inline-block py-3 px-4 cursor-pointer mt-4 outline-none rounded-full bg-blue-400 text-white capitalize font-bold hover:bg-blue-300" value="add to cart" type="submit"></input>
            </form>
        </div>

    </div>
</div>
@include('components.relatedproducts')
