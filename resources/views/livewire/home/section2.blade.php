@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/section2.css') }}">
@endpush

<section class="s2-section">
    <div class="s2-container">
        <!-- Section Header -->
        <div class="s2-header">
            <h2 class="s2-title">Layanan Populer & Unggulan</h2>
            <p class="s2-subtitle">Berbagai layanan administratif yang sering diakses oleh masyarakat. Kami hadir untuk memberikan kemudahan proses perizinan Anda.</p>
        </div>

        <!-- Services Grid -->
        <div class="s2-grid">
            <!-- Service Item 1 -->
            <div class="s2-card blue">
                <div class="s2-icon-wrapper">
                    <span class="material-icons-round text-3xl">assignment_turned_in</span>
                </div>
                <h3 class="s2-card-title">Perizinan Berusaha (OSS)</h3>
                <p class="s2-card-desc">
                    Layanan pendaftaran dan penerbitan legalitas izin usaha secara online yang terintegrasi untuk berbagai sektor.
                </p>
                <a href="#" class="s2-card-link">
                    Mulai Daftar Biasa
                    <span class="material-icons-round">arrow_forward</span>
                </a>
            </div>

            <!-- Service Item 2 -->
            <div class="s2-card emerald">
                <div class="s2-icon-wrapper">
                    <span class="material-icons-round text-3xl">business</span>
                </div>
                <h3 class="s2-card-title">Perizinan Non Berusaha</h3>
                <p class="s2-card-desc">
                    Pelayanan yang memfasilitasi perizinan sektor tertentu dan rekomendasi teknis wilayah administrasi setempat.
                </p>
                <a href="#" class="s2-card-link">
                    Lihat Layanan
                    <span class="material-icons-round">arrow_forward</span>
                </a>
            </div>

            <!-- Service Item 3 -->
            <div class="s2-card orange">
                <div class="s2-icon-wrapper">
                    <span class="material-icons-round text-3xl">headset_mic</span>
                </div>
                <h3 class="s2-card-title">Layanan Pengaduan</h3>
                <p class="s2-card-desc">
                    Sampaikan keluhan, aspirasi, maupun permintaan informasi dengan fitur pengaduan masyarakat terpadu.
                </p>
                <a href="#" class="s2-card-link">
                    Buat Laporan
                    <span class="material-icons-round">arrow_forward</span>
                </a>
            </div>
        </div>

        <!-- Action Button -->
        <div class="s2-action">
             <a href="#" class="s2-btn">
                Lihat Semua Layanan
            </a>
        </div>
    </div>
</section>
