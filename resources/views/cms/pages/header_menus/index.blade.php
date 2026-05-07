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
                <form method="GET" action="{{ route('cms.header-menus.index') }}" class="grid gap-3 md:grid-cols-[1fr_220px_auto]">
                    <input
                        type="search"
                        name="search"
                        value="{{ $search }}"
                        class="h-11 rounded-2xl border border-cms-line bg-neutral-50 px-4 text-sm outline-none focus:border-cms-blue focus:bg-white"
                        placeholder="Cari label menu..."
                    >

                    <select name="parent_id" class="h-11 rounded-2xl border border-cms-line bg-neutral-50 px-4 text-sm outline-none focus:border-cms-blue focus:bg-white text-neutral-700">
                        <option value="">Semua Level Menu</option>
                        <option value="main" @selected(request('parent_id') === 'main')>Hanya Menu Utama</option>
                        <optgroup label="Submenu dari:">
                            @foreach ($parents as $parent)
                                <option value="{{ $parent->id }}" @selected(request('parent_id') == $parent->id)>
                                    Sub dari: {{ $parent->label }}
                                </option>
                            @endforeach
                        </optgroup>
                    </select>

                    <button type="submit" class="inline-flex h-11 items-center justify-center gap-2 rounded-2xl border border-cms-line bg-white px-5 text-sm font-bold text-neutral-700 hover:bg-neutral-50">
                        <i data-lucide="search" class="h-4 w-4"></i>
                        Filter
                    </button>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[800px] text-left text-sm">
                    <thead class="border-b border-cms-line bg-neutral-50 text-xs uppercase tracking-wide text-neutral-500">
                        <tr>
                            <th class="px-5 py-4 font-bold">Label Menu</th>
                            <th class="px-5 py-4 font-bold">Hierarki</th>
                            <th class="px-5 py-4 font-bold">Target & Tipe</th>
                            <th class="px-5 py-4 font-bold">Status</th>
                            <th class="px-5 py-4 font-bold text-center">Urutan</th>
                            <th class="px-5 py-4 text-right font-bold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-cms-line">
                        @forelse($menus as $m)
                            <tr class="bg-white hover:bg-neutral-50 transition-colors">
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-2">
                                        @if($m->icon)
                                            <i data-lucide="{{ str_replace('lucide:', '', $m->icon) }}" class="h-4 w-4 text-neutral-400"></i>
                                        @endif
                                        <div class="font-bold text-neutral-900">{{ $m->label }}</div>
                                    </div>
                                    @if($m->url || $m->route_name)
                                        <div class="mt-1 text-xs font-medium text-neutral-500 line-clamp-1 max-w-[200px]" title="{{ $m->url ?: $m->route_name }}">{{ $m->url ?: $m->route_name }}</div>
                                    @endif
                                </td>
                                <td class="px-5 py-4">
                                    @if($m->parent)
                                        <span class="inline-flex items-center gap-1 rounded-md bg-neutral-100 px-2 py-1 text-xs font-semibold text-neutral-600">
                                            <i data-lucide="corner-down-right" class="h-3 w-3 text-neutral-400"></i>
                                            {{ $m->parent->label }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 rounded-md bg-blue-50 px-2 py-1 text-xs font-semibold text-cms-blue">
                                            Menu Utama
                                        </span>
                                    @endif
                                </td>
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-2">
                                        <span class="inline-flex rounded-md bg-neutral-100 px-2 py-1 text-xs font-semibold capitalize text-neutral-700">
                                            {{ $m->display_type }}
                                        </span>
                                        @if($m->target === '_blank')
                                            <span class="inline-flex items-center gap-1 rounded-md bg-amber-50 px-2 py-1 text-xs font-semibold text-amber-700" title="Tab Baru">
                                                <i data-lucide="external-link" class="h-3 w-3"></i> Tab Baru
                                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-xs font-bold {{ $m->is_active ? 'bg-emerald-50 text-emerald-700' : 'bg-neutral-100 text-neutral-600' }}">
                                        <span class="h-1.5 w-1.5 rounded-full {{ $m->is_active ? 'bg-emerald-500' : 'bg-neutral-400' }}"></span>
                                        {{ $m->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-center font-bold text-neutral-700">
                                    {{ $m->sort_order }}
                                </td>
                                <td class="px-5 py-4">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('cms.header-menus.edit', $m) }}" class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-cms-line bg-white text-cms-blue hover:bg-blue-50 hover:border-blue-200 transition-colors" aria-label="Edit menu">
                                            <i data-lucide="pencil" class="h-4 w-4"></i>
                                        </a>
                                        <form method="POST" action="{{ route('cms.header-menus.destroy', $m) }}" onsubmit="return confirm('Hapus menu ini beserta semua submenunya (jika ada)?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-red-200 bg-white text-red-600 hover:bg-red-50 hover:border-red-300 transition-colors" aria-label="Hapus menu">
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
