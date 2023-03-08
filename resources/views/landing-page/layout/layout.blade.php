<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('asset/Main Icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/Main Icon.png') }}">

    <style>
        body {
            overflow-y: auto !important;
        }
    </style>

    <title>Celtic Auction</title>
</head>
@php
    $route_name = Route::currentRouteName();
@endphp

<body style="overflow-y: auto !important; height:100%;">
    <div class="container">
        <div class="col my-5">
            <div class="row mb-5" id="navbar">
                <div class="col d-flex">
                    <img src="{{ asset('asset/Main Logo.png') }}" alt="" style="width: 5vw;">
                    <h5 class="my-auto ms-2 fw-semibold">Celtic Auction. Inc</h5>
                </div>
                <div class="col d-block">
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container-fluid">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav d-flex mx-auto">
                                    <li class="nav-item">
                                        <a class="nav-link @if ($route_name == 'home') active fw-semibold @endif"
                                            aria-current="page" href="{{ url('/') }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if ($route_name == 'about-us') active fw-semibold @endif"
                                            href="{{ url('/landing-page/about-us') }}">About us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link @if ($route_name == 'contact-us') active fw-semibold @endif"
                                            href="{{ url('/landing-page/contact-us') }}">Contact Us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col">
                    <div class="float-end">
                        <a href="/login" class="btn btn-primary fw-semibold">Login</a>
                        <a href="/register" class="btn btn-primary fw-semibold">Register</a>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>











        {{-- Footer --}}
        <div class="row p-5 px-2">
            <div class="col-6" style="border-right: 0.1px solid #cccccc;">
                <div class="d-inline-flex">
                    <img style="width: 4.5vw;" src="{{ asset('asset/Main Logo.png') }}" alt="">
                    <h3 class="my-auto mx-2">Celtic Auction</h3>
                </div>
                <p class="text-secondary mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum
                    aperiam
                    consequatur
                    Illum sunt perferendis voluptate omnis tempore!</p>
                <p class="mb-5" style="color: #7E7E7E">© 2022, Celtic Auction. Powered by BOT.</p>

                <div class="d-inline-flex">
                    <a href="#" class="text-light me-2 rounded-circle"
                        style="padding: 0.1vw 0.95vh; background-color: #3B579D;"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="text-light me-2 rounded-circle"
                        style="padding: 0.1vw 0.95vh; background-color: #FF0E4C;"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="text-light me-2 rounded-circle"
                        style="padding: 0.1vw 0.95vh; background-color: #1D9BF0;"><i class="fa fa-twitter"></i></a>
                </div>
            </div>
            <div class="col-6" style="border-left: 0.1px solid #cccccc;">
                <div class="row">
                    <div class="col-6 px-4 pt-2">
                        <h3 class="fw-semibold">This market</h3>
                        <ul class="list-group list-group-flush border-none">
                            <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                style="color: #7E7E7E; cursor: pointer;">
                                <a href="{{ url('/landing-page/about-us') }}" class="text-decoration-none"
                                    style="color: #7E7E7E; cursor: pointer;">About Us</a>
                            </li>
                            <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                style="color: #7E7E7E; cursor: pointer;">
                                Careers</li>
                        </ul>
                    </div>
                    <div class="col-6 px-4 pt-2">
                        <h3 class="fw-semibold">Page</h3>
                        <ul class="list-group list-group-flush border-none">
                            <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                style="color: #7E7E7E; cursor: pointer;">
                                <a class="text-decoration-none text-secondary" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                style="color: #7E7E7E; cursor: pointer;">
                                <a href="{{ url('/landing-page/about-us') }}"
                                    class="text-decoration-none text-secondary">About Us</a>
                            </li>
                            <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                style="color: #7E7E7E; cursor: pointer;">
                                <a href="{{ url('/landing-page/contact-us') }}"
                                    class="text-decoration-none text-secondary">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            
        });
    </script>
</body>

</html>
