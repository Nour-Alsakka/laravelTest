@extends('admin.layout')

@section('cssAndJs')
    {{-- <link rel="stylesheet" href="{{ asset('filepond/filepond.min.css') }}">
    <script src="{{ asset('filepond/filepond.min.js') }}"></script> --}}
@endsection

@section('main')
    @if ($errors->any())
        <ol>
            @foreach ($errors->all() as $error)
                <li style="color: red;font-size: 28px">{{ $error }}</li>
            @endforeach
        </ol>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header text-center">
                <h5>Add New Product</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Product Title</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>

                <div class="mb-3">
                    <label for="desc" class="form-label">Product Description</label>
                    <textarea class="form-control" name="desc" id="desc" rows="3"></textarea>
                </div>


                <div class="mb-3">
                    <label for="name" class="form-label">Product Image</label>
                    <input type="file" class="form-control" name="image" id="image">
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Product's category</label>
                    <select name="category_id" id="category_id" class="mt-2">
                        @foreach ($categories as $category)
                            <option value={{ $category->id }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-secondary w-50">Add Product</button>
                </div>
            </div>
        </div>
        </div>
    </form>

    {{-- <script>
        const inputElement = document.querySelector('input[id="image"]');
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
            server: {
                url: '/dashboard/upload',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });
    </script> --}}
@endsection
