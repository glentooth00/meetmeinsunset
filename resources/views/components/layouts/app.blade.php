
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'MeetMeinSunset' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-full bg-background text-foreground antialiased"
      x-data="{ sidebarOpen: false }">

    <div class="min-h-screen">

        {{-- Mobile sidebar backdrop --}}
        <div
            x-show="sidebarOpen"
            x-transition.opacity
            @click="sidebarOpen = false"
            class="fixed inset-0 z-40 bg-black/50 lg:hidden"
            style="display: none;"
        ></div>

        {{-- Sidebar --}}
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
                    <h1 class="text-sm font-bold tracking-tight">
                        MeetMeinSunset
                    </h1>
                    <p class="text-xs text-muted-foreground">
                        Your workspace
                    </p>
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

                <div>
                    <p class="mb-2 px-3 text-xs font-semibold uppercase tracking-wider text-muted-foreground">
                        Workspace
                    </p>

                    <div class="space-y-1">

                        <a href="{{ url('/dashboard') }}"
                           class="flex items-center gap-3 rounded-lg bg-accent px-3 py-2.5 text-sm font-medium text-accent-foreground">
                            <x-lucide-layout-dashboard class="h-4 w-4" />
                            Dashboard
                        </a>

                        <a href="#"
                           class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-muted-foreground transition hover:bg-accent hover:text-foreground">
                            <x-lucide-users class="h-4 w-4" />
                            Users
                        </a>

                        <a href="#"
                           class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-muted-foreground transition hover:bg-accent hover:text-foreground">
                            <x-lucide-settings class="h-4 w-4" />
                            Settings
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

        {{-- Main area --}}
        <div class="min-h-screen lg:pl-64">

            {{-- Topbar --}}
            <header class="sticky top-0 z-30 flex h-16 items-center justify-between border-b border-border bg-background/95 px-4 backdrop-blur sm:px-6">

                <div class="flex items-center gap-3">

                    <button
                        type="button"
                        @click="sidebarOpen = true"
                        class="rounded-md p-2 text-muted-foreground hover:bg-accent lg:hidden"
                    >
                        <x-lucide-menu class="h-5 w-5" />
                    </button>

                    <div>
                        <p class="text-sm font-semibold">
                            {{ $header ?? 'Dashboard' }}
                        </p>
                    </div>

                </div>

                <div class="flex items-center gap-2">

                    {{-- Theme toggle --}}
                    <button
                        type="button"
                        @click="$store.theme.toggle()"
                        class="rounded-lg border border-border p-2 text-muted-foreground transition hover:bg-accent"
                        title="Toggle theme"
                    >
                        <x-lucide-sun class="h-4 w-4" />
                    </button>

                    {{-- User menu --}}
                    @auth
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                type="submit"
                                class="rounded-lg px-3 py-2 text-sm text-muted-foreground transition hover:bg-accent hover:text-foreground"
                            >
                                <span class="inline-flex items-center gap-2">
                                    <x-lucide-log-out class="h-4 w-4" />
                                    <span class="hidden sm:inline">Logout</span>
                                </span>
                            </button>
                        </form>
                    @endauth

                </div>
            </header>

            {{-- Page content --}}
            <main class="p-4 sm:p-6 lg:p-8">

                @isset($header)
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold tracking-tight">
                            {{ $header }}
                        </h2>
                    </div>
                @endisset

                {{ $slot }}

            </main>

            {{-- Footer --}}
            <footer class="border-t border-border px-6 py-4">
                <p class="text-center text-xs text-muted-foreground">
                    &copy; {{ date('Y') }} MeetMeinSunset. All rights reserved.
                </p>
            </footer>

        </div>

    </div>

</body>
</html>
