<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'DPMPTSP - ' . config('app.name', 'Portal'))</title>

        <link rel="icon" href="{{ asset('images/logo/ptsp.png') }}" type="image/png">
        <link rel="apple-touch-icon" href="{{ asset('images/logo/ptsp.png') }}">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" >

        <!-- Material Icons (used in multiple pages) -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet" />

        <!-- FontAwesome Icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="{{ asset('assets/css/util.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/header.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/footer.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/breadcrumb.css') }}">

        @stack('styles')
    </head>
    <body class="app-body">
        <div class="app-shell">
            @include('layouts.header')

            <main class="app-main app-main--constellation" style="background-color: #F2F2F2 !important;">
                <canvas id="constellation-canvas" aria-hidden="true"></canvas>
               {{ $slot }}
            </main>

            <div class="footer-decor">
                <img src="{{ asset('images/town-city-3.png') }}" alt="Tangerang Selatan City Illustration" class="footer-decor__img">
            </div>

            @include('layouts.footer')
        </div>

        @stack('scripts')

        <script>
        (function () {
            const canvas = document.getElementById('constellation-canvas');
            if (!canvas) return;
            const ctx = canvas.getContext('2d');
            const main = canvas.parentElement;

            const CONFIG = {
                particleCount: 80,
                maxDistance: 150,
                dotRadius: 2.5,
                dotColor: 'rgba(30, 140, 220, 0.65)',
                lineColor: 'rgba(30, 140, 220, ',
                speed: 0.45,
                bgColor: 'transparent',
            };

            let particles = [];
            let animId;

            function resize() {
                canvas.width  = main.offsetWidth;
                canvas.height = main.offsetHeight;
            }

            function createParticles() {
                particles = [];
                for (let i = 0; i < CONFIG.particleCount; i++) {
                    particles.push({
                        x:  Math.random() * canvas.width,
                        y:  Math.random() * canvas.height,
                        vx: (Math.random() - 0.5) * CONFIG.speed * 2,
                        vy: (Math.random() - 0.5) * CONFIG.speed * 2,
                        r:  CONFIG.dotRadius + Math.random() * 1.2,
                    });
                }
            }

            function draw() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);

                // Move + bounce
                for (const p of particles) {
                    p.x += p.vx;
                    p.y += p.vy;
                    if (p.x < 0 || p.x > canvas.width)  p.vx *= -1;
                    if (p.y < 0 || p.y > canvas.height) p.vy *= -1;
                }

                // Draw lines
                for (let i = 0; i < particles.length; i++) {
                    for (let j = i + 1; j < particles.length; j++) {
                        const dx   = particles[i].x - particles[j].x;
                        const dy   = particles[i].y - particles[j].y;
                        const dist = Math.sqrt(dx * dx + dy * dy);
                        if (dist < CONFIG.maxDistance) {
                            const alpha = (1 - dist / CONFIG.maxDistance) * 0.45;
                            ctx.beginPath();
                            ctx.strokeStyle = CONFIG.lineColor + alpha + ')';
                            ctx.lineWidth   = 0.8;
                            ctx.moveTo(particles[i].x, particles[i].y);
                            ctx.lineTo(particles[j].x, particles[j].y);
                            ctx.stroke();
                        }
                    }
                }

                // Draw dots
                for (const p of particles) {
                    ctx.beginPath();
                    ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                    ctx.fillStyle = CONFIG.dotColor;
                    ctx.fill();
                }

                animId = requestAnimationFrame(draw);
            }

            function init() {
                resize();
                createParticles();
                cancelAnimationFrame(animId);
                draw();
            }

            const ro = new ResizeObserver(function () {
                resize();
                createParticles();
            });
            ro.observe(main);

            init();
        })();
        </script>
    </body>
</html>
