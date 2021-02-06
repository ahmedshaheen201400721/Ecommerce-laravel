<div class=" bg-gray-100 py-4 px-6 flex mt-8">
    <div class="w-1/2">
        Payment terms are usually stated on the invoice. These may specify that the buyer has a maximum number of days in which to pay and is sometimes offered a discount if paid before the due date.
    </div>
    <div class="w-1/2 text-center">
        <div class="flex justify-between text-xl">
            <div class="ml-32">subtotal</div>
            <div>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</div>
        </div>

        <div class="flex justify-between text-xl">
            <div class="ml-32">tax</div>
            <div>{{\Gloudemans\Shoppingcart\Facades\Cart::tax()}}</div>
        </div>

        <div class="flex justify-between font-bold text-2xl">
            <div class="ml-32">total</div>
            <div>{{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</div>
        </div>
    </div>
</div>
