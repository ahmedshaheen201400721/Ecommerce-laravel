@extends('layouts.products')
@include('layouts.nav')
@section('content1')
<div class="h-screen flex justify-center items-center">
    <div class="text-black text-center">
        <div class="text-4xl font-bold">thank you for</div>
        <div class="text-4xl font-bold">Your order</div>
        <div class=" my-6 text-gray-600">conformation mail was sent</div>
        <div>
            <a href="{{url('/')}}" class="text-gray-50 inline-block p-4 rounded-lg font-bold mr-2 bg-gradient-to-l from-black to-gray-500">Home Page</a>
        </div>
    </div>
</div>
@endsection

@section('content2')
@endsection
