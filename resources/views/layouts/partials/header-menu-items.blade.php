@foreach ($menus as $menu)
    @php
        $children = $menu->children ?? collect();
        $hasChildren = $children->isNotEmpty();
        $href = $menu->url ?: '#';

        if ($menu->route_name && \Illuminate\Support\Facades\Route::has($menu->route_name)) {
            $href = route($menu->route_name, $menu->route_parameters ?? []);
        }

        $linkClass = $depth === 0 ? 'nav-link' : 'nav-sublink';
        $isContactButton = $depth === 0 && str($menu->label)->lower()->toString() === 'kontak';
    @endphp

    <li class="nav-item{{ $hasChildren ? ' has-children' : '' }}">
        <a
            href="{{ $href }}"
            class="{{ $linkClass }}{{ $isContactButton ? ' nav-btn' : '' }}"
            target="{{ $menu->target }}"
            @if ($menu->target === '_blank') rel="noopener noreferrer" @endif
        >
            <span>{{ $menu->label }}</span>

            @if ($hasChildren)
                <span class="nav-caret" aria-hidden="true"></span>
            @endif
        </a>

        @if ($hasChildren)
            <ul class="nav-submenu" aria-label="{{ $menu->label }}">
                @include('layouts.partials.header-menu-items', [
                    'menus' => $children,
                    'depth' => $depth + 1,
                ])
            </ul>
        @endif
    </li>
@endforeach
