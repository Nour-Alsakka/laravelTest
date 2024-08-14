@extends('site.layout')
@section('content')
    <div class="container" style="padding-top: 100px">

        <h4 class="text-capitalize text-center">Product about {{ $category->name }}</h4>
        <div class="row p-0 mb-3">
            @foreach ($category_products as $product)
                <div class="card col-4 p-2 m-2">
                    <img style="width:100%; height: 200px; object-fit: cover;margin-bottom:10px; border-radius: 10px"
                        src="{{ url('storage/media/' . $product->image) }}">
                    <h6>
                        <a href="{{ url('details/' . $product->id) }}">
                            {{ $product->title }}
                        </a>
                    </h6>
                    <span class="mx-4 " style="font-size: 12px;color:#777">
                        added at: {{ $product->created_at }}
                    </span>
                    {{-- <h5>{{ $product->title }}</h5> --}}
                </div>
            @endforeach
        </div>
    </div>
@endsection
