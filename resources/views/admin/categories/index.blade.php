@extends('admin.layout')

@section('main')
    <a class="btn btn-secondary" href="{{ url('/dashboard/categories/create') }}">
        <i class="fa-solid fa-plus-square mx-2"></i>Add Category</a>

    <div class="card my-4">
        <div class="card-header text-center">
            <h5>Categories Table</h5>
        </div>
        <div class="card-body">

            <table id="myTable" class="display">

                <thead>
                    <tr>
                        <th scope="col">name</th>
                        {{-- <th scope="col">Actions</th> --}}
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>

                            {{-- <td>
                                <form action="{{ route('dashboard.posts.destroy', [$product->id]) }}" method="post">
                                    @csrf
                                    @method('delete')

                                    <a href="{{ url('dashboard/posts/' . $product->id . '/edit') }}"
                                        class="btn btn-success ">
                                        <i class="fa-solid fa-edit mx-2 text-white"></i>
                                    </a>

                                    <button type="submit" class="btn btn-danger ">
                                        <i class="fa-solid fa-trash mx-2 text-white"></i>
                                    </button>
                                </form>

                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <script>
        let table = new DataTable('#myTable', {
            // config options...
        });
    </script>
@endsection
