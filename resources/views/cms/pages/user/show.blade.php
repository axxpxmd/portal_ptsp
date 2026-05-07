@extends('cms.layouts.app')

@section('title', 'Detail User CMS - ' . config('app.name', 'Portal PTSP'))
@section('page-title', 'Detail User')

@section('content')
    <div class="max-w-4xl space-y-6">
        <section class="flex flex-col justify-between gap-4 md:flex-row md:items-center">
            <div>
                <h1 class="text-3xl font-extrabold tracking-tight text-neutral-950">{{ $user->nama ?: $user->username }}</h1>
                <p class="mt-2 text-sm font-medium text-neutral-500">{{ $user->username }}</p>
            </div>

            <div class="flex gap-2">
                <a href="{{ route('cms.users.edit', $user) }}" class="inline-flex items-center justify-center gap-2 rounded-2xl bg-cms-blue px-5 py-3 text-sm font-bold text-white hover:bg-blue-700">
                    <i data-lucide="pencil" class="h-4 w-4"></i>
                    Edit
                </a>
                <a href="{{ route('cms.users.index') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl border border-cms-line bg-white px-5 py-3 text-sm font-bold text-neutral-700 hover:bg-neutral-50">
                    Kembali
                </a>
            </div>
        </section>

        <section class="rounded-2xl border border-cms-line bg-white p-6">
            <dl class="grid gap-5 md:grid-cols-2">
                <div>
                    <dt class="text-xs font-bold uppercase tracking-wide text-neutral-500">Username</dt>
                    <dd class="mt-1 text-sm font-semibold text-neutral-900">{{ $user->username }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-bold uppercase tracking-wide text-neutral-500">Nama</dt>
                    <dd class="mt-1 text-sm font-semibold text-neutral-900">{{ $user->nama ?: '-' }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-bold uppercase tracking-wide text-neutral-500">No. Telp</dt>
                    <dd class="mt-1 text-sm font-semibold text-neutral-900">{{ $user->no_telp ?: '-' }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-bold uppercase tracking-wide text-neutral-500">Role</dt>
                    <dd class="mt-1 text-sm font-semibold capitalize text-neutral-900">{{ $user->role }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-bold uppercase tracking-wide text-neutral-500">Google 2FA</dt>
                    <dd class="mt-1 text-sm font-semibold text-neutral-900">{{ $user->google2fa_enabled ? 'Aktif' : 'Nonaktif' }}</dd>
                </div>
                <div>
                    <dt class="text-xs font-bold uppercase tracking-wide text-neutral-500">Dibuat</dt>
                    <dd class="mt-1 text-sm font-semibold text-neutral-900">{{ $user->created_at?->format('d M Y H:i') }}</dd>
                </div>
                <div class="md:col-span-2">
                    <dt class="text-xs font-bold uppercase tracking-wide text-neutral-500">Alamat</dt>
                    <dd class="mt-1 text-sm font-semibold text-neutral-900">{{ $user->alamat ?: '-' }}</dd>
                </div>
            </dl>
        </section>
    </div>
@endsection
