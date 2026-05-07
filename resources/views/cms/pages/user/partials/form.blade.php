@php
    $isEditing = $user->exists;
    $submitLabel = $isEditing ? 'Simpan Perubahan' : 'Buat User';
@endphp

@if ($errors->any())
    <div class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-semibold text-red-700">
        Periksa kembali data yang diisi.
    </div>
@endif

<section class="flex flex-col justify-between gap-4 md:flex-row md:items-center">
    <div class="flex items-center gap-3">
        <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-cms-blue text-white">
            <span class="material-symbols-outlined text-[22px]">{{ $isEditing ? 'manage_accounts' : 'person_add' }}</span>
        </div>
        <div>
            <h1 class="text-3xl font-extrabold tracking-tight text-neutral-950">
                {{ $isEditing ? 'Edit User' : 'Tambah User Baru' }}
            </h1>
            <p class="mt-1 text-sm font-medium text-neutral-500">
                {{ $isEditing ? 'Perbarui data akun pengguna CMS.' : 'Buat akun pengguna baru untuk sistem.' }}
            </p>
        </div>
    </div>

    <a href="{{ route('cms.users.index') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl border border-cms-line bg-white px-5 py-3 text-sm font-bold text-neutral-700 hover:bg-neutral-50">
        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
        Kembali
    </a>
</section>

<div class="grid gap-6 xl:grid-cols-[1fr_520px]">
    <div class="space-y-6">
        <section class="overflow-hidden rounded-2xl border border-cms-line bg-white">
            <div class="flex items-center gap-3 border-b border-cms-line px-5 py-5">
                <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-blue-50 text-cms-blue">
                    <span class="material-symbols-outlined text-[20px]">person</span>
                </span>
                <h2 class="text-base font-extrabold text-neutral-950">Informasi Dasar</h2>
            </div>

            <div class="grid gap-5 p-5 md:grid-cols-2">
                <div>
                    <label for="username" class="mb-2 block text-sm font-semibold text-neutral-800">Username <span class="text-red-500">*</span></label>
                    <input
                        id="username"
                        name="username"
                        type="text"
                        value="{{ old('username', $user->username) }}"
                        class="h-12 w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 text-sm outline-none focus:border-cms-blue focus:bg-white"
                        placeholder="Masukkan username..."
                        required
                    >
                    @error('username')
                        <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="nama" class="mb-2 block text-sm font-semibold text-neutral-800">Nama Lengkap <span class="text-red-500">*</span></label>
                    <input
                        id="nama"
                        name="nama"
                        type="text"
                        value="{{ old('nama', $user->nama) }}"
                        class="h-12 w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 text-sm outline-none focus:border-cms-blue focus:bg-white"
                        placeholder="Masukkan nama lengkap..."
                        required
                    >
                    @error('nama')
                        <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="no_telp" class="mb-2 block text-sm font-semibold text-neutral-800">No. Telepon</label>
                    <input
                        id="no_telp"
                        name="no_telp"
                        type="text"
                        value="{{ old('no_telp', $user->no_telp) }}"
                        class="h-12 w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 text-sm outline-none focus:border-cms-blue focus:bg-white"
                        placeholder="Masukkan nomor telepon..."
                    >
                    @error('no_telp')
                        <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="alamat" class="mb-2 block text-sm font-semibold text-neutral-800">Alamat</label>
                    <textarea
                        id="alamat"
                        name="alamat"
                        rows="4"
                        class="w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 py-3 text-sm outline-none focus:border-cms-blue focus:bg-white"
                        placeholder="Masukkan alamat lengkap..."
                    >{{ old('alamat', $user->alamat) }}</textarea>
                    @error('alamat')
                        <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </section>
    </div>

    <aside class="space-y-6">
        <section class="overflow-hidden rounded-2xl border border-cms-line bg-white">
            <div class="flex items-center gap-3 border-b border-cms-line px-5 py-5">
                <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-amber-50 text-amber-600">
                    <span class="material-symbols-outlined text-[20px]">shield_person</span>
                </span>
                <h2 class="text-base font-extrabold text-neutral-950">Role & Akses</h2>
            </div>

            <div class="space-y-4 p-5">
                <p class="text-sm font-semibold text-neutral-800">Pilih Role <span class="text-red-500">*</span></p>

                <div class="space-y-3">
                    @foreach ($roles as $roleOption)
                        <label class="flex cursor-pointer gap-3 rounded-2xl border border-cms-line bg-white p-4 hover:bg-neutral-50">
                            <input
                                type="radio"
                                name="role"
                                value="{{ $roleOption }}"
                                class="mt-1 h-4 w-4 border-neutral-300 text-cms-blue focus:ring-cms-blue"
                                @checked(old('role', $user->role ?: 'editor') === $roleOption)
                                required
                            >
                            <span>
                                <span class="block text-sm font-extrabold text-neutral-900">{{ str($roleOption)->headline() }}</span>
                                <span class="mt-1 block text-xs font-medium text-neutral-500">
                                    @if ($roleOption === 'admin')
                                        Akses penuh ke semua fitur dan menu sistem.
                                    @elseif ($roleOption === 'verifikator')
                                        Akses untuk melakukan verifikasi data.
                                    @else
                                        Akses untuk mengelola konten.
                                    @endif
                                </span>
                            </span>
                        </label>
                    @endforeach
                </div>

                @error('role')
                    <p class="text-sm font-medium text-red-600">{{ $message }}</p>
                @enderror

                <div class="flex gap-2 rounded-2xl border border-blue-100 bg-blue-50 p-4 text-sm font-semibold text-cms-blue">
                    <span class="material-symbols-outlined text-[20px]">info</span>
                    Pilih satu role untuk user ini.
                </div>
            </div>
        </section>

        <section class="overflow-hidden rounded-2xl border border-cms-line bg-white">
            <div class="flex items-center gap-3 border-b border-cms-line px-5 py-5">
                <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-red-50 text-red-600">
                    <span class="material-symbols-outlined text-[20px]">key</span>
                </span>
                <h2 class="text-base font-extrabold text-neutral-950">Password</h2>
            </div>

            <div class="space-y-4 p-5" data-password-strength>
                <div>
                    <label for="password" class="mb-2 block text-sm font-semibold text-neutral-800">Password @if (! $isEditing)<span class="text-red-500">*</span>@endif</label>
                    <div class="relative">
                        <input
                            id="password"
                            name="password"
                            type="password"
                            class="h-12 w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 pr-12 text-sm outline-none focus:border-cms-blue focus:bg-white"
                            placeholder="{{ $isEditing ? 'Kosongkan jika tidak diubah' : 'Minimal 8 karakter' }}"
                            pattern="(?=.*[A-Za-z])(?=.*\d)[^\s]{8,}"
                            title="Minimal 8 karakter, wajib kombinasi huruf dan angka, dan boleh memakai simbol."
                            data-password-input
                            @required(! $isEditing)
                        >
                        <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-neutral-400" data-password-toggle aria-label="Tampilkan password">
                            <span class="material-symbols-outlined text-[20px]" data-password-toggle-icon>visibility</span>
                        </button>
                    </div>
                    <p class="mt-2 text-xs font-medium text-neutral-500">
                        Minimal 8 karakter, wajib kombinasi huruf dan angka.
                    </p>
                    @error('password')
                        <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="mb-2 block text-sm font-semibold text-neutral-800">Konfirmasi Password @if (! $isEditing)<span class="text-red-500">*</span>@endif</label>
                    <div class="relative">
                        <input
                            id="password_confirmation"
                            name="password_confirmation"
                            type="password"
                            class="h-12 w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 pr-12 text-sm outline-none focus:border-cms-blue focus:bg-white"
                            placeholder="Ulangi password..."
                            data-password-confirmation
                            @required(! $isEditing)
                        >
                        <button type="button" class="absolute right-3 top-1/2 -translate-y-1/2 text-neutral-400" data-password-confirmation-toggle aria-label="Tampilkan konfirmasi password">
                            <span class="material-symbols-outlined text-[20px]" data-password-confirmation-toggle-icon>visibility</span>
                        </button>
                    </div>
                </div>

                <div>
                    <div class="h-2 overflow-hidden rounded-full bg-neutral-100">
                        <div class="h-full w-0 rounded-full bg-neutral-300 transition-all" data-password-meter></div>
                    </div>
                    <p class="mt-2 text-xs font-bold text-neutral-500" data-password-label>Belum diisi</p>
                </div>
            </div>
        </section>

        <section class="rounded-2xl border border-cms-line bg-white p-5">
            <div class="grid gap-3">
                <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-2xl bg-cms-blue px-5 py-3 text-sm font-bold text-white">
                    <span class="material-symbols-outlined text-[19px]">{{ $isEditing ? 'save' : 'person_add' }}</span>
                    {{ $submitLabel }}
                </button>
                <a href="{{ route('cms.users.index') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl bg-neutral-100 px-5 py-3 text-sm font-bold text-neutral-700 hover:bg-neutral-200">
                    <span class="material-symbols-outlined text-[19px]">close</span>
                    Batal
                </a>
            </div>
        </section>
    </aside>
</div>

@push('scripts')
    <script>
        (() => {
            const container = document.querySelector('[data-password-strength]');
            if (!container) {
                return;
            }

            const passwordInput = container.querySelector('[data-password-input]');
            const confirmationInput = container.querySelector('[data-password-confirmation]');
            const meter = container.querySelector('[data-password-meter]');
            const label = container.querySelector('[data-password-label]');

            const levels = [
                { text: 'Belum diisi', width: '0%', color: 'bg-neutral-300' },
                { text: 'Lemah', width: '25%', color: 'bg-red-500' },
                { text: 'Cukup', width: '50%', color: 'bg-amber-500' },
                { text: 'Kuat', width: '75%', color: 'bg-blue-500' },
                { text: 'Sangat Kuat', width: '100%', color: 'bg-emerald-500' },
            ];

            const setMeter = (level) => {
                const state = levels[level];
                meter.className = `h-full rounded-full transition-all ${state.color}`;
                meter.style.width = state.width;
                label.textContent = state.text;
                label.className = `mt-2 text-xs font-bold ${level >= 3 ? 'text-emerald-600' : level === 2 ? 'text-amber-600' : level === 1 ? 'text-red-600' : 'text-neutral-500'}`;
            };

            const updateConfirmationValidity = () => {
                if (!confirmationInput) {
                    return;
                }

                confirmationInput.required = passwordInput.value.length > 0;

                if (passwordInput.value && !confirmationInput.value) {
                    confirmationInput.setCustomValidity('Konfirmasi password wajib diisi.');
                } else if (confirmationInput.value && confirmationInput.value !== passwordInput.value) {
                    confirmationInput.setCustomValidity('Konfirmasi password tidak sesuai.');
                } else {
                    confirmationInput.setCustomValidity('');
                }
            };

            const scorePassword = (value) => {
                if (!value) {
                    return 0;
                }

                let score = 0;

                if (value.length >= 8) {
                    score += 1;
                }

                if (/[A-Za-z]/.test(value) && /[0-9]/.test(value)) {
                    score += 1;
                }

                if (/[^A-Za-z0-9]/.test(value)) {
                    score += 1;
                }

                if (value.length >= 12) {
                    score += 1;
                }

                return Math.min(score, 4);
            };

            const toggleInput = (buttonSelector, input, iconSelector) => {
                const button = container.querySelector(buttonSelector);
                const icon = container.querySelector(iconSelector);

                if (!button || !input || !icon) {
                    return;
                }

                button.addEventListener('click', () => {
                    const isPassword = input.type === 'password';
                    input.type = isPassword ? 'text' : 'password';
                    icon.textContent = isPassword ? 'visibility_off' : 'visibility';
                });
            };

            passwordInput.addEventListener('input', () => {
                setMeter(scorePassword(passwordInput.value));
                updateConfirmationValidity();
            });

            if (confirmationInput) {
                confirmationInput.addEventListener('input', updateConfirmationValidity);
            }

            toggleInput('[data-password-toggle]', passwordInput, '[data-password-toggle-icon]');
            toggleInput('[data-password-confirmation-toggle]', confirmationInput, '[data-password-confirmation-toggle-icon]');
            setMeter(scorePassword(passwordInput.value));
            updateConfirmationValidity();
        })();
    </script>
@endpush
