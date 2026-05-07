<?php

namespace App\Http\Controllers\cms;

use App\Http\Controllers\Controller;
use App\Models\HeaderMenu;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HeaderMenuController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->toString();

        $menus = HeaderMenu::query()
            ->when($search !== '', fn ($q) => $q->where('label', 'like', "%{$search}%"))
            ->with('parent')
            ->orderBy('parent_id')
            ->orderBy('sort_order')
            ->paginate(15)
            ->withQueryString();

        return view('cms.pages.header_menus.index', [
            'menus' => $menus,
            'search' => $search,
        ]);
    }

    public function create(): View
    {
        return view('cms.pages.header_menus.create', [
            'menu' => new HeaderMenu,
            'parents' => HeaderMenu::whereNull('parent_id')->orderBy('sort_order')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validateData($request);

        HeaderMenu::create($data);

        return redirect()->route('cms.header-menus.index')->with('success', 'Menu berhasil ditambahkan.');
    }

    public function edit(HeaderMenu $header_menu): View
    {
        return view('cms.pages.header_menus.edit', [
            'menu' => $header_menu,
            'parents' => HeaderMenu::whereNull('parent_id')->where('id', '!=', $header_menu->id)->orderBy('sort_order')->get(),
        ]);
    }

    public function update(Request $request, HeaderMenu $header_menu): RedirectResponse
    {
        $data = $this->validateData($request, $header_menu);

        $header_menu->update($data);

        return redirect()->route('cms.header-menus.index')->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy(HeaderMenu $header_menu): RedirectResponse
    {
        $header_menu->delete();

        return redirect()->route('cms.header-menus.index')->with('success', 'Menu berhasil dihapus.');
    }

    private function validateData(Request $request, ?HeaderMenu $menu = null): array
    {
        $rules = [
            'parent_id' => ['nullable', 'exists:header_menus,id'],
            'label' => ['required', 'string', 'max:255'],
            'url' => ['nullable', 'string', 'max:2048'],
            'route_name' => ['nullable', 'string', 'max:255'],
            'route_parameters' => ['nullable', 'array'],
            'target' => ['nullable', 'string', 'in:_self,_blank'],
            'icon' => ['nullable', 'string', 'max:255'],
            'display_type' => ['nullable', 'string', 'in:link,button'],
            'sort_order' => ['nullable', 'integer'],
            'is_active' => ['sometimes', 'boolean'],
        ];

        $data = $request->validate($rules);

        if (isset($data['route_parameters'])) {
            $data['route_parameters'] = array_filter($data['route_parameters']);
        }

        $data['is_active'] = $request->boolean('is_active');
        $data['target'] = $data['target'] ?? '_self';
        $data['display_type'] = $data['display_type'] ?? 'link';
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
