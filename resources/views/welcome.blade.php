@extends('app')

@section('title', 'DPMPTSP - ' . config('app.name', 'Portal PTSP'))

@section('content')
    <section class="w-full">
        <div class="relative h-[65vh] min-h-[360px] w-full overflow-hidden">
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/bg1.webp') }}');"></div>

            <div class="relative z-10 mx-auto flex h-full w-full max-w-[1200px] flex-col items-start justify-center gap-8 px-6 py-10 lg:flex-row lg:items-center lg:justify-between">
                <aside class="flex w-full max-w-[320px] flex-col gap-5 rounded-[18px] border border-white/10 bg-[linear-gradient(155deg,_rgba(8,32,41,0.98)_0%,_rgba(6,26,34,0.9)_100%)] p-7 text-white shadow-[0_20px_35px_rgba(3,15,20,0.4)] animate-float-in">
                    <div class="space-y-3">
                        <div class="font-display text-[32px] uppercase leading-none tracking-[0.06em]">
                            Capaian <span class="block text-[38px] text-[#59f0ff]">Investasi</span>
                        </div>
                        <div class="text-[11px] uppercase tracking-[0.18em] text-white/75">Di Kota Tangerang Selatan</div>
                    </div>
                    <a href="#" class="inline-flex w-fit items-center rounded-full bg-[#ffc107] px-4 py-2 text-[13px] font-bold text-[#0b1a22] shadow-[0_8px_18px_rgba(18,14,1,0.3)]">Lihat Selengkapnya</a>
                </aside>

                <div class="text-white animate-rise-in">
                    <h1 class="font-display text-[clamp(36px,6vw,64px)] uppercase tracking-[0.06em]">DPMPTSP</h1>
                    <p class="mt-2 max-w-[480px] text-[17px] leading-relaxed text-white/85">Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</p>
                    <span class="mt-4 inline-flex items-center rounded-full border border-white/20 bg-[rgba(6,42,91,0.7)] px-4 py-2 text-[13px] font-semibold tracking-[0.02em]">Kota Tangerang Selatan</span>
                    <div class="mt-4 flex items-center gap-3" aria-label="Social media">
                        <a href="#" class="grid h-9 w-9 place-items-center rounded-full border border-white/35 bg-white/10 text-[12px] font-bold uppercase tracking-[0.06em]" aria-label="Instagram">IG</a>
                        <a href="#" class="grid h-9 w-9 place-items-center rounded-full border border-white/35 bg-white/10 text-[12px] font-bold uppercase tracking-[0.06em]" aria-label="TikTok">TT</a>
                        <a href="#" class="grid h-9 w-9 place-items-center rounded-full border border-white/35 bg-white/10 text-[12px] font-bold uppercase tracking-[0.06em]" aria-label="YouTube">YT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
