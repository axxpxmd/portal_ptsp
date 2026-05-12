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
            {{--  --}}
        </div>
    </div>
</div>
