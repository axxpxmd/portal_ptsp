@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/section1.css') }}">
@endpush

<section class="home-hero">
    <div class="home-hero__frame">
        <div class="home-hero__bg" style="background-image: url('{{ asset('images/bg1.webp') }}');"></div>

        <div class="home-hero__content home-hero__content--center">
            <!-- Tampilan 1 -->
            <div class="hero-slider-wrap">
                <div class="hero-slider__intro">
                    <h1 class="hero-slider__title display-font">Digitalisasi 'Babarengan' Ngawangun Jabar Istimewa</h1>
                    <p class="hero-slider__subtitle">Selamat Datang di Website Resmi Dinas PMPTSP Provinsi Jawa Barat</p>
                </div>

                <div class="hero-slider" data-hero-slider>
                    <div class="hero-slider__viewport">
                        <figure class="hero-slider__slide" data-hero-slide>
                            <img src="{{ asset('images/slider/bg (1).jpg') }}" alt="Maklumat Pelayanan" class="hero-slider__image">
                        </figure>
                        <figure class="hero-slider__slide" data-hero-slide>
                            <img src="{{ asset('images/slider/bg (2).png') }}" alt="Layanan Tatap Muka" class="hero-slider__image">
                        </figure>
                        <figure class="hero-slider__slide" data-hero-slide>
                            <img src="{{ asset('images/slider/bg (3).png') }}" alt="Realisasi Investasi" class="hero-slider__image">
                        </figure>
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
            </div>

            <!-- Tampilan 2 -->
            <div>
                {{--  --}}
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
