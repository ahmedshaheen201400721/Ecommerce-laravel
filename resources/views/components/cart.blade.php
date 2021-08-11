<div class="w-3/4 mx-auto mt-12">
   @if(session()->has('msg'))
    <div class="px-6 py-3 bg-green-200 text-green-900  my-4 font-bold rounded-lg" >
        {{session('msg')}}
    </div>
    @endif
       @if(session()->has('error'))
           <div class="px-6 py-3 bg-red-200 text-red-900  my-4 font-bold rounded-lg" >
               {{session('error')}}
           </div>
       @endif
    <div class="font-bold text-2xl mb-6"> {{$cartProducts->count()}} item(s) in shopping cart</div>


    @forelse($cartProducts  as $product)
        <div class="flex h-24 justify-center items-center border-t border-black mt-4 last:border-b ">
            <div class="w-3/12"><img class="h-20" src="{{asset($product->model->image)}}" alt=""></div>
            <div class="w-3/12">
                <div class="font-bold ">{{$product->name}}</div>
                <div class="text-gray-600">{{$product->model->details}}</div>
                <div class="text-gray-900 text-lg">quantity available <strong>{{$product->model->quantity}} items</strong></div>
            </div>
            <div class="w-2/12">
                <form action="">
                    <label for="{{$product->rowId}}"> quantity</label>
                    <select name="select-{{$product->name}}" id="{{$product->rowId}}" class="select">
                        @foreach(range(1,7) as $count)
                            <option value="{{$count}}"  @if($count==$product->qty) selected @endif>{{$count}}</option>
                        @endforeach
                    </select>
                </form>
            </div>

            <div class="w-3/12">

                <form action="{{route('cart.destroy',$product->rowId)}}" method="post" >
                    @csrf
                    @method('delete')

                    <input type="submit"  value="remove from cart" class="hover:underline cursor-pointer text-blue-500 bg-white">
                </form>

                <form action="{{route('cart.switch',$product->rowId)}}" method="post" >
                    @csrf
                    <input type="submit"  value="save for later" class="hover:underline cursor-pointer text-blue-500 bg-white">
                </form>

            </div>
            <div class="w-1/12 font-bold">{{pricing($product->price)}}</div>
        </div>

       @empty

          <div class="bg-gray-500 text-white py-2 px-4 w-1/2">
             you cart is empty
          </div>
       <div>
           <a href="{{route('shop.index')}}"  class="inline-block py-1 px-2 mt-4 rounded-full bg-blue-400 text-white capitalize font-bold hover:bg-blue-300"> go shopping</a>
       </div>
    @endforelse
@include('components.invoice')
    <div class="mt-12 flex justify-between w-1/2 mx-auto">
        <div><a href="{{route('shop.index')}}" class="px-6 py-3 border font-bold">back to shopping</a></div>
        <div><a href="{{route('charge.index')}}" class="px-6 py-3 bg-green-500 text-white">proceed to checkout</a></div>
    </div>
</div>

<script>
   var selects=document.getElementsByClassName('select')
    Array.from(selects).forEach(function(el){
        el.addEventListener('change',function(){

            axios.patch('/cart',{'value':el.value,'id':el.id}).then(function (response) {
                if(response.data.success){
                            location.reload()
                        }
                }).catch(function (error) {
                location.reload()
            });
        })
    })
</script>
@include('components.saveForLater')
@include('components.relatedproducts')
