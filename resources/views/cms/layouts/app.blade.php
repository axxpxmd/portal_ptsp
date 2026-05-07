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
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://unpkg.com/lucide@latest"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Inter', 'ui-sans-serif', 'system-ui'],
                        },
                        colors: {
                            cms: {
                                blue: '#0164CA',
                                canvas: '#F3F4F6',
                                line: '#E6E8EC',
                            },
                        },
                    },
                },
            };
        </script>
        @stack('styles')
    </head>
    <body class="bg-cms-canvas font-sans text-neutral-900 antialiased">
        <div class="min-h-screen">
            @include('cms.layouts.partials.sidebar')

            <div id="cms-overlay" class="fixed inset-0 z-30 hidden bg-black/30 lg:hidden"></div>

            <div id="cms-shell" class="min-h-screen transition-[padding] duration-300 lg:pl-64">
                @include('cms.layouts.partials.topbar')

                <main class="p-5 md:p-7">
                    @yield('content')
                </main>
            </div>
        </div>

        <script>
            (() => {
                const sidebar = document.getElementById('cms-sidebar');
                const shell = document.getElementById('cms-shell');
                const overlay = document.getElementById('cms-overlay');
                const toggle = document.getElementById('sidebar-toggle');

                const setSidebarOpen = (isOpen) => {
                    const isDesktop = window.innerWidth >= 1024;

                    sidebar.style.transform = isOpen ? 'translateX(0)' : 'translateX(-100%)';
                    shell.style.paddingLeft = isDesktop && isOpen ? '16rem' : '0';
                    overlay.classList.toggle('hidden', !isOpen || isDesktop);
                    toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
                };

                toggle.addEventListener('click', () => {
                    const isOpen = toggle.getAttribute('aria-expanded') !== 'true';
                    setSidebarOpen(isOpen);
                });

                overlay.addEventListener('click', () => setSidebarOpen(false));

                window.addEventListener('resize', () => {
                    setSidebarOpen(window.innerWidth >= 1024);
                });

                setSidebarOpen(window.innerWidth >= 1024);

                if (window.lucide) {
                    window.lucide.createIcons();
                }
            })();
        </script>
        @stack('scripts')
    </body>
</html>
