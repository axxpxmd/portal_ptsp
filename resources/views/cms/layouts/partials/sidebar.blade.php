<aside
    id="cms-sidebar"
    class="fixed inset-y-0 left-0 z-40 flex w-72 -translate-x-full flex-col bg-cms-blue text-white transition-transform duration-300 lg:translate-x-0"
    aria-label="Sidebar"
>
    <div class="flex h-16 items-center border-b border-white/15 px-6">
        <div>
            <div class="text-base font-extrabold uppercase tracking-wide">CMS PTSP</div>
            <div class="text-xs font-medium text-white/75">Tangerang Selatan</div>
        </div>
    </div>

    <nav class="flex-1 space-y-1 px-4 py-5">
        <a href="{{ route('cms.dashboard') }}" class="flex items-center gap-3 rounded-md bg-white/15 px-4 py-3 text-sm font-semibold">
            <i data-lucide="layout-dashboard" class="h-5 w-5"></i>
            Dashboard
        </a>
        <a href="#" class="flex items-center gap-3 rounded-md px-4 py-3 text-sm font-semibold text-white/85 hover:bg-white/10 hover:text-white">
            <i data-lucide="users" class="h-5 w-5"></i>
            Users
        </a>
        <a href="#" class="flex items-center gap-3 rounded-md px-4 py-3 text-sm font-semibold text-white/85 hover:bg-white/10 hover:text-white">
            <i data-lucide="bar-chart-3" class="h-5 w-5"></i>
            Reports
        </a>
        <a href="#" class="flex items-center gap-3 rounded-md px-4 py-3 text-sm font-semibold text-white/85 hover:bg-white/10 hover:text-white">
            <i data-lucide="settings" class="h-5 w-5"></i>
            Settings
        </a>
    </nav>

    <div class="border-t border-white/15 p-4">
        <form method="POST" action="{{ route('cms.logout') }}">
            @csrf
            <button type="submit" class="flex w-full items-center gap-3 rounded-md px-4 py-3 text-left text-sm font-semibold text-white/85 hover:bg-white/10 hover:text-white">
                <i data-lucide="log-out" class="h-5 w-5"></i>
                Logout
            </button>
        </form>
    </div>
</aside>
