
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'MeetMeinSunset' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="min-h-full bg-background text-foreground antialiased"
    x-data="{ sidebarOpen: false }"
>
    <div class="min-h-screen">

        {{-- Mobile sidebar backdrop --}}
        <div
            x-show="sidebarOpen"
            x-transition.opacity
            @click="sidebarOpen = false"
            class="fixed inset-0 z-40 bg-black/50 lg:hidden"
            style="display: none;"
        ></div>

        {{-- Sidebar component --}}
        <x-admin.sidebar />

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

                    <p class="text-sm font-semibold">
                        {{ $header ?? 'Dashboard' }}
                    </p>
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

                    {{-- Logout --}}
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
