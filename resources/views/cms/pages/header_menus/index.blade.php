@extends('cms.layouts.app')

@section('title', 'Header Menus - ' . config('app.name'))

@section('content')
    <div class="space-y-4">
        <div class="flex items-center justify-between">
            <h1 class="text-xl font-extrabold">Header Menus</h1>
            <a href="{{ route('cms.header-menus.create') }}" class="rounded-2xl bg-cms-blue px-4 py-2 text-white font-semibold">Buat Menu</a>
        </div>

        <section class="rounded-2xl border border-cms-line bg-white p-4">
            <form class="mb-4" method="GET" action="{{ route('cms.header-menus.index') }}">
                <div class="flex gap-2">
                    <input type="search" name="search" value="{{ $search }}" placeholder="Cari label..." class="w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 py-2">
                    <button class="rounded-2xl bg-white border border-cms-line px-4 py-2">Cari</button>
                </div>
            </form>

            <div class="overflow-x-auto">
                <table class="w-full table-auto text-sm">
                    <thead>
                        <tr class="text-left text-xs text-neutral-500">
                            <th class="px-3 py-2">Label</th>
                            <th class="px-3 py-2">Parent</th>
                            <th class="px-3 py-2">Tipe</th>
                            <th class="px-3 py-2">Aktif</th>
                            <th class="px-3 py-2">Urutan</th>
                            <th class="px-3 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($menus as $m)
                            <tr class="border-t">
                                <td class="px-3 py-3">{{ $m->label }}</td>
                                <td class="px-3 py-3">{{ $m->parent?->label ?? '-' }}</td>
                                <td class="px-3 py-3">{{ $m->display_type }}</td>
                                <td class="px-3 py-3">{{ $m->is_active ? 'Ya' : 'Tidak' }}</td>
                                <td class="px-3 py-3">{{ $m->sort_order }}</td>
                                <td class="px-3 py-3">
                                    <a href="{{ route('cms.header-menus.edit', $m) }}" class="inline-flex items-center gap-2 rounded-2xl border border-cms-line bg-white px-3 py-1 text-sm">Edit</a>
                                    <form action="{{ route('cms.header-menus.destroy', $m) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="ml-2 inline-flex items-center gap-2 rounded-2xl border border-red-100 bg-red-50 px-3 py-1 text-sm text-red-600">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">{{ $menus->links() }}</div>
        </section>
    </div>
@endsection
