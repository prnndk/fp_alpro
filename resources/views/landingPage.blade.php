<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    @vite(['resources/scss/app.scss' ,'resources/scss/themes/dark/app-dark.scss'])
    @livewireStyles
</head>
<body>
<nav class="navbar sticky-top navbar-light justify-content-between"
     style="background-color: #f2f7ff; padding-left: 112px; padding-right: 112px; padding-top: 12px; padding-bottom: 12px  ">
    <div class="container-fluid">
        <a class="navbar-brand " href="/">
            <img src="{{asset('/images/logo.png')}}" alt="logo" width="30" height="24">
        </a>
        <span class="navbar-brand mb-0 h1">Sewa Dikita</span>
        @if(auth()->check())
            <a href="{{route('dashboard')}}" class="btn btn-light">Dashboard</a>
        @else
        <div>
            <a href="{{route('login')}}" class="btn btn-light">Log In</a>
            <a href="{{route('register')}}" class="btn btn-dark">Sign Up</a>
        </div>
        @endif
    </div>
</nav>

<div class="container-fluid">
    <livewire:landing-page/>
</div>

@livewireScripts
</body>
</html>
