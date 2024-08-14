<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YEP Blog</title>

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
            @if (Auth::user())
                <h5 style="background:#777;color:white;padding:4px">
                    welcome {{ Auth::user()->name }}
                </h5>
            @endif

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @foreach ($categories as $category)
                        <li class="nav-item mx-2">
                            <a class="nav-link active" aria-current="page" href="/category/{{ $category->id }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                    
                    @if (!Auth::user())
                        <li class="nav-item mx-2" style="position:absolute;right:20px"><a class="text-black"
                                href="{{ route('showRegistrationForm') }}">Signup</a></li>

                        <li class="nav-item mx-2" style="position:absolute;right:100px"><a class="text-black"
                                href="{{ route('showLoginForm') }}">login</a></li>
                    @endif
                </ul>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>


    @yield('main')


</body>

</html>
