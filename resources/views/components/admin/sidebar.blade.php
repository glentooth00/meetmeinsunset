
<aside
    class="fixed inset-y-0 left-0 z-50 flex w-64 flex-col border-r border-border bg-card transition-transform duration-200 lg:translate-x-0"
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
>
    {{-- Brand --}}
    <div class="flex h-16 items-center gap-3 border-b border-border px-6">
        <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-primary text-primary-foreground">
            <span class="text-lg font-bold">M</span>
        </div>

        <div>
            <h1 class="text-sm font-bold tracking-tight">MeetMeinSunset</h1>
            <p class="text-xs text-muted-foreground">Your workspace</p>
        </div>

        <button
            type="button"
            @click="sidebarOpen = false"
            class="ml-auto rounded-md p-2 text-muted-foreground hover:bg-accent lg:hidden"
        >
            &times;
        </button>
    </div>

    {{-- Navigation --}}
    <nav class="flex-1 space-y-6 overflow-y-auto px-3 py-5">

        {{-- Workspace --}}
        <div>
            <p class="mb-2 px-3 text-xs font-semibold uppercase tracking-wider text-muted-foreground">
                Workspace
            </p>

            <div class="space-y-1">

                <a href="{{ route('admin.dashboard') }}"
                   @class([
                       'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition',
                       'bg-accent text-accent-foreground' => request()->routeIs('admin.dashboard'),
                       'text-muted-foreground hover:bg-accent hover:text-foreground' => !request()->routeIs('admin.dashboard'),
                   ])>
                    <x-lucide-layout-dashboard class="h-4 w-4" />
                    Dashboard
                </a>

                <a href="#"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-muted-foreground transition hover:bg-accent hover:text-foreground">
                    <x-lucide-shopping-bag class="h-4 w-4" />
                    Products
                </a>

                <a href="#"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-muted-foreground transition hover:bg-accent hover:text-foreground">
                    <x-lucide-layers class="h-4 w-4" />
                    Categories
                </a>

                <a href="#"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-muted-foreground transition hover:bg-accent hover:text-foreground">
                    <x-lucide-shopping-cart class="h-4 w-4" />
                    Orders
                </a>

            </div>
        </div>

        {{-- Store Management --}}
        <div>
            <p class="mb-2 px-3 text-xs font-semibold uppercase tracking-wider text-muted-foreground">
                Store Management
            </p>

            <div class="space-y-1">

                <a href="#"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-muted-foreground transition hover:bg-accent hover:text-foreground">
                    <x-lucide-images class="h-4 w-4" />
                    Media Library
                </a>

                <a href="{{ route('admin.hero.edit') }}"
                @class([
                    'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition',
                    'bg-accent text-accent-foreground font-medium' => request()->routeIs('admin.hero.*'),
                    'text-muted-foreground hover:bg-accent hover:text-foreground' => !request()->routeIs('admin.hero.*'),
                ])>
                    <x-lucide-panels-top-left class="h-4 w-4" />
                    Homepage / Hero
                </a>

                <a href="#"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-muted-foreground transition hover:bg-accent hover:text-foreground">
                    <x-lucide-tags class="h-4 w-4" />
                    Promotions
                </a>

            </div>
        </div>

        {{-- Settings --}}
        <div>
            <p class="mb-2 px-3 text-xs font-semibold uppercase tracking-wider text-muted-foreground">
                Settings
            </p>

            <div class="space-y-1">

                <a href="#"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-muted-foreground transition hover:bg-accent hover:text-foreground">
                    <x-lucide-users class="h-4 w-4" />
                    Customers
                </a>

                <a href="#"
                   class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-muted-foreground transition hover:bg-accent hover:text-foreground">
                    <x-lucide-settings class="h-4 w-4" />
                    Store Settings
                </a>

            </div>
        </div>

    </nav>

    {{-- Sidebar footer --}}
    <div class="border-t border-border p-4">
        <div class="flex items-center gap-3 rounded-lg p-2">
            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-muted text-sm font-semibold">
                {{ strtoupper(substr(auth()->user()->name ?? 'G', 0, 1)) }}
            </div>

            <div class="min-w-0 flex-1">
                <p class="truncate text-sm font-medium">
                    {{ auth()->user()->name ?? 'Guest User' }}
                </p>
                <p class="truncate text-xs text-muted-foreground">
                    {{ auth()->user()->email ?? '' }}
                </p>
            </div>
        </div>
    </div>
</aside>
