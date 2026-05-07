@extends('cms.layouts.app')

@section('title', 'Dashboard CMS - ' . config('app.name', 'Portal PTSP'))
@section('page-title', 'Dashboard')

@section('content')
    <section class="rounded-md border border-cms-line bg-white p-6">
        <p class="text-sm font-semibold uppercase tracking-wide text-cms-blue">Selamat datang</p>
        <h1 class="mt-2 text-2xl font-extrabold text-neutral-900">
            Halo, {{ auth()->user()?->nama ?: auth()->user()?->username }}.
        </h1>
        <p class="mt-3 max-w-2xl text-sm leading-6 text-neutral-600">
            Anda berhasil masuk ke CMS Portal PTSP.
        </p>
    </section>
@endsection
