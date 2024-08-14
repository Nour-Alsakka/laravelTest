<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YEP product</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    @yield('cssAndJs')
</head>

<body>
    <nav class="navbar  navbar-expand-lg fixed-top " style="background-color:#eee">
        <div class="container ">
            <a class="navbar-brand mx-5" href="{{ url('/') }}"><img class="img-fluid " style="width: 50px"
                    src="{{ asset('images/logo.png') }}"></a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @foreach ($categories as $category)
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="/category/{{ $category->id }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>



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




</body>

</html>
