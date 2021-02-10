@extends('layouts.products')
@include('components.nav')
@section('content1')
    <div class="bg-white text-6xl  mt-6 mb-4 ">
     <p class="border-t-2 border-black text-black inline-block border-b-2"> checkout</p>
    </div>

@endsection

@section('content2')
        <div class="flex w-3/4 mx-auto">
            <div class="w-1/2 ">
               <div class="mb-6"> billing details</div>
                <form action="{{route('charge.post')}}" method="post" id="payment-form" class="mt-12 w-2/3">
                    @csrf
                    <label for="card-holder-name" class="block">card Holder name</label>
                    <input type="text" name="card-holder-name" id="card-holder-name" placeholder="card Holder name" class="rounded-lg" >
                    <div class="form-row my-4">
                        <label for="card-element my-2">
                            Credit or debit card
                        </label>
                        <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display Element errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>

                    <button id="card-button" class="px-4 py-2 shadow hover:shadow-xl inline-block rounded text-white bg-gray-800">Submit Payment</button>
                </form>
            </div>
            <div class="w-1/2">
                <div class="w-3/4">
                    <div class="font-bold text-2xl mb-4">Your Order</div>
                    @foreach($cartProducts as $product)
                        <div class="flex my-2 border-t border-gray-900 py-2">
                            <div class="w-2/12 flex items-center"><img class="h-15" src="{{asset('storage/'.$product->model->slug.'.jpg')}}" alt=""></div>
                            <div class="w-8/12 text-center">
                                <p>{{$product->name}}</p>
                                <p>{{$product->model->details}}</p>
                                <p>{{$product->model->pricing()}}</p>
                            </div>
                            <div class="w-2/12 items-center flex">
                                {{$product->qty}}
                            </div>
                        </div>
                    @endforeach
                    <div class="border-b border-t py-2  my-2 border-green-900 ">
                        <div class="w-3/4">
                            <div class="flex justify-between ">
                                <div>subtotal</div>
                                <div>{{\Gloudemans\Shoppingcart\Facades\Cart::subtotal()}}</div>
                            </div>

                            <div class="flex justify-between">
                                <div>tax</div>
                                <div>{{\Gloudemans\Shoppingcart\Facades\Cart::tax()}}</div>
                            </div>

                            <div class="flex justify-between border-t border-gray-900">
                                <div>total</div>
                                <div>{{\Gloudemans\Shoppingcart\Facades\Cart::total()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            var stripe = Stripe('pk_test_51IIWk8BnCqRQlFTDr9ls2wm0UOoCCLs6h7c0BfI16195FitQw1VG3SUzswZZqKOj5Bbfhppobc5K326HqMyjk13r00fPdwdp8Y')
            var elements = stripe.elements();
            var form = document.querySelector('form');
            var style = {
                base: {
                    // Add your base input styles here. For example:
                    fontSize: '16px',
                    color: '#32325d',
                },
            };
            let card = elements.create('card', { style: style });
            card.mount('#card-element');

            ///////////////////////////////////////////////////////////////////////////////////////////
            var cardHolderName = document.getElementById('card-holder-name');

            form.addEventListener('submit', async function(event) {
                event.preventDefault()
                const { paymentMethod, error } = await stripe.createPaymentMethod(
                    'card', card, {
                        billing_details: { name: cardHolderName.value }
                    }
                );
                if (error) {
                    // Display "error.message" to the user...
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = error.message;
                } else {
                    // The card has been verified successfully...
                    // console.log(paymentMethod);
                    stripeTokenHandler(paymentMethod);

                }
            });

            function stripeTokenHandler(paymentMethod) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'paymentMethodId');
                hiddenInput.setAttribute('value', paymentMethod.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();

            }
        </script>

@endsection
