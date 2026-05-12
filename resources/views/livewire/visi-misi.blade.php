@section('title', 'Visi & Misi - DPMPTSP')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/visi-misi.css') }}">
@endpush

<div class="vm-wrapper">
    <div class="vm-container">
        <x-breadcrumb :items="[
            ['label' => 'Beranda', 'url' => route('home')],
            ['label' => 'Visi & Misi', 'url' => '#']
        ]" />

        <header class="vm-header">
            <h1 class="vm-title">Visi &amp; Misi</h1>
            <p class="vm-subtitle">Arah strategis DPMPTSP Kota Tangerang Selatan</p>
        </header>

        <div class="vm-content">
            <section class="vm-section vm-vision-section">
                <span class="vm-badge">Visi</span>
                <h2 class="vm-vision-text">
                    "Terwujudnya Tangsel Unggul, Menuju Kota Lestari, Saling Terkoneksi, Efektif dan Efisien"
                </h2>
            </section>

            <hr class="vm-divider">

            <section class="vm-section vm-mission-section">
                <span class="vm-badge">Misi</span>
                <ul class="vm-mission-list">
                    <li>
                        <span class="vm-num">01</span>
                        <p>Pembangunan Sumber Daya Manusia (SDM) Yang Unggul</p>
                    </li>
                    <li>
                        <span class="vm-num">02</span>
                        <p>Pembangunan Infrastruktur Yang Saling Terkoneksi</p>
                    </li>
                    <li>
                        <span class="vm-num">03</span>
                        <p>Membangun Kota Yang Lestari</p>
                    </li>
                    <li>
                        <span class="vm-num">04</span>
                        <p>Meningkatkan Ekonomi Berbasis Nilai Tambah Tinggi Di Sektor Ekonomi Kreatif</p>
                    </li>
                    <li>
                        <span class="vm-num">05</span>
                        <p>Membangun Birokrasi Yang Efektif Dan Efisien</p>
                    </li>
                </ul>
            </section>
        </div>
    </div>
</div>
