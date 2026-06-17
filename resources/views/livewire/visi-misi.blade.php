@section('title', 'Visi & Misi - DPMPTSP')

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/visi-misi.css') }}">
@endpush

<div class="vm-wrapper">
    <x-breadcrumb
        :items="[
            ['label' => 'Beranda', 'url' => route('home')],
            ['label' => 'Profil Kota', 'url' => '#'],
            ['label' => 'Visi & Misi', 'url' => '#']
        ]"
        title="Visi dan Misi Kota Tangerang Selatan"
        subtitle="Pelajari visi dan misi Kota Tangerang Selatan sebagai arah pembangunan dan tujuan bersama."
        bgImage="images/bg1.webp"
    />

    <div class="content-box-wrapper">
       <div class="content-box">
            <div class="vm-content-grid">
                <div class="vm-vision vm-anim fade-in-left">
                    <span class="vm-label bg-emerald"><i class="fa-solid fa-eye"></i> Visi</span>
                    <div class="vm-vision-card">
                        <i class="fa-solid fa-quote-left vm-quote-mark"></i>
                        <h2 class="vm-vision-text">
                            "Terwujudnya Tangsel Unggul, Menuju Kota Lestari, Saling Terkoneksi, Efektif dan Efisien"
                        </h2>
                        <div class="vm-vision-decor"></div>
                    </div>
                </div>

                <div class="vm-mission vm-anim fade-in-right">
                    <span class="vm-label bg-amber"><i class="fa-solid fa-rocket"></i> Misi</span>
                    <ul class="vm-mission-list">
                        <li>
                            <div class="vm-number-box">01</div>
                            <p>Pembangunan Sumber Daya Manusia (SDM) Yang Unggul</p>
                            <i class="fa-solid fa-arrow-right-long vm-list-icon"></i>
                        </li>
                        <li>
                            <div class="vm-number-box">02</div>
                            <p>Pembangunan Infrastruktur Yang Saling Terkoneksi</p>
                            <i class="fa-solid fa-arrow-right-long vm-list-icon"></i>
                        </li>
                        <li>
                            <div class="vm-number-box">03</div>
                            <p>Membangun Kota Yang Lestari</p>
                            <i class="fa-solid fa-arrow-right-long vm-list-icon"></i>
                        </li>
                        <li>
                            <div class="vm-number-box">04</div>
                            <p>Meningkatkan Ekonomi Berbasis Nilai Tambah Tinggi Di Sektor Ekonomi Kreatif</p>
                            <i class="fa-solid fa-arrow-right-long vm-list-icon"></i>
                        </li>
                        <li>
                            <div class="vm-number-box">05</div>
                            <p>Membangun Birokrasi Yang Efektif Dan Efisien</p>
                            <i class="fa-solid fa-arrow-right-long vm-list-icon"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
