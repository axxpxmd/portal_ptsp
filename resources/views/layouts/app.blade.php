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
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" >

        <!-- Material Icons (used in multiple pages) -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

        <link rel="stylesheet" href="{{ asset('assets/css/util.css') }}">
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
        @stack('scripts')
    </body>
</html>
