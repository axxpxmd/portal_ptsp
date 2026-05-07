<header class="sticky top-0 z-20 flex h-16 items-center justify-between border-b border-cms-line bg-white px-5 md:px-7">
    <div class="flex min-w-0 flex-1 items-center gap-4">
        <button
            id="sidebar-toggle"
            type="button"
            class="inline-flex h-10 w-10 shrink-0 items-center justify-center rounded-xl border border-cms-line bg-white text-neutral-600 hover:bg-neutral-50"
            aria-label="Toggle sidebar"
            aria-expanded="false"
        >
            <i data-lucide="menu" class="h-5 w-5"></i>
        </button>

        <div class="hidden h-11 w-32 items-center justify-center rounded-2xl border border-cms-line bg-neutral-50 px-3 md:flex">
            <img src="{{ asset('images/logo/ptsp.png') }}" alt="Logo DPMPTSP" class="max-h-8 w-full object-contain">
        </div>

        <div class="md:hidden">
            <div class="text-sm font-bold text-neutral-900">@yield('page-title', 'Dashboard')</div>
            <div class="text-xs font-medium text-neutral-500">CMS {{ config('app.name') }}</div>
        </div>
    </div>

    <div class="flex shrink-0 items-center gap-3">
        <div class="hidden items-center gap-2 rounded-2xl bg-neutral-50 px-4 py-2 text-sm font-semibold text-neutral-700 lg:flex">
            <i data-lucide="calendar-days" class="h-4 w-4 text-cms-blue"></i>
            {{ now()->format('d M Y') }}
        </div>

        <button type="button" class="relative hidden h-10 w-10 items-center justify-center rounded-xl bg-neutral-50 text-neutral-600 hover:bg-neutral-100 sm:inline-flex">
            <i data-lucide="bell" class="h-5 w-5"></i>
            <span class="absolute right-2 top-2 h-2 w-2 rounded-full bg-red-500"></span>
        </button>

        <div class="hidden text-right sm:block">
            <div class="text-sm font-bold">{{ auth()->user()?->nama ?: auth()->user()?->username }}</div>
            <div class="text-xs font-medium capitalize text-neutral-500">{{ auth()->user()?->role }}</div>
        </div>
        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-cms-blue text-sm font-extrabold text-white">
            {{ str(auth()->user()?->nama ?: auth()->user()?->username ?: 'A')->substr(0, 1)->upper() }}
        </div>
    </div>
</header>
