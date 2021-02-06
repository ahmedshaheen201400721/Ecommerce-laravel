<div class="w-3/4 mx-auto mt-12">
    <div class="font-bold text-2xl mb-6"> 3 items in shopping cart</div>

    @foreach(range(1,4) as $product)
    <div class="flex h-24 justify-center items-center border-t border-black mt-4 last:border-b ">
        <div class="w-3/12"><img class="h-20" src="{{asset('storage/product.jpeg')}}" alt=""></div>
        <div class="w-5/12">
            <div class="font-bold ">mac book</div>
            <div class="text-gray-600">16 inch, 1TB, core i3</div>
        </div>

        <div class="w-2/12">
            <a href="">remove</a><br>
            <a href="">save for later</a>
        </div>
        <div class="w-2/12">$188</div>
    </div>
    @endforeach


</div>

<div class=" w-3/4 mx-auto mb-6 mt-12">
    <div class="font-bold text-6xl">similiar product</div>



    </div>
</div>
