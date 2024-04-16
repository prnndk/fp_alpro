<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
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
    <livewire:landing-page/>
</div>
<script src="{{ asset('/assets/static/js/components/dark.js') }}"></script>
<script src="{{asset('/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
@vite('resources/js/app.js')
@yield('scripts')
</body>

</html>
