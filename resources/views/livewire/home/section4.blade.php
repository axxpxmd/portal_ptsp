@push('styles')
	<link rel="stylesheet" href="{{ asset('assets/css/section4.css') }}">
@endpush

@php
	$services = [
		[
			'title' => 'e - SKM',
			'description' => 'Survei Kepuasan Masyarakat secara Elektronik',
			'href' => '#',
			'icon' => 'analytics',
			'accent' => 'sky',
		],
		[
			'title' => 'SISUMAKER',
			'description' => 'Sistem Informasi Surat Masuk dan Keluar',
			'href' => '#',
			'icon' => 'mail',
			'accent' => 'amber',
		],
		[
			'title' => 'SIDAK LKPM',
			'description' => 'Fasilitasi & Asistensi Keliling Laporan Kegiatan Penanaman Modal',
			'href' => '#',
			'icon' => 'commute',
			'accent' => 'teal',
		],
		[
			'title' => 'JOSS',
			'description' => 'Jemput Online Single Submission',
			'href' => '#',
			'icon' => 'hail',
			'accent' => 'emerald',
		],
		[
			'title' => 'SIMPONIE',
			'description' => 'Sistem Informasi Manajemen Perizinan Online',
			'href' => '#',
			'icon' => 'description',
			'accent' => 'sun',
		],
		[
			'title' => 'D\'GITAR',
			'description' => 'Digitalisasi Identifikasi Reklame',
			'href' => '#',
			'icon' => 'campaign',
			'accent' => 'indigo',
		],
		[
			'title' => 'PENSI LKPM',
			'description' => 'Pendampingan & Asistensi Laporan Kegiatan Penanaman Modal',
			'href' => '#',
			'icon' => 'handshake',
			'accent' => 'rose',
		],
		[
			'title' => 'HALO LKPM',
			'description' => 'Helpdesk & Asistensi Online Laporan Kegiatan Penanaman Modal',
			'href' => '#',
			'icon' => 'support_agent',
			'accent' => 'featured',
		],
		[
			'title' => 'LAYANAN INVESTASI',
			'description' => 'Fasilitasi, Informasi, dan Konsultasi Kegiatan Penanaman Modal',
			'href' => '#',
			'icon' => 'trending_up',
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
