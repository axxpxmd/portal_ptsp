@php
    $isEditing = $menu->exists;
    $submitLabel = $isEditing ? 'Simpan Perubahan' : 'Buat Menu';
@endphp

@if ($errors->any())
    <div class="rounded-2xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-semibold text-red-700">Periksa kembali data yang diisi.</div>
@endif

<div class="grid gap-4 md:grid-cols-2">
    <div>
        <label class="mb-2 block text-sm font-semibold">Label <span class="text-red-500">*</span></label>
        <input name="label" value="{{ old('label', $menu->label) }}" required class="w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 py-2">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Parent</label>
        <select name="parent_id" class="w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 py-2">
            <option value="">-- Tidak Ada --</option>
            @foreach($parents as $p)
                <option value="{{ $p->id }}" @selected(old('parent_id', $menu->parent_id) == $p->id)>{{ $p->label }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">URL</label>
        <input name="url" value="{{ old('url', $menu->url) }}" class="w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 py-2">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Route Name</label>
        <input name="route_name" value="{{ old('route_name', $menu->route_name) }}" class="w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 py-2">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Display Type</label>
        <select name="display_type" class="w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 py-2">
            <option value="link" @selected(old('display_type', $menu->display_type) == 'link')>Link</option>
            <option value="button" @selected(old('display_type', $menu->display_type) == 'button')>Button</option>
        </select>
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Icon</label>
        <input name="icon" value="{{ old('icon', $menu->icon) }}" class="w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 py-2" placeholder="mis. lucide:user">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Urutan</label>
        <input type="number" name="sort_order" value="{{ old('sort_order', $menu->sort_order ?? 0) }}" class="w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 py-2">
    </div>

    <div>
        <label class="mb-2 block text-sm font-semibold">Target</label>
        <select name="target" class="w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 py-2">
            <option value="_self" @selected(old('target', $menu->target ?? '_self') == '_self')>Same Tab</option>
            <option value="_blank" @selected(old('target', $menu->target ?? '') == '_blank')>New Tab</option>
        </select>
    </div>

    <div class="md:col-span-2">
        <label class="mb-2 block text-sm font-semibold">Route Parameters (key=value per baris)</label>
        <textarea name="route_parameters" class="w-full rounded-2xl border border-cms-line bg-neutral-50 px-4 py-2" rows="3">@php echo old('route_parameters', is_array($menu->route_parameters ?? null) ? collect($menu->route_parameters)->map(fn($v,$k)=>"$k=$v")->join("\n") : (is_string(old('route_parameters'))? old('route_parameters') : '')) @endphp</textarea>
    </div>

    <div class="flex items-center gap-3 md:col-span-2">
        <label class="inline-flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $menu->is_active ?? true))>
            <span class="text-sm">Aktif</span>
        </label>
    </div>
</div>

<div class="mt-4 flex gap-2">
    <button type="submit" class="rounded-2xl bg-cms-blue px-4 py-2 text-white font-semibold">{{ $submitLabel }}</button>
    <a href="{{ route('cms.header-menus.index') }}" class="rounded-2xl border border-cms-line bg-white px-4 py-2 text-sm font-semibold">Batal</a>
</div>
