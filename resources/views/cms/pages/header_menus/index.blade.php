@extends('cms.layouts.app')

@section('title', 'Header Menus CMS - ' . config('app.name', 'Portal PTSP'))
@section('page-title', 'Header Menus')

@section('content')
    <div class="space-y-6">
        <section class="flex flex-col justify-between gap-4 md:flex-row md:items-center">
            <div>
                <h1 class="text-3xl font-extrabold tracking-tight text-neutral-950">Header Menus</h1>
                <p class="mt-2 text-sm font-medium text-neutral-500">Kelola menu header navigasi portal pengunjung.</p>
            </div>

            <a href="{{ route('cms.header-menus.create') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl bg-cms-blue px-5 py-3 text-sm font-bold text-white">
                <i data-lucide="plus" class="h-4 w-4"></i>
                Tambah Menu
            </a>
        </section>

        @if (session('success'))
            <div class="rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-semibold text-red-700">
                {{ session('error') }}
            </div>
        @endif

        <section class="rounded-2xl border border-cms-line bg-white">
            <div class="border-b border-cms-line p-5">
                <form method="GET" action="{{ route('cms.header-menus.index') }}" class="grid gap-3 md:grid-cols-[1fr_auto]">
                    <input
                        type="search"
                        name="search"
                        value="{{ $search }}"
                        class="h-11 rounded-2xl border border-cms-line bg-neutral-50 px-4 text-sm outline-none focus:border-cms-blue focus:bg-white"
                        placeholder="Cari label menu..."
                    >

                    <button type="submit" class="inline-flex h-11 items-center justify-center gap-2 rounded-2xl border border-cms-line bg-white px-5 text-sm font-bold text-neutral-700 hover:bg-neutral-50">
                        <i data-lucide="search" class="h-4 w-4"></i>
                        Cari
                    </button>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[800px] text-left text-sm">
                    <thead class="border-b border-cms-line bg-neutral-50 text-xs uppercase tracking-wide text-neutral-500">
                        <tr>
                            <th class="px-5 py-4 font-bold">Label</th>
                            <th class="px-5 py-4 font-bold">Parent</th>
                            <th class="px-5 py-4 font-bold">Tipe</th>
                            <th class="px-5 py-4 font-bold">Status</th>
                            <th class="px-5 py-4 font-bold">Urutan</th>
                            <th class="px-5 py-4 text-right font-bold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-cms-line">
                        @forelse($menus as $m)
                            <tr class="bg-white">
                                <td class="px-5 py-4">
                                    <div class="font-bold text-neutral-900">{{ $m->label }}</div>
                                </td>
                                <td class="px-5 py-4 text-neutral-600">{{ $m->parent?->label ?? '-' }}</td>
                                <td class="px-5 py-4 text-neutral-600">{{ $m->display_type }}</td>
                                <td class="px-5 py-4">
                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-bold {{ $m->is_active ? 'bg-emerald-50 text-emerald-700' : 'bg-neutral-100 text-neutral-600' }}">
                                        {{ $m->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-neutral-600">{{ $m->sort_order }}</td>
                                <td class="px-5 py-4">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('cms.header-menus.edit', $m) }}" class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-cms-line text-cms-blue hover:bg-blue-50" aria-label="Edit menu">
                                            <i data-lucide="pencil" class="h-4 w-4"></i>
                                        </a>
                                        <form method="POST" action="{{ route('cms.header-menus.destroy', $m) }}" onsubmit="return confirm('Hapus menu ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-red-200 text-red-600 hover:bg-red-50" aria-label="Hapus menu">
                                                <i data-lucide="trash-2" class="h-4 w-4"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-5 py-12 text-center text-sm font-medium text-neutral-500">
                                    Belum ada data menu.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="border-t border-cms-line px-5 py-4">
                {{ $menus->links() }}
            </div>
        </section>
    </div>
@endsection
