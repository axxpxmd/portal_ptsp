<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'DPMPTSP - ' . config('app.name', 'Portal PTSP'))</title>

        <link rel="icon" href="{{ asset('images/logo/ptsp.png') }}" type="image/png">
        <link rel="apple-touch-icon" href="{{ asset('images/logo/ptsp.png') }}">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">

        @stack('styles')
    </head>
    <body class="app-body">
        <div class="app-shell">
            @include('layouts.header')

            <main class="app-main">
               {{ $slot }}
            </main>
        </div>
    </body>
</html>
