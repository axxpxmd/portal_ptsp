<header class="site-header">
    <div class="header-inner">
        <div class="header-brand">
            {{-- <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-white/80 shadow-[0_10px_20px_rgba(5,34,56,0.18)]"> --}}
                <img src="{{ asset('images/logo/ptsp.png') }}" alt="Logo DPMPTSP" class="header-logo">
            {{-- </div> --}}
            <div class="header-title">
                <span class="header-title-main">dpmptsp</span>
                <span class="header-title-sub">Tangerang Selatan</span>
            </div>
        </div>

        <button class="nav-toggle" type="button" aria-label="Buka menu" aria-expanded="false" aria-controls="primary-navigation">
            <span class="nav-toggle__icon" aria-hidden="true"></span>
        </button>

        <nav class="header-nav" id="primary-navigation" aria-label="Primary">
            <ul class="nav-list">
                @include('layouts.partials.header-menu-items', [
                    'menus' => $headerMenus ?? collect(),
                    'depth' => 0,
                ])
            </ul>
        </nav>
    </div>
</header>

<script>
    (() => {
        const header = document.querySelector('.site-header');
        if (!header) {
            return;
        }

        const toggle = header.querySelector('.nav-toggle');
        const nav = header.querySelector('#primary-navigation');

        if (toggle && nav) {
            toggle.addEventListener('click', () => {
                const isOpen = header.classList.toggle('nav-open');
                toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
            });
        }

        const childLinks = header.querySelectorAll('.nav-item.has-children > a');
        childLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                if (window.innerWidth <= 1024) {
                    e.preventDefault();
                    link.parentElement.classList.toggle('is-open');
                }
            });
        });
    })();
</script>
