@push('styles')
	<link rel="stylesheet" href="{{ asset('assets/css/section4.css') }}">
@endpush

@php
	$services = [
		[
			'title' => 'Ekosistem Data',
			'description' => 'Di Jawa Barat, data menjadi fondasi layanan publik. Ekosistem Data Jabar membantu integrasi dan kolaborasi lintas instansi.',
			'href' => '#',
			'icon' => 'data_usage',
			'accent' => 'sky',
		],
		[
			'title' => 'Portal Jabarprov.go.id',
			'description' => 'Portal informasi resmi Pemerintah Provinsi Jawa Barat dengan update layanan, berita, dan agenda terkini.',
			'href' => '#',
			'icon' => 'public',
			'accent' => 'amber',
		],
		[
			'title' => 'Sapawarga',
			'description' => 'Aplikasi terintegrasi untuk kebutuhan layanan publik digital Jawa Barat, mulai dari pengaduan hingga informasi daerah.',
			'href' => '#',
			'icon' => 'chat_bubble',
			'accent' => 'teal',
		],
		[
			'title' => 'Desa Digital',
			'description' => 'Program untuk mempersempit kesenjangan digital melalui penguatan ekosistem layanan dan literasi di desa.',
			'href' => '#',
			'icon' => 'wifi',
			'accent' => 'emerald',
		],
		[
			'title' => 'Sadarka Jabar',
			'description' => 'Satu Data Terpadu Keluarga Jawa Barat untuk meningkatkan ketepatan intervensi dan kesejahteraan warga.',
			'href' => '#',
			'icon' => 'groups',
			'accent' => 'sun',
		],
		[
			'title' => 'Jabar Command Center',
			'description' => 'Pusat visualisasi dan integrasi data Jawa Barat yang membantu pengambilan keputusan lebih cepat dan tepat.',
			'href' => '#',
			'icon' => 'space_dashboard',
			'accent' => 'indigo',
		],
		[
			'title' => 'Jabar Saber Hoaks',
			'description' => 'Unit kerja pengendali disinformasi dengan kanal edukasi dan klarifikasi informasi publik.',
			'href' => '#',
			'icon' => 'verified',
			'accent' => 'rose',
		],
		[
			'title' => 'CSIRT Jabar',
			'description' => 'Computer Security Incident Response Team (CSIRT) yang menjaga keamanan siber dan ketahanan layanan digital.',
			'href' => '#',
			'icon' => 'shield',
			'accent' => 'featured',
		],
		[
			'title' => 'Citarum Harum',
			'description' => 'Program pengendalian dan pemulihan Citarum berbasis kolaborasi dan pemantauan terpadu.',
			'href' => '#',
			'icon' => 'water_drop',
			'accent' => 'purple',
		],
	];
@endphp

<section class="s4-section">
	<div class="s4-container">
		<div class="s4-heading">
			<div class="s4-heading-text">
				<p class="s4-kicker">Layanan Digital</p>
				<h2 class="s4-title">Daftar Layanan, Aplikasi, dan Program</h2>
				<p class="s4-subtitle">
					Rangkuman ekosistem layanan digital dan program strategis yang dapat diakses publik.
				</p>
			</div>
			<a class="s4-all" href="#">
				Lihat Semua
				<span class="material-icons-round">arrow_forward</span>
			</a>
		</div>

		<div class="s4-grid">
			@foreach ($services as $service)
				<article class="s4-card {{ $service['accent'] === 'featured' ? 'is-featured' : '' }} s4-accent-{{ $service['accent'] }}">
					<div class="s4-card-top">
						<div class="s4-icon">
							<span class="material-symbols-outlined">{{ $service['icon'] }}</span>
						</div>
					</div>
					<h3 class="s4-card-title">{{ $service['title'] }}</h3>
					<p class="s4-card-desc">{{ $service['description'] }}</p>
					<a class="s4-card-link" href="{{ $service['href'] }}">
						Selengkapnya
						<span class="material-icons-round">arrow_forward</span>
					</a>
					<span class="s4-dots" aria-hidden="true"></span>
				</article>
			@endforeach
		</div>
	</div>
</section>
