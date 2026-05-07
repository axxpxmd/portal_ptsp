@php
    $isEditing = $menu->exists;
    $submitLabel = $isEditing ? 'Simpan Perubahan' : 'Buat Menu';
@endphp

@if ($errors->any())
    <div class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-semibold text-red-700">
        Periksa kembali data yang diisi.
    </div>
@endif

<section class="flex flex-col justify-between gap-4 md:flex-row md:items-center">
    <div class="flex items-center gap-3">
        <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-cms-blue text-white">
            <span class="material-symbols-outlined text-[22px]">{{ $isEditing ? 'edit_note' : 'add_box' }}</span>
        </div>
        <div>
            <h1 class="text-3xl font-extrabold tracking-tight text-neutral-950">
                {{ $isEditing ? 'Edit Menu' : 'Tambah Menu Baru' }}
            </h1>
            <p class="mt-1 text-sm font-medium text-neutral-500">
                {{ $isEditing ? 'Perbarui data menu navigasi portal.' : 'Buat menu navigasi baru untuk portal.' }}
            </p>
        </div>
    </div>

    <a href="{{ route('cms.header-menus.index') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl border border-cms-line bg-white px-5 py-3 text-sm font-bold text-neutral-700 hover:bg-neutral-50">
        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
        Kembali
    </a>
</section>

<div class="grid gap-6 xl:grid-cols-[1fr_520px]">
    <div class="space-y-6">
        <section class="overflow-hidden rounded-2xl border border-cms-line bg-white">
            <div class="flex items-center gap-3 border-b border-cms-line px-5 py-5">
                <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-blue-50 text-cms-blue">
                    <span class="material-symbols-outlined text-[20px]">menu</span>
                </span>
                <h2 class="text-base font-extrabold text-neutral-950">Informasi Menu</h2>
            </div>

            <div class="grid gap-5 p-5 md:grid-cols-2">
                <div>
                    <label for="label" class="mb-2 block text-sm font-semibold text-neutral-800">Label <span class="text-red-500">*</span></label>
                    <input
                        id="label"
                        name="label"
                        type="text"
                        value="{{ old('label', $menu->label) }}"
                        class="h-12 w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 text-sm outline-none focus:border-cms-blue focus:bg-white"
                        placeholder="Masukkan label menu..."
                        required
                    >
                    @error('label')
                        <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="parent_id" class="mb-2 block text-sm font-semibold text-neutral-800">Parent Menu</label>
                    <select
                        id="parent_id"
                        name="parent_id"
                        class="h-12 w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 text-sm outline-none focus:border-cms-blue focus:bg-white"
                    >
                        <option value="">-- Tidak Ada --</option>
                        @foreach($parents as $p)
                            <option value="{{ $p->id }}" @selected(old('parent_id', $menu->parent_id) == $p->id)>
                                {{ $p->label }}
                            </option>
                        @endforeach
                    </select>
                    @error('parent_id')
                        <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="url" class="mb-2 block text-sm font-semibold text-neutral-800">URL</label>
                    <input
                        id="url"
                        name="url"
                        type="text"
                        value="{{ old('url', $menu->url) }}"
                        class="h-12 w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 text-sm outline-none focus:border-cms-blue focus:bg-white"
                        placeholder="Masukkan URL eksternal (opsional)"
                    >
                    @error('url')
                        <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="route_name" class="mb-2 block text-sm font-semibold text-neutral-800">Route Name</label>
                    <input
                        id="route_name"
                        name="route_name"
                        type="text"
                        value="{{ old('route_name', $menu->route_name) }}"
                        class="h-12 w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 text-sm outline-none focus:border-cms-blue focus:bg-white"
                        placeholder="Mis. frontend.home"
                    >
                    @error('route_name')
                        <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="route_parameters" class="mb-2 block text-sm font-semibold text-neutral-800">Route Parameters (opsional)</label>
                    <textarea
                        id="route_parameters"
                        name="route_parameters"
                        rows="3"
                        class="w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 py-3 text-sm outline-none focus:border-cms-blue focus:bg-white"
                        placeholder="key=value (satu per baris)"
                    >@php echo old('route_parameters', is_array($menu->route_parameters ?? null) ? collect($menu->route_parameters)->map(fn($v,$k)=>"$k=$v")->join("\n") : (is_string(old('route_parameters'))? old('route_parameters') : '')) @endphp</textarea>
                    @error('route_parameters')
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
                    <span class="material-symbols-outlined text-[20px]">settings</span>
                </span>
                <h2 class="text-base font-extrabold text-neutral-950">Pengaturan Tampilan</h2>
            </div>

            <div class="space-y-4 p-5">
                <div>
                    <label for="display_type" class="mb-2 block text-sm font-semibold text-neutral-800">Tipe Tampilan</label>
                    <select
                        id="display_type"
                        name="display_type"
                        class="h-12 w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 text-sm outline-none focus:border-cms-blue focus:bg-white"
                    >
                        <option value="link" @selected(old('display_type', $menu->display_type) == 'link')>Link Teks</option>
                        <option value="button" @selected(old('display_type', $menu->display_type) == 'button')>Tombol Button</option>
                    </select>
                </div>

                <div>
                    <label for="icon" class="mb-2 block text-sm font-semibold text-neutral-800">Icon (Opsional)</label>
                    <input
                        id="icon"
                        name="icon"
                        type="text"
                        value="{{ old('icon', $menu->icon) }}"
                        class="h-12 w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 text-sm outline-none focus:border-cms-blue focus:bg-white"
                        placeholder="Mis. lucide:home"
                    >
                </div>

                <div>
                    <label for="sort_order" class="mb-2 block text-sm font-semibold text-neutral-800">Urutan (Sort Order)</label>
                    <input
                        id="sort_order"
                        name="sort_order"
                        type="number"
                        value="{{ old('sort_order', $menu->sort_order ?? 0) }}"
                        class="h-12 w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 text-sm outline-none focus:border-cms-blue focus:bg-white"
                    >
                </div>

                <div>
                    <label for="target" class="mb-2 block text-sm font-semibold text-neutral-800">Target Buka Link</label>
                    <select
                        id="target"
                        name="target"
                        class="h-12 w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 text-sm outline-none focus:border-cms-blue focus:bg-white"
                    >
                        <option value="_self" @selected(old('target', $menu->target ?? '_self') == '_self')>Tab Saat Ini (_self)</option>
                        <option value="_blank" @selected(old('target', $menu->target ?? '') == '_blank')>Tab Baru (_blank)</option>
                    </select>
                </div>

                <div class="pt-2">
                    <label class="inline-flex cursor-pointer items-center gap-3">
                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            class="h-5 w-5 rounded border-neutral-300 text-cms-blue focus:ring-cms-blue"
                            @checked(old('is_active', $menu->is_active ?? true))
                        >
                        <span class="text-sm font-semibold text-neutral-800">Menu Aktif</span>
                    </label>
                </div>
            </div>
        </section>

        <section class="rounded-2xl border border-cms-line bg-white p-5">
            <div class="grid gap-3">
                <button type="submit" class="inline-flex items-center justify-center gap-2 rounded-2xl bg-cms-blue px-5 py-3 text-sm font-bold text-white">
                    <span class="material-symbols-outlined text-[19px]">{{ $isEditing ? 'save' : 'add_circle' }}</span>
                    {{ $submitLabel }}
                </button>
                <a href="{{ route('cms.header-menus.index') }}" class="inline-flex items-center justify-center gap-2 rounded-2xl bg-neutral-100 px-5 py-3 text-sm font-bold text-neutral-700 hover:bg-neutral-200">
                    <span class="material-symbols-outlined text-[19px]">close</span>
                    Batal
                </a>
            </div>
        </section>
    </aside>
</div>
