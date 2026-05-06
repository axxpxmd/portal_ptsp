<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'DPMPTSP - ' . config('app.name', 'Portal PTSP'))</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

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
    <body class="min-h-screen bg-[radial-gradient(circle_at_top,_#d6f6fb_0%,_#bfeef5_35%,_#9cd6ee_70%,_#84c1e8_100%)] font-sans text-[#073348]">
        <div class="flex min-h-screen flex-col">
            @include('partials.header')

            <main class="flex-1">
                @yield('content')
            </main>
        </div>
    </body>
</html>
