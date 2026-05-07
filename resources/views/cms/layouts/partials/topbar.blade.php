<header class="sticky top-0 z-20 flex h-16 items-center justify-between border-b border-cms-line bg-white px-4 md:px-6">
    <div class="flex items-center gap-3">
        <button
            id="sidebar-toggle"
            type="button"
            class="inline-flex h-10 w-10 items-center justify-center rounded-md border border-cms-line bg-white text-neutral-700 hover:bg-neutral-50"
            aria-label="Toggle sidebar"
            aria-expanded="false"
        >
            <i data-lucide="menu" class="h-5 w-5"></i>
        </button>

        <div class="hidden h-10 w-28 items-center justify-center rounded-md border border-cms-line bg-white px-2 sm:flex">
            <img src="{{ asset('images/logo/ptsp.png') }}" alt="Logo DPMPTSP" class="max-h-7 w-full object-contain">
        </div>

        <div>
            <div class="text-sm font-bold text-neutral-900">@yield('page-title', 'Dashboard')</div>
            <div class="text-xs font-medium text-neutral-500">CMS {{ config('app.name') }}</div>
        </div>
    </div>

    <div class="flex items-center gap-3">
        <div class="hidden text-right sm:block">
            <div class="text-sm font-bold">{{ auth()->user()?->nama ?: auth()->user()?->username }}</div>
            <div class="text-xs font-medium capitalize text-neutral-500">{{ auth()->user()?->role }}</div>
        </div>
        <div class="flex h-10 w-10 items-center justify-center rounded-md border border-cms-line bg-white text-sm font-extrabold text-cms-blue">
            {{ str(auth()->user()?->nama ?: auth()->user()?->username ?: 'A')->substr(0, 1)->upper() }}
        </div>
    </div>
</header>
