@extends('layouts.main')

@section('content1')
    @include('layouts.navbar')
    @include('components.header')
@endsection

@section('content2')
    @include('components.products')
@endsection
