@extends('layouts.main')

@section('content1')
    {{menu('header','components.navbar')}}

    {{--    @include('components.navbar')--}}
    @include('components.header')
@endsection

@section('content2')
    @include('components.products')
@endsection
