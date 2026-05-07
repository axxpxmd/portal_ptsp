<aside
    id="cms-sidebar"
    class="fixed inset-y-0 left-0 z-40 flex w-64 -translate-x-full flex-col bg-cms-blue text-white transition-transform duration-300 lg:translate-x-0"
    aria-label="Sidebar"
>
    <div class="flex h-32 flex-col items-center justify-center gap-3 border-b border-white/15 px-6 text-center">
        <div class="flex h-14 w-32 items-center justify-center rounded-2xl px-3">
            <img src="{{ asset('images/logo/ptsp.png') }}" alt="Logo DPMPTSP" class="max-h-10 w-full object-contain">
        </div>

        <div class="min-w-0">
            <div class="truncate text-base font-extrabold leading-tight">{{ config('app.name') }}</div>
            <div class="text-xs font-medium text-white/75">Tangerang Selatan</div>
        </div>
    </div>

    <nav class="flex-1 space-y-2 px-4 py-5">
        <a href="{{ route('cms.dashboard') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold {{ request()->routeIs('cms.dashboard') ? 'bg-white/20 text-white' : 'text-white/85 hover:bg-white/10 hover:text-white' }}">
            <i data-lucide="home" class="h-5 w-5"></i>
            Dashboard
        </a>
        <a href="{{ route('cms.users.index') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold {{ request()->routeIs('cms.users.*') ? 'bg-white/20 text-white' : 'text-white/85 hover:bg-white/10 hover:text-white' }}">
            <i data-lucide="users" class="h-5 w-5"></i>
            Users
        </a>
        <a href="{{ route('cms.header-menus.index') }}" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold text-white/85 hover:bg-white/10 hover:text-white">
            <i data-lucide="bar-chart-3" class="h-5 w-5"></i>
            Header Menu
        </a>
        <a href="#" class="flex items-center gap-3 rounded-xl px-4 py-3 text-sm font-semibold text-white/85 hover:bg-white/10 hover:text-white">
            <i data-lucide="settings" class="h-5 w-5"></i>
            Settings
        </a>
    </nav>

    <div class="border-t border-white/15 p-4">
        <form method="POST" action="{{ route('cms.logout') }}">
            @csrf
            <button type="submit" class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-left text-sm font-semibold text-white/85 hover:bg-white/10 hover:text-white">
                <i data-lucide="log-out" class="h-5 w-5"></i>
                Logout
            </button>
        </form>
    </div>
</aside>
