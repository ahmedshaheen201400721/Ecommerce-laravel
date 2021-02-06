@extends('layouts.products')
@include('layouts.nav')
@section('content1')
    <div class="p-4 bg-gray-200 text-gray-900 ">
        Home
        <svg class=" inline w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
        shopping Cart
    </div>

@endsection

@section('content2')
    @include('components.single')
@endsection
