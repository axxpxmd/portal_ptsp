@extends('cms.layouts.app')

@section('title', 'Dashboard CMS - ' . config('app.name', 'Portal PTSP'))
@section('page-title', 'Dashboard')

@section('content')
    <section class="rounded-3xl border border-cms-line bg-white p-6 md:p-8">
        <div class="flex flex-col justify-between gap-6 md:flex-row md:items-start">
            <div>
                <p class="text-sm font-semibold uppercase tracking-wide text-cms-blue">Selamat datang</p>
                <h1 class="mt-2 text-3xl font-extrabold tracking-tight text-neutral-950">
                    Halo, {{ auth()->user()?->nama ?: auth()->user()?->username }}.
                </h1>
                <p class="mt-3 max-w-2xl text-sm leading-6 text-neutral-600">
                    Anda berhasil masuk ke CMS Portal PTSP.
                </p>
            </div>

            <div class="flex flex-wrap gap-3">
                <div class="inline-flex items-center gap-2 rounded-2xl bg-blue-50 px-4 py-3 text-sm font-semibold text-cms-blue">
                    <i data-lucide="calendar-days" class="h-4 w-4"></i>
                    {{ now()->format('d M Y') }}
                </div>
                <div class="inline-flex items-center gap-2 rounded-2xl bg-amber-50 px-4 py-3 text-sm font-semibold text-amber-700">
                    <i data-lucide="shield" class="h-4 w-4"></i>
                    {{ str(auth()->user()?->role)->headline() }}
                </div>
            </div>
        </div>
    </section>
@endsection
