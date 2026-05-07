@extends('cms.layouts.app')

@section('title', 'Detail User CMS - ' . config('app.name', 'Portal PTSP'))
@section('page-title', 'Detail User')

@section('content')
    <div class="max-w-6xl mx-auto space-y-6">
        {{-- Header / Identity --}}
        <section class="flex flex-col gap-4 rounded-2xl border border-cms-line bg-white p-6 md:flex-row md:items-center md:justify-between">
            <div class="flex items-center gap-4">
                <div class="inline-flex h-20 w-20 items-center justify-center rounded-2xl bg-cms-blue text-white text-2xl font-bold">
                    {{-- initials fallback --}}
                    {{ strtoupper(substr($user->nama ?: $user->username, 0, 1)) }}
                </div>

                <div>
                    <h1 class="text-2xl font-extrabold tracking-tight text-neutral-950">{{ $user->nama ?: $user->username }}</h1>
                    <p class="mt-1 text-sm font-medium text-neutral-500">{{'@'. $user->username }}</p>
                    <div class="mt-3 flex flex-wrap items-center gap-2">
                        <span class="rounded-2xl border border-cms-line bg-white px-3 py-1 text-xs font-semibold text-neutral-700">Role: {{ $user->role }}</span>
                        <span class="rounded-2xl border border-cms-line bg-white px-3 py-1 text-xs font-semibold text-neutral-700">2FA: {{ $user->google2fa_enabled ? 'Aktif' : 'Nonaktif' }}</span>
                        <span class="rounded-2xl border border-cms-line bg-white px-3 py-1 text-xs font-semibold text-neutral-700">Dibuat: {{ $user->created_at?->format('d M Y') }}</span>
                    </div>
                </div>
            </div>

            <div class="flex gap-3">
                <a href="{{ route('cms.users.edit', $user) }}" class="inline-flex items-center gap-2 rounded-2xl bg-cms-blue px-4 py-2 text-sm font-bold text-white">
                    <i data-lucide="pencil" class="h-4 w-4"></i>
                    Edit
                </a>
                <a href="{{ route('cms.users.index') }}" class="inline-flex items-center gap-2 rounded-2xl border border-cms-line bg-white px-4 py-2 text-sm font-bold text-neutral-700">
                    <i data-lucide="corner-down-left" class="h-4 w-4"></i>
                    Kembali
                </a>
            </div>
        </section>

        {{-- Stats / quick info --}}
        <section class="grid gap-4 md:grid-cols-3">
            <div class="rounded-2xl border border-cms-line bg-white p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase text-neutral-500">Akun</p>
                        <p class="mt-2 text-lg font-extrabold text-neutral-900">{{ $user->username }}</p>
                    </div>
                    <i data-lucide="user-check" class="h-6 w-6 text-cms-blue"></i>
                </div>
            </div>

            <div class="rounded-2xl border border-cms-line bg-white p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase text-neutral-500">Kebutuhan Akses</p>
                        <p class="mt-2 text-lg font-extrabold text-neutral-900 capitalize">{{ $user->role }}</p>
                    </div>
                    <i data-lucide="shield" class="h-6 w-6 text-cms-blue"></i>
                </div>
            </div>

            <div class="rounded-2xl border border-cms-line bg-white p-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-bold uppercase text-neutral-500">Status 2FA</p>
                        <p class="mt-2 text-lg font-extrabold text-neutral-900">{{ $user->google2fa_enabled ? 'Aktif' : 'Nonaktif' }}</p>
                    </div>
                    <i data-lucide="key" class="h-6 w-6 text-cms-blue"></i>
                </div>
            </div>
        </section>

        {{-- Details --}}
        <section class="rounded-2xl border border-cms-line bg-white p-6">
            <h2 class="text-sm font-extrabold text-neutral-900">Detail Informasi</h2>
            <dl class="mt-4 grid gap-4 md:grid-cols-2">
                <div class="space-y-1">
                    <dt class="text-xs font-bold uppercase tracking-wide text-neutral-500">Nama Lengkap</dt>
                    <dd class="text-sm font-semibold text-neutral-900">{{ $user->nama ?: '-' }}</dd>
                </div>

                <div class="space-y-1">
                    <dt class="text-xs font-bold uppercase tracking-wide text-neutral-500">No. Telepon</dt>
                    <dd class="text-sm font-semibold text-neutral-900">{{ $user->no_telp ?: '-' }}</dd>
                </div>

                <div class="space-y-1">
                    <dt class="text-xs font-bold uppercase tracking-wide text-neutral-500">Email</dt>
                    <dd class="text-sm font-semibold text-neutral-900">{{ $user->email ?: '-' }}</dd>
                </div>

                <div class="space-y-1">
                    <dt class="text-xs font-bold uppercase tracking-wide text-neutral-500">Role</dt>
                    <dd class="text-sm font-semibold capitalize text-neutral-900">{{ $user->role }}</dd>
                </div>

                <div class="md:col-span-2 space-y-1">
                    <dt class="text-xs font-bold uppercase tracking-wide text-neutral-500">Alamat</dt>
                    <dd class="text-sm font-semibold text-neutral-900">{{ $user->alamat ?: '-' }}</dd>
                </div>
            </dl>

            <div class="mt-6 flex flex-wrap items-center gap-3">
                <a href="mailto:{{ $user->email }}" class="inline-flex items-center gap-2 rounded-2xl border border-cms-line bg-white px-4 py-2 text-sm font-bold text-neutral-700">
                    <i data-lucide="mail" class="h-4 w-4"></i>
                    Kirim Email
                </a>

                <a href="tel:{{ $user->no_telp }}" class="inline-flex items-center gap-2 rounded-2xl border border-cms-line bg-white px-4 py-2 text-sm font-bold text-neutral-700">
                    <i data-lucide="phone" class="h-4 w-4"></i>
                    Panggil
                </a>
            </div>
        </section>
    </div>
@endsection
