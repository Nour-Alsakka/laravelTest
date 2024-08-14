@extends('site.layout')
@section('main')
    <div class="container mb-4" style="padding-top: 76px">
        <img src="{{ url('storage/media/' . $product->image) }}" alt=""
            style="width:100%;height:70vh;object-fit:cover">
        <div class="py-3">

            {{ $product->category->name }}


        </div>
        <h2 class="mb-4">{{ $product->title }}</h2>
        <p> {{ $product->desc }}</p>
    </div>
@endsection
