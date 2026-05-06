@extends('app')

@section('title', 'DPMPTSP - ' . config('app.name', 'Portal PTSP'))

@section('content')
    <section class="py-7 lg:py-12">
        <div class="mx-auto w-full max-w-[1200px] px-6">
            <div class="relative overflow-hidden rounded-[18px] bg-[linear-gradient(120deg,_#20c8dc_0%,_#1083c7_52%,_#0b4a9a_100%)] p-10 shadow-[0_24px_45px_rgba(3,20,32,0.35)] lg:p-12">
                <div class="pointer-events-none absolute inset-0 opacity-35 bg-[radial-gradient(circle_at_18%_18%,_rgba(255,255,255,0.2),_transparent_45%),_radial-gradient(circle_at_80%_15%,_rgba(255,255,255,0.18),_transparent_40%),_radial-gradient(circle_at_24%_75%,_rgba(255,255,255,0.16),_transparent_45%),_repeating-linear-gradient(135deg,_rgba(255,255,255,0.12)_0,_rgba(255,255,255,0.12)_2px,_transparent_2px,_transparent_10px)]"></div>
                <div class="pointer-events-none absolute -bottom-[18%] -right-[8%] h-[130%] w-[55%] opacity-40 bg-[linear-gradient(180deg,_rgba(255,255,255,0.22)_0%,_rgba(4,25,42,0.55)_65%),_repeating-linear-gradient(90deg,_rgba(255,255,255,0.25)_0_8px,_rgba(255,255,255,0)_8px_18px)]"></div>

                <div class="relative z-10 flex flex-col gap-12 lg:flex-row lg:items-center">
                    <aside class="flex w-full max-w-[320px] flex-col gap-5 rounded-[18px] border border-white/10 bg-[linear-gradient(155deg,_rgba(8,32,41,0.98)_0%,_rgba(6,26,34,0.9)_100%)] p-7 text-white shadow-[0_20px_35px_rgba(3,15,20,0.4)] lg:w-[320px] animate-float-in">
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
        </div>
    </section>
@endsection
