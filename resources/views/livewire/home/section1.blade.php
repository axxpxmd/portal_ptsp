@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/section1.css') }}">
@endpush
<section class="home-hero">
    <div class="home-hero__frame home-hero__frame--alt">
        <div class="home-hero__bg">
            <video autoplay loop muted playsinline>
                <source src="{{ asset('images/video.mp4') }}" type="video/mp4">
            </video>
        </div>

        <div class="home-hero__content home-hero__content--alt">
            <!-- Tampilan 1 -->
            {{-- <div class="hero-slider-wrap">
                <div class="hero-slider__intro">
                    <h1 class="hero-slider__title display-font" style="text-align: center">Dinas Penanaman Modal dan Pelayanan Terpadu Kota Tangerang Selatan</h1>
                    <p class="hero-slider__subtitle" style="text-align: center">Selamat Datang di Website Resmi Dinas DPMPTSP Provinsi Jawa Barat</p>
                </div>

                @php
                    $slides = [
                        [
                            'image' => 'images/slider/bg (1).jpg',
                            'alt' => 'Maklumat Pelayanan',
                            'title' => 'Maklumat Pelayanan',
                            'subtitle' => 'Komitmen pelayanan sesuai standar dan transparan.',
                            'link' => '#',
                            'cta' => 'Lihat Detail',
                        ],
                        [
                            'image' => 'images/slider/bg (2).png',
                            'alt' => 'Layanan Tatap Muka',
                            'title' => 'Layanan Tatap Muka',
                            'subtitle' => 'Jadwal operasional dan informasi layanan langsung.',
                            'link' => null,
                            'cta' => 'Lihat Detail',
                        ],
                        [
                            'image' => 'images/slider/bg (3).png',
                            'alt' => 'Realisasi Investasi',
                            'title' => 'Realisasi Investasi',
                            'subtitle' => 'Data capaian investasi dan pertumbuhan terkini.',
                            'link' => null,
                            'cta' => 'Lihat Detail',
                        ],
                    ];
                @endphp

                <div class="hero-slider" data-hero-slider>
                    <div class="hero-slider__viewport" style="margin-bottom: 40px !important">
                        @foreach ($slides as $slide)
                            <figure
                                class="hero-slider__slide"
                                data-hero-slide
                                data-title="{{ $slide['title'] }}"
                                data-subtitle="{{ $slide['subtitle'] }}"
                                data-link="{{ $slide['link'] ?? '' }}"
                                data-cta="{{ $slide['cta'] ?? 'Lihat Detail' }}"
                            >
                                <img src="{{ asset($slide['image']) }}" alt="{{ $slide['alt'] }}" class="hero-slider__image">
                            </figure>
                        @endforeach
                    </div>

                    <div class="hero-slider__meta" data-hero-meta>
                        <div class="hero-slider__meta-text">
                            <div class="hero-slider__meta-title" data-hero-title></div>
                            <div class="hero-slider__meta-subtitle" data-hero-subtitle></div>
                        </div>
                        <a href="#" class="hero-slider__meta-cta" data-hero-cta hidden>
                            Lihat Detaildd
                        </a>
                    </div>

                    <div class="hero-slider__controls">
                        <div class="hero-slider__nav">
                            <button type="button" class="hero-slider__btn" data-hero-prev aria-label="Previous slide">
                                <span class="material-symbols-outlined">chevron_left</span>
                            </button>
                            <button type="button" class="hero-slider__btn" data-hero-next aria-label="Next slide">
                                <span class="material-symbols-outlined">chevron_right</span>
                            </button>
                        </div>

                        <div class="hero-slider__progress" aria-hidden="true">
                            <span data-hero-progress></span>
                        </div>

                        <div class="hero-slider__count" aria-live="polite">
                            <span data-hero-current>01</span>
                            <span class="hero-slider__count-sep">/</span>
                            <span data-hero-total>03</span>
                        </div>
                    </div>
                </div>
            </div> --}}

            <!-- Tampilan 2 -->
            <div class="hero-alt">
                <div class="hero-alt__left">
                    <h2 class="hero-alt__title">DPMPTSP Kota Tangerang Selatan</h2>
                    <p class="hero-alt__desc">
                        Pusat layanan perizinan terpadu dan informasi penanaman modal Kota Tangerang Selatan yang mudah, cepat, transparan, dan terintegrasi.
                    </p>

                    <div class="hero-alt__social" aria-label="Social media">
                        <a href="#" class="hero-alt__social-btn" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" class="hero-alt__social-btn" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
                        <a href="#" class="hero-alt__social-btn" aria-label="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                        <a href="#" class="hero-alt__social-btn" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                </div>

                <aside class="hero-alt__weather" aria-label="Cuaca hari ini">
                    <div class="hero-alt__weather-head">
                        <i class="fa-solid fa-location-dot" style="font-size: 20px; color: #fff;"></i>
                        <div>
                            <div class="hero-alt__weather-location">{{ $weather['location'] }}</div>
                            <div class="hero-alt__weather-date">{{ $weather['day_label'] }} &bull; {{ $weather['date'] }}</div>
                        </div>
                    </div>

                    <div class="hero-alt__weather-main">
                        <i class="{{ $weather['icon'] }} hero-alt__weather-icon"></i>
                        <div class="hero-alt__weather-temp">{{ $weather['temp'] }}&deg;</div>
                    </div>

                    <div class="hero-alt__weather-status">{{ $weather['description'] }}</div>

                    <div class="hero-alt__weather-grid">
                        <div class="hero-alt__weather-item">
                            <i class="fa-solid fa-droplet"></i>
                            <div class="hero-alt__weather-label">Kelembapan</div>
                            <div class="hero-alt__weather-value">{{ $weather['humidity'] }}%</div>
                        </div>
                        <div class="hero-alt__weather-item">
                            <i class="fa-solid fa-wind"></i>
                            <div class="hero-alt__weather-label">Kec. Angin</div>
                            <div class="hero-alt__weather-value">{{ $weather['wind_speed'] }} km/h</div>
                        </div>
                        <div class="hero-alt__weather-item">
                            <i class="fa-solid fa-compass"></i>
                            <div class="hero-alt__weather-label">Arah Angin</div>
                            <div class="hero-alt__weather-value">{{ $weather['wind_direction'] }}</div>
                        </div>
                    </div>
                </aside>
            </div>

            <!-- Tampilan 3 -->
            <div>
                {{--  --}}
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        (() => {
            const slider = document.querySelector('[data-hero-slider]');
            if (!slider) {
                return;
            }

            const slides = Array.from(slider.querySelectorAll('[data-hero-slide]'));
            const prevButton = slider.querySelector('[data-hero-prev]');
            const nextButton = slider.querySelector('[data-hero-next]');
            const progress = slider.querySelector('[data-hero-progress]');
            const currentEl = slider.querySelector('[data-hero-current]');
            const totalEl = slider.querySelector('[data-hero-total]');
            const metaTitle = slider.querySelector('[data-hero-title]');
            const metaSubtitle = slider.querySelector('[data-hero-subtitle]');
            const metaCta = slider.querySelector('[data-hero-cta]');

            if (!slides.length) {
                return;
            }

            let index = 0;
            let timerId = null;

            const pad = (value) => String(value).padStart(2, '0');

            const update = (nextIndex) => {
                const total = slides.length;
                index = (nextIndex + total) % total;
                const prevIndex = (index - 1 + total) % total;
                const nextIndexValue = (index + 1) % total;

                slides.forEach((slide, i) => {
                    slide.classList.remove('is-active', 'is-prev', 'is-next', 'is-hidden');

                    if (i === index) {
                        slide.classList.add('is-active');
                        slide.setAttribute('aria-hidden', 'false');
                    } else if (i === prevIndex) {
                        slide.classList.add('is-prev');
                        slide.setAttribute('aria-hidden', 'true');
                    } else if (i === nextIndexValue) {
                        slide.classList.add('is-next');
                        slide.setAttribute('aria-hidden', 'true');
                    } else {
                        slide.classList.add('is-hidden');
                        slide.setAttribute('aria-hidden', 'true');
                    }
                });

                if (progress) {
                    progress.style.width = `${((index + 1) / total) * 100}%`;
                }

                const activeSlide = slides[index];
                const title = activeSlide?.dataset.title || '';
                const subtitle = activeSlide?.dataset.subtitle || '';
                const link = activeSlide?.dataset.link || '';
                const cta = activeSlide?.dataset.cta || 'Lihat Detail';

                if (metaTitle) {
                    metaTitle.textContent = title;
                }

                if (metaSubtitle) {
                    metaSubtitle.textContent = subtitle;
                }

                if (metaCta) {
                    if (link) {
                        metaCta.textContent = cta;
                        metaCta.setAttribute('href', link);
                        metaCta.removeAttribute('hidden');
                    } else {
                        metaCta.setAttribute('hidden', '');
                    }
                }

                if (currentEl) {
                    currentEl.textContent = pad(index + 1);
                }

                if (totalEl) {
                    totalEl.textContent = pad(total);
                }
            };

            const stopAuto = () => {
                if (timerId) {
                    clearInterval(timerId);
                    timerId = null;
                }
            };

            const startAuto = () => {
                stopAuto();
                timerId = setInterval(() => update(index + 1), 5000);
            };

            if (prevButton) {
                prevButton.addEventListener('click', () => {
                    update(index - 1);
                    startAuto();
                });
            }

            if (nextButton) {
                nextButton.addEventListener('click', () => {
                    update(index + 1);
                    startAuto();
                });
            }

            slider.addEventListener('mouseenter', stopAuto);
            slider.addEventListener('mouseleave', startAuto);
            slider.addEventListener('focusin', stopAuto);
            slider.addEventListener('focusout', startAuto);

            update(0);
            startAuto();
        })();
    </script>
@endpush
