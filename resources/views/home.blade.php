<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.esm.js"></script>
    <script nomodule src="https://cdn.jsdelivr.net/npm/@ionic/core/dist/ionic/ionic.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ionic/core/css/ionic.bundle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('asset/Main Icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('asset/Main Icon.png') }}">

    <style>
        * {
            transition: 0.5px;
        }

        .borderless {
            border: none;
        }

        .main-color {
            color: #C6DE41;
        }

        .sec-color {
            color: #071C21;
        }

        .non-active-color {
            color: #525252;
        }

        .active-indicator {
            background-color: #c2c2c2;
            color: black;
            text-decoration: none;
        }

        .search-bar {
            background-image: url(https://www.kibrispdr.org/data/894/search-icon-png-2.png);
            padding-left: 40px;
            background-position: 5px;
            background-size: 10px;
            background-size: contain;
            background-repeat: no-repeat;
        }

        .remove-hover:hover {
            color: #525252;
        }

        .remove-hover-brand-name:hover {
            color: #C6DE41;
        }
    </style>
    <title>Celtic Auction </title>
</head>

<body>
    @php
        $route_name = Route::currentRouteName();
    @endphp
    <div class="containers ">
        <div class="row">
            <div class="col-2 shadow-sm"
                style="position: fixed; z-index: 1; top: 0; left: 0; width: 16vw; height: 100%;">
                <div class="sidebar m-3">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <img src="{{ asset('asset/Main Logo.png') }}" alt="" style="width: 4vw;">
                        </div>
                        <div class="col d-flex">
                            <a href="/home"
                                class="my-auto text-dark fw-semibold text-decoration-none remove-hover-brand-name cursor"
                                style="font-size: .95vw;">Celtic Auction</a>`
                        </div>
                    </div>
                    <hr class="mb-2 border-dark mt-0">

                    <ul class="list-group">
                        <li class="bg-transparent list-group-item borderless text-secondary fw-semibold">MAIN MENU</li>
                        <li
                            class="list-group-item borderless non-active-color @if ($route_name == 'home') active-indicator rounded @else bg-transparent non-active-color @endif">
                            <i class="fa fa-home text-dark" aria-hidden="true"></i><a href="/home"
                                class="text-decoration-none non-active-color remove-hover @if ($route_name == 'home') text-dark @else non-active-color @endif">
                                @if ($route_name == 'home')
                                    Home
                                @else
                                    Home
                                @endif
                            </a>
                        </li>
                        <li
                            class="list-group-item borderless non-active-color @if ($route_name == 'search') active-indicator rounded @else bg-transparent non-active-color @endif">
                            <i class="fa fa-search text-dark" aria-hidden="true"></i><a href="/search"
                                class="text-decoration-none non-active-color remove-hover @if ($route_name == 'search') text-dark @else non-active-color @endif">
                                @if ($route_name == 'search')
                                    Search
                                @else
                                    Search
                                @endif
                            </a>
                        </li>
                        <li
                            class="list-group-item borderless non-active-color @if ($route_name == 'history') active-indicator rounded @else bg-transparent non-active-color @endif @if (Auth::user()->role != 'user') d-none @endif">
                            <i class="fa fa-history text-dark" aria-hidden="true"></i><a href="/history"
                                class="text-decoration-none non-active-color remove-hover @if ($route_name == 'history') text-dark @else non-active-color @endif">
                                @if ($route_name == 'history')
                                    History
                                @else
                                    History
                                @endif
                            </a>
                        </li>
                        <li
                            class="list-group-item borderless non-active-color @if ($route_name == 'inbox') active-indicator rounded @else bg-transparent non-active-color @endif">
                            <i class="fa fa-inbox text-dark" aria-hidden="true"></i><a href="/inbox"
                                class="text-decoration-none non-active-color remove-hover @if ($route_name == 'inbox') text-dark @else non-active-color @endif">
                                @if ($route_name == 'inbox')
                                    Inbox
                                @else
                                    Inbox
                                @endif
                            </a>
                        </li>
                        <li
                            class="list-group-item borderless non-active-color @if ($route_name == 'account') active-indicator rounded @else bg-transparent non-active-color @endif @if (Auth::user()->role != 'admin') d-none @endif">
                            <i class="fa fa-user text-dark" aria-hidden="true"></i><a href="/account-pages"
                                class="remove-hover text-decoration-none @if ($route_name == 'account') text-dark @else non-active-color @endif">
                                Account</a>
                        </li>
                        <li
                            class="@if ($route_name == 'form') active-indicator rounded @else bg-transparent non-active-color @endif list-group-item borderless @if (Auth::user()->role == 'user') d-none @endif">
                            <i class="fa fa-plus-square-o text-dark" aria-hidden="true"></i>
                            <a href="/form"
                                class="remove-hover text-decoration-none @if ($route_name == 'form') text-dark @else non-active-color @endif">
                                @if ($route_name == 'form')
                                    Form
                                @else
                                    Form
                                @endif
                            </a>
                        </li>
                        <li
                            class="@if ($route_name == 'list-item') active-indicator rounded @else bg-transparent non-active-color @endif list-group-item borderless">
                            <i class="fa fa-list text-dark" aria-hidden="true"></i>
                            <a href="/list-item"
                                class="remove-hover text-decoration-none @if ($route_name == 'list-item') text-dark @else non-active-color @endif">
                                @if ($route_name == 'list-item')
                                    List Item
                                @else
                                    List Item
                                @endif
                            </a>
                        </li>
                        <li
                            class="@if ($route_name == 'stat') active-indicator rounded @else bg-transparent non-active-color @endif list-group-item borderless @if (Auth::user()->role == 'user') d-none @endif">
                            <i class="fa fa-area-chart text-dark" aria-hidden="true"></i>
                            <a href="/stat"
                                class="remove-hover text-decoration-none @if ($route_name == 'stat') text-dark @else non-active-color @endif">
                                @if ($route_name == 'stat')
                                    Data stat
                                @else
                                    Data stat
                                @endif
                            </a>
                        </li>
                    </ul>
                    <hr class="border-dark">
                    <ul class="list-group">
                        <li class="bg-transparent list-group-item borderless text-secondary fw-semibold">HELP&SUPPORT
                        </li>
                        <li class="bg-transparent list-group-item borderless non-active-color"><i
                                class="fa fa-info-circle text-dark" aria-hidden="true"></i> Help
                            & Center</li>
                        <!-- <li class="bg-transparent list-group-item borderless non-active-color"><i class="fa fa-cog"
                                aria-hidden="true"></i> Settings
                        </li> -->
                    </ul>
                    <hr class="border-light">
                    <div class="col">
                        <ul class="list-group">
                            <li class="list-group-item bg-transparent borderless d-inline-flex">
                                @if (Auth::user()->profile_photo == '')
                                    <div style="background-color: white; width: 2vw; height: 4vh;"
                                        class="rounded-circle me-2"></div>
                                @else
                                    <img class="rounded-circle me-2 shadow" src="{{ Auth::user()->profile_photo }}"
                                        alt="" style="width: 2vw; height: 4vh;">
                                @endif
                                <a href="#"
                                    class="non-active-color fw-semibold text-decoration-none remove-hover my-auto me-5"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    v-pre>{{ Auth::user()->name }}</a>
                                <a href="#"
                                    class="text-decoration-none non-active-color fw-semibold remove-hover my-auto"
                                    role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre><i class="fa fa-caret-down"></i></a>
                                <div class="col">
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('/profile') }}">
                                            {{ __('Profile') }}
                                        </a>
                                        <hr class="my-1 p-0">
                                        <a class="dropdown-item" href="{{ route('perform-logout') }}">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('perform-logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-10 p-3 px-5" style="margin-left: 16.3vw; overflow-y: auto; height: 100vh;">
                @yield('content')

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
                                style="padding: 0.1vw 0.95vh; background-color: #3B579D;"><i
                                    class="fa fa-facebook"></i></a>
                            <a href="#" class="text-light me-2 rounded-circle"
                                style="padding: 0.1vw 0.95vh; background-color: #FF0E4C;"><i
                                    class="fa fa-instagram"></i></a>
                            <a href="#" class="text-light me-2 rounded-circle"
                                style="padding: 0.1vw 0.95vh; background-color: #FF0000;"><i
                                    class="fa fa-youtube"></i></a>
                            <a href="#" class="text-light me-2 rounded-circle"
                                style="padding: 0.1vw 0.95vh; background-color: #1D9BF0;"><i
                                    class="fa fa-twitter"></i></a>
                        </div>
                    </div>
                    <div class="col-6" style="border-left: 0.1px solid #cccccc;">
                        <div class="row">
                            <div class="col-6 px-4 pt-2">
                                <h3>This market</h3>
                                <ul class="list-group list-group-flush border-none">
                                    <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                        style="color: #7E7E7E; cursor: pointer;">
                                        About Brand Name</li>
                                    <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                        style="color: #7E7E7E; cursor: pointer;">
                                        Factories</li>
                                    <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                        style="color: #7E7E7E; cursor: pointer;">
                                        Careers</li>
                                </ul>
                            </div>
                            <div class="col-6 px-4 pt-2">
                                @if (Auth::user()->role == 'user')
                                    <h3>Page</h3>
                                    <ul class="list-group list-group-flush border-none">
                                        <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                            style="color: #7E7E7E; cursor: pointer;">
                                            <a class="text-decoration-none text-secondary"
                                                href="{{ url('/home') }}">Home</a>
                                        </li>
                                        <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                            style="color: #7E7E7E; cursor: pointer;">
                                            <a href="{{ url('/list-item') }}"
                                                class="text-decoration-none text-secondary">List Item</a>
                                        </li>
                                    </ul>
                                @else
                                    <h3>Page</h3>
                                    <ul class="list-group list-group-flush border-none">
                                        <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                            style="color: #7E7E7E; cursor: pointer;">
                                            <a class="text-decoration-none text-secondary"
                                                href="{{ url('/home') }}">Home</a>
                                        </li>
                                        <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                            style="color: #7E7E7E; cursor: pointer;">
                                            <a class="text-decoration-none text-secondary"
                                                href="{{ url('/account-pages') }}">Account</a>
                                        </li>
                                        <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                            style="color: #7E7E7E; cursor: pointer;">
                                            <a class="text-decoration-none text-secondary"
                                                href="{{ url('/form') }}">Form</a>
                                        </li>
                                        <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                            style="color: #7E7E7E; cursor: pointer;">
                                            <a href="{{ url('/list-item') }}"
                                                class="text-decoration-none text-secondary">List Item</a>
                                        </li>
                                        <li class="list-group-item bg-transparent border-none border-bottom-0 px-0"
                                            style="color: #7E7E7E; cursor: pointer;">
                                            <a href="{{ url('/stat') }}"
                                                class="text-decoration-none text-secondary">Stat</a>
                                        </li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('jquery/jquery-3.6.3.min.js') }}"></script>
        <script></script>
</body>

</html>
