@extends('cms.layouts.app')

@section('title', 'Users CMS - ' . config('app.name', 'Portal PTSP'))
@section('page-title', 'Users')

@section('content')
    <div class="space-y-6">
        <section class="flex flex-col justify-between gap-4 md:flex-row md:items-center">
            <div>
                <h1 class="text-3xl font-extrabold tracking-tight text-neutral-950">Users</h1>
                <p class="mt-2 text-sm font-medium text-neutral-500">Kelola akun pengguna CMS.</p>
            </div>

            <a href="{{ route('cms.users.create') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl bg-cms-blue px-5 py-3 text-sm font-bold text-white">
                <i data-lucide="plus" class="h-4 w-4"></i>
                Tambah User
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
                <form method="GET" action="{{ route('cms.users.index') }}" class="grid gap-3 md:grid-cols-[1fr_220px_auto]">
                    <input
                        type="search"
                        name="search"
                        value="{{ $search }}"
                        class="h-11 rounded-2xl border border-cms-line bg-neutral-50 px-4 text-sm outline-none focus:border-cms-blue focus:bg-white"
                        placeholder="Cari username, nama, atau no. telp"
                    >

                    <select name="role" class="h-11 rounded-2xl border border-cms-line bg-neutral-50 px-4 text-sm outline-none focus:border-cms-blue focus:bg-white">
                        <option value="">Semua Role</option>
                        @foreach ($roles as $roleOption)
                            <option value="{{ $roleOption }}" @selected($role === $roleOption)>
                                {{ str($roleOption)->headline() }}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit" class="inline-flex h-11 items-center justify-center gap-2 rounded-2xl border border-cms-line bg-white px-5 text-sm font-bold text-neutral-700 hover:bg-neutral-50">
                        <i data-lucide="search" class="h-4 w-4"></i>
                        Filter
                    </button>
                </form>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full min-w-[900px] text-left text-sm">
                    <thead class="border-b border-cms-line bg-neutral-50 text-xs uppercase tracking-wide text-neutral-500">
                        <tr>
                            <th class="px-5 py-4 font-bold">User</th>
                            <th class="px-5 py-4 font-bold">No. Telp</th>
                            <th class="px-5 py-4 font-bold">Role</th>
                            <th class="px-5 py-4 font-bold">2FA</th>
                            <th class="px-5 py-4 font-bold">Dibuat</th>
                            <th class="px-5 py-4 text-right font-bold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-cms-line">
                        @forelse ($users as $user)
                            <tr class="bg-white">
                                <td class="px-5 py-4">
                                    <div class="font-bold text-neutral-900">{{ $user->nama ?: $user->username }}</div>
                                    <div class="text-xs font-medium text-neutral-500">{{ $user->username }}</div>
                                </td>
                                <td class="px-5 py-4 text-neutral-600">{{ $user->no_telp ?: '-' }}</td>
                                <td class="px-5 py-4">
                                    <span class="inline-flex rounded-full bg-blue-50 px-3 py-1 text-xs font-bold capitalize text-cms-blue">
                                        {{ $user->role }}
                                    </span>
                                </td>
                                <td class="px-5 py-4">
                                    <span class="inline-flex rounded-full px-3 py-1 text-xs font-bold {{ $user->google2fa_enabled ? 'bg-emerald-50 text-emerald-700' : 'bg-neutral-100 text-neutral-600' }}">
                                        {{ $user->google2fa_enabled ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>
                                <td class="px-5 py-4 text-neutral-600">{{ $user->created_at?->format('d M Y') }}</td>
                                <td class="px-5 py-4">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('cms.users.show', $user) }}" class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-cms-line text-neutral-600 hover:bg-neutral-50" aria-label="Detail user">
                                            <i data-lucide="eye" class="h-4 w-4"></i>
                                        </a>
                                        <a href="{{ route('cms.users.edit', $user) }}" class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-cms-line text-cms-blue hover:bg-blue-50" aria-label="Edit user">
                                            <i data-lucide="pencil" class="h-4 w-4"></i>
                                        </a>
                                        <form method="POST" action="{{ route('cms.users.destroy', $user) }}" onsubmit="return confirm('Hapus user ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex h-9 w-9 items-center justify-center rounded-xl border border-red-200 text-red-600 hover:bg-red-50" aria-label="Hapus user">
                                                <i data-lucide="trash-2" class="h-4 w-4"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-5 py-12 text-center text-sm font-medium text-neutral-500">
                                    Belum ada data user.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="border-t border-cms-line px-5 py-4">
                {{ $users->links() }}
            </div>
        </section>
    </div>
@endsection
