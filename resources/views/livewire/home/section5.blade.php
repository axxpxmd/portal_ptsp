@push('styles')
	<link rel="stylesheet" href="{{ asset('assets/css/section5.css') }}">
@endpush

@php
	$awards = [
		[
			'title' => 'Inovasi Pelayanan Publik Terbaik',
			'issuer' => 'KemenPAN-RB',
			'year' => '2025',
			'category' => 'Pelayanan Publik',
			'image' => 'images/slider/images.jpg',
		],
		[
			'title' => 'Pengelolaan Data Daerah Terintegrasi',
			'issuer' => 'Pemprov Banten',
			'year' => '2024',
			'category' => 'Transformasi Digital',
			'image' => 'images/slider/images.jpg',
		],
		[
			'title' => 'Zona Integritas Menuju WBK',
			'issuer' => 'KPK RI',
			'year' => '2024',
			'category' => 'Integritas',
			'image' => 'images/slider/images.jpg',
		],
		[
			'title' => 'Penghargaan Layanan Terpadu Satu Pintu',
			'issuer' => 'DPMPTSP Banten',
			'year' => '2023',
			'category' => 'Perizinan',
			'image' => 'images/slider/images.jpg',
		],
		[
			'title' => 'Inovasi Layanan Digital Masyarakat',
			'issuer' => 'Kominfo',
			'year' => '2023',
			'category' => 'Layanan Digital',
			'image' => 'images/slider/images.jpg',
		],
		[
			'title' => 'Sertifikasi Pelayanan Prima',
			'issuer' => 'Ombudsman RI',
			'year' => '2022',
			'category' => 'Pelayanan Publik',
			'image' => 'images/slider/images.jpg',
		],
	];
@endphp

<section class="s5-section" aria-labelledby="s5-title">
	<div class="s5-container">
		<div class="s5-head">
			<div class="s5-head-text">
				<p class="s5-kicker">Prestasi</p>
				<h2 class="s5-title" id="s5-title">Penghargaan dan Piagam</h2>
				<p class="s5-subtitle">
					Daftar penghargaan yang telah diraih sebagai bentuk komitmen layanan terbaik.
				</p>
			</div>
			<div class="s5-controls" aria-label="Kontrol slider">
				<button type="button" class="s5-nav" data-award-prev aria-label="Sebelumnya">
					<span class="material-icons-round">arrow_back</span>
				</button>
				<button type="button" class="s5-nav" data-award-next aria-label="Berikutnya">
					<span class="material-icons-round">arrow_forward</span>
				</button>
			</div>
		</div>

		<div class="s5-slider" data-award-slider>
			<div class="s5-track" data-award-track>
				@foreach ($awards as $award)
					<button
						type="button"
						class="s5-card"
						data-award-card
						data-award-title="{{ $award['title'] }}"
						data-award-meta="{{ $award['issuer'] }} - {{ $award['year'] }}"
						data-award-image="{{ asset($award['image']) }}"
					>
						<div class="s5-card-image">
							<img src="{{ asset($award['image']) }}" alt="Piagam {{ $award['title'] }}">
						</div>
						<div class="s5-card-body">
							<p class="s5-card-kicker">{{ $award['category'] }}</p>
							<h3 class="s5-card-title">{{ $award['title'] }}</h3>
							<p class="s5-card-meta">{{ $award['issuer'] }} &middot; {{ $award['year'] }}</p>
							<span class="s5-card-cta">
								Lihat Piagam
								<span class="material-icons-round">open_in_new</span>
							</span>
						</div>
					</button>
				@endforeach
			</div>
		</div>
	</div>
</section>

<div class="s5-modal" data-award-modal hidden>
	<div class="s5-modal-panel" role="dialog" aria-modal="true" aria-labelledby="s5-modal-title">
		<button type="button" class="s5-modal-close" data-award-modal-close aria-label="Tutup">
			<span class="material-icons-round">close</span>
		</button>
		<div class="s5-modal-body">
			<div class="s5-modal-image">
				<img src="" alt="" data-award-modal-image>
			</div>
			<div class="s5-modal-info">
				<p class="s5-modal-kicker">Piagam</p>
				<h3 class="s5-modal-title" id="s5-modal-title" data-award-modal-title></h3>
				<p class="s5-modal-meta" data-award-modal-meta></p>
			</div>
		</div>
	</div>
</div>

@push('scripts')
	<script>
		(() => {
			const section = document.querySelector('.s5-section');
			if (!section) {
				return;
			}

			const track = section.querySelector('[data-award-track]');
			const prevButton = section.querySelector('[data-award-prev]');
			const nextButton = section.querySelector('[data-award-next]');
			const cards = section.querySelectorAll('[data-award-card]');
			const modal = document.querySelector('[data-award-modal]');
			const modalImage = modal?.querySelector('[data-award-modal-image]');
			const modalTitle = modal?.querySelector('[data-award-modal-title]');
			const modalMeta = modal?.querySelector('[data-award-modal-meta]');
			const modalClose = modal?.querySelector('[data-award-modal-close]');

			if (!track || !modal || !modalImage || !modalTitle || !modalMeta || !modalClose) {
				return;
			}

			const scrollByAmount = () => {
				const firstCard = track.querySelector('.s5-card');
				if (!firstCard) {
					return 320;
				}

				const gap = parseFloat(getComputedStyle(track).columnGap || getComputedStyle(track).gap || '0');
				return firstCard.getBoundingClientRect().width + gap;
			};

			prevButton?.addEventListener('click', () => {
				track.scrollBy({ left: -scrollByAmount(), behavior: 'smooth' });
			});

			nextButton?.addEventListener('click', () => {
				track.scrollBy({ left: scrollByAmount(), behavior: 'smooth' });
			});

			const openModal = (card) => {
				const title = card.getAttribute('data-award-title') || '';
				const meta = card.getAttribute('data-award-meta') || '';
				const image = card.getAttribute('data-award-image') || '';

				modalTitle.textContent = title;
				modalMeta.textContent = meta;
				modalImage.src = image;
				modalImage.alt = title ? `Piagam ${title}` : 'Piagam';
				modal.hidden = false;
				modal.classList.add('is-open');
				document.body.style.overflow = 'hidden';
			};

			const closeModal = () => {
				modal.classList.remove('is-open');
				modal.hidden = true;
				document.body.style.overflow = '';
			};

			cards.forEach((card) => {
				card.addEventListener('click', () => openModal(card));
			});

			modalClose.addEventListener('click', closeModal);
			modal.addEventListener('click', (event) => {
				if (event.target === modal) {
					closeModal();
				}
			});
			document.addEventListener('keydown', (event) => {
				if (event.key === 'Escape' && !modal.hidden) {
					closeModal();
				}
			});
		})();
	</script>
@endpush
