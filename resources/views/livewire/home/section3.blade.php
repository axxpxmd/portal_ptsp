@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/section3.css') }}">
@endpush
<style>
    #gpr-kominfo-widget-header {
        height: 0px !important;
    }

    #gpr-kominfo-widget-footer {
        height: 30px !important;
    }
</style>

<section class="s3-section">
    <div class="s3-container">
        <div class="s3-grid">
            <!-- Left Column: Berita Utama -->
            <div class="s3-main-news">
                <div class="s3-section-heading">
                    <h2 class="s3-title">Berita Utama</h2>
                    <div class="s3-title-line"></div>
                </div>
                <div class="s3-carousel-wrapper">
                    <div class="s3-carousel">
                        <!-- Carousel Item -->
                        <div class="s3-carousel-inner">
                            <!-- Temporary placeholder image mimicking the design -->
                            <img src="{{ asset('images/slider/default.jpg') }}" alt="Berita Utama" class="s3-carousel-img" onerror="this.src='https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'">
                            <div class="s3-carousel-overlay">
                                <h3 class="s3-carousel-title">Bangun Keterampilan Digital Generasi Muda, Warga Pondok Karya Antusias Ikuti Pelatihan Videografi dari Pemkot Tangsel</h3>
                                <div class="s3-carousel-date">
                                    <span class="material-icons-round s3-date-icon">calendar_today</span>
                                    <span style="color: white">20 Oktober 2024</span>
                                </div>
                            </div>
                        </div>
                        <!-- Controls -->
                        <button class="s3-carousel-btn prev-btn"><span class="material-icons-round">chevron_left</span></button>
                        <button class="s3-carousel-btn next-btn"><span class="material-icons-round">chevron_right</span></button>
                    </div>
                    <!-- Pagination (Outside Image) -->
                    <div class="s3-carousel-dots">
                        <span class="s3-dot"></span>
                        <span class="s3-dot"></span>
                        <span class="s3-dot"></span>
                        <span class="s3-dot active"></span>
                        <span class="s3-dot"></span>
                    </div>
                </div>
            </div>

            <!-- Middle Column: Berita Populer & Terbaru -->
            <div class="s3-list-news">
                <!-- Berita Populer -->
                <div class="s3-news-group">
                    <div class="s3-section-heading">
                        <h2 class="s3-title">Berita Populer</h2>
                        <div class="s3-title-line"></div>
                    </div>
                    <ul class="s3-news-list">
                        <li class="s3-news-item">
                            <span class="s3-news-number">#1</span>
                            <a href="#" class="s3-news-link">RINGKASAN LAPORAN PENYELENGGARAAN PEMERINTAHAN DAERAH (LPPD) KOTA TANGERANG...</a>
                        </li>
                        <li class="s3-news-item">
                            <span class="s3-news-number">#2</span>
                            <a href="#" class="s3-news-link">Pemkot Tangsel Angkut Sampah Jalanan Secara Bertahap, Prioritaskan Titik Kritis</a>
                        </li>
                        <li class="s3-news-item">
                            <span class="s3-news-number">#3</span>
                            <a href="#" class="s3-news-link">Pemkot Tangsel Berikan Diskon PBB-P2 Awal Tahun 2026, Berlaku hingga 30 Juni</a>
                        </li>
                    </ul>
                </div>

                <!-- Berita Terbaru -->
                <div class="s3-news-group" style="margin-top: 1rem;">
                    <div class="s3-section-heading">
                        <h2 class="s3-title">Berita Terbaru</h2>
                        <div class="s3-title-line"></div>
                    </div>
                    <ul class="s3-news-list">
                        <li class="s3-news-item">
                            <span class="s3-news-number">#1</span>
                            <a href="#" class="s3-news-link">Benyamin: Target Penurunan Stunting di Tangsel Harus Dicapai dengan Intervensi Tepat</a>
                        </li>
                        <li class="s3-news-item">
                            <span class="s3-news-number">#2</span>
                            <a href="#" class="s3-news-link">Kick Off Porprov VII Banten 2026 Dimulai, Tangsel Siap Jadi Tuan Rumah 58 Cabor</a>
                        </li>
                        <li class="s3-news-item">
                            <span class="s3-news-number">#3</span>
                            <a href="#" class="s3-news-link">Pemkot Tangsel Hadirkan Taman Ciputat Timur sebagai Ruang Terbuka untuk Warga</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Right Column: Widget GPR -->
            <div class="s3-widget">
                <div class="s3-widget-container">
                    <div id="gpr-kominfo-widget-container"></div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script data-hid="gpr-kominfo" src="https://widget.komdigi.go.id/gpr-widget-kominfo.min.js" async onload="this.__vm_l=1" onerror="console.warn('GPR Widget failed to load')"></script>
@endpush
