@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/section1.css') }}">
@endpush

<section class="home-hero">
    <div class="home-hero__frame">
        <div class="home-hero__bg" style="background-image: url('{{ asset('images/bg1.webp') }}');"></div>

        <div class="home-hero__content">
            <aside class="hero-card float-in">
                <div class="hero-card__text">
                    <div class="hero-card__title display-font">
                        Capaian <span class="hero-card__title-accent">Investasi</span>
                    </div>
                    <div class="hero-card__subtitle">Di Kota Tangerang Selatan</div>
                </div>
                <a href="#" class="hero-card__cta">Lihat Selengkapnya</a>
            </aside>

            <div class="hero-text rise-in">
                <h1 class="hero-title display-font">DPMPTSP</h1>
                <p class="hero-subtitle">Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</p>
                <span class="hero-pill">Kota Tangerang Selatan</span>
                <div class="hero-social" aria-label="Social media">
                    <a href="#" class="hero-social__link" aria-label="Instagram">IG</a>
                    <a href="#" class="hero-social__link" aria-label="TikTok">TT</a>
                    <a href="#" class="hero-social__link" aria-label="YouTube">YT</a>
                </div>
            </div>
        </div>
    </div>
</section>
