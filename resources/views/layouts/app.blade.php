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

        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Poppins', 'ui-sans-serif', 'system-ui'],
                            display: ['Poppins', 'ui-sans-serif', 'system-ui'],
                        },
                        keyframes: {
                            'float-in': {
                                '0%': { transform: 'translateY(18px)', opacity: '0' },
                                '100%': { transform: 'translateY(0)', opacity: '1' },
                            },
                            'rise-in': {
                                '0%': { transform: 'translateY(20px)', opacity: '0' },
                                '100%': { transform: 'translateY(0)', opacity: '1' },
                            },
                        },
                        animation: {
                            'float-in': 'float-in 0.9s ease-out both',
                            'rise-in': 'rise-in 1s ease-out both 0.12s',
                        },
                    },
                },
            };
        </script>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="min-h-screen bg-white font-sans text-[#073348]">
        <div class="flex min-h-screen flex-col">
            @include('layouts.header')

            <main class="flex-1">
               {{ $slot }}
            </main>
        </div>
    </body>
</html>
