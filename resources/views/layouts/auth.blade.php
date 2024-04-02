<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @vite([
        "resources/scss/app.scss",
        "resources/scss/themes/dark/app-dark.scss",
        "resources/scss/pages/auth.scss"
    ])
    <link rel="shortcut icon" href="{{ asset('assets/static/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/static/images/logo/favicon.png') }}" type="image/png">
</head>

<body>
@vite('resources/js/initTheme.js')
<div id="auth">
    @yield('content')
</div>
</body>

</html>
