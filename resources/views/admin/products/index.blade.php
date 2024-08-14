@extends('admin.layout')

@section('main')
    <a class="btn btn-secondary" href="{{ url('/dashboard/products/create') }}">
        <i class="fa-solid fa-plus-square mx-2"></i>Add Product</a>
@endsection
