<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    @yield('stylefirst')
    @vite(['resources/scss/app.scss','resources/scss/themes/dark/app-dark.scss'])
    <link rel="shortcut icon" href="{{asset('/assets/static/images/logo/favicon.svg')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('/assets/static/images/logo/favicon.png') }}" type="image/png">
    @yield('styles')
    @vite('resources/scss/iconly.scss')
</head>

<body>

@include('sweetalert::alert',['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@11"])
@vite('resources/js/initTheme.js')
<div id="app">
    <div id="main-order" class='layout-navbar navbar-fixed'>
        <header>
            <nav class="navbar navbar-expand navbar-light navbar-top">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                        <a class="px-4" href="{{route('landingpage')}}"><span class="h2">Sewa Dikita</span></a>
                        @if(Auth::guest())
                            <div>
                                <a href="{{route('login')}}">
                                    <button type="button" class="btn btn-light">Log In</button>
                                </a>
                                <a href="{{route('signup')}}">
                                    <button type="button" class="btn btn-dark">Sign Up</button>
                                </a>
                            </div>
                        @else
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600">{{auth()->user()->name}}</h6>
                                            <p class="mb-0 text-sm text-gray-600">{{auth()->user()->role}}</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="{{asset('/assets/static/images/faces/1.jpg')}}">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                                    style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Hello, {{auth()->user()->name}}!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                            Settings</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                            Wallet</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="{{route('logout')}}" method="post">@csrf
                                            <button class="dropdown-item" type="submit"><i
                                                    class="icon-mid bi bi-box-arrow-left me-2"></i>
                                                Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endif

                    </div>
                </div>
            </nav>
        </header>
        <div id="main-content" >
            @yield('content')
        </div>
    </div>
</div>
<script src="{{ asset('/assets/static/js/components/dark.js') }}"></script>
<script src="{{asset('/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
@vite('resources/js/app.js')
@yield('scripts')
</body>

</html>
