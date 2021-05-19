<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/" style="font-size: 2rem;
                font-weight: 900;
                margin-left: 0.75rem;
                color: rgb(31, 41, 55);">
                    <img src="/LOGO.png" height="32px" alt="Italian Trulli">
                    Protect Green
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <x-profile-dropdown></x-profile-dropdown>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row" style="margin-top: 1rem">
                <x-sidebar></x-sidebar>
                <div class="col-md-9">
                    @if (session('message'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <div id="carouselExampleIndicators" class="carousel slide shadow-sm px-3 pb-3 mb-3 bg-white rounded"
                        data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">

                            @foreach ($categories->pluck('apps')->flatten()->take(4) as $app)
                            <div class="carousel-item @if($loop->first) active @endif">
                                <a href="{{ route('apps.show', $app->id) }}">
                                    <img class="d-block w-100" src="{{ $app->screen_shot[0] }}" alt="Third slide"
                                        height="450px" width="400px">
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    @foreach ($categories as $category)
                    <h3 class="mt-0 d-flex" style="justify-content:space-between;">
                        <strong>{{$category->name}}</strong><a href="{{ route('categories.show', $category->id) }}"
                            class="btn btn-light" style="color: blue; border: solid 1px gray;">See
                            More...</a></h3>
                    <div class="row">
                        @foreach ($category->apps->take(4) as $app)
                        <div class="col-3">
                            <a href="{{ route('apps.show', $app->id) }}" style="text-decoration: none;color: black">
                                <div class="card" style="border-width: 0px">
                                    <img class="card-img-top" src="{{ $app->img_url }}" alt="Colorful Rubik's Cube"
                                        height="140px" width="220px">
                                    <div class="card-body">
                                        <p class="card-text" style="white-space: nowrap; 
                                        overflow: hidden;
                                        text-overflow: ellipsis;">{{ $app->name }}</p>
                                        <div class="d-flex align-items-center" style="margin-bottom: .5rem">
                                            <x-rating :rate="$app->avgRate()"></x-rating>
                                            <span style="font-weight: 500; font-size: .875"
                                                class="ml-2 text-muted">{{ $app->download_count }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        @endforeach

                    </div>
                    <div style="border-top:solid 1px #DCDCDC;" class="mt-4"></div>
                    @endforeach



                </div>

            </div>

        </div>
    </div>
</body>

</html>