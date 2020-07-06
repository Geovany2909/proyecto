<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Inicio</title>
    <link rel="stylesheet" href="{{ asset('inicio/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('inicio/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('inicio/css/style.css') }}">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.8/fullpage.min.css">
</head>
<body>

    <div id="fullpage">
        @include('layouts.navbar')
        <div>@yield('content')</div>
        @include('layouts.footer')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.8/fullpage.extensions.min.js"></script>
    <script>
        const fp = new fullpage('#fullpage', {
            navigation: true
        , });

    </script>
</body>
</html>
