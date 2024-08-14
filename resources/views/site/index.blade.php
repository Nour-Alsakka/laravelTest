@extends('site.layout')
@section('content')
    <div id="content" class="container" style="padding-top: 68px">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row p-0 m-0">
            <h2 class="text-center my-4">Welcome to our Store</h2>
            @foreach ($products as $product)
                <div class="card col-4 p-2 m-2">
                    <img style="width:100%; height: 200px; object-fit: cover;margin-bottom:10px; border-radius: 10px"
                        src="{{ url('storage/media/' . $product->image) }}">
                    <h6>
                        <a href="{{ url('details/' . $product->id) }}">
                            {{ $product->title }}
                        </a>
                    </h6>

                    {{-- <h5>{{ $product->title }}</h5> --}}
                </div>
            @endforeach
        </div>
    </div>
@endsection
