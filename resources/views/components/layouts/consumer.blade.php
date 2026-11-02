
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'My Account' }} | MeetMeinSunset</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="min-h-screen bg-[#F4F8FA] text-slate-700 antialiased">

    <div class="min-h-screen lg:flex">

        {{-- Sidebar --}}
        <aside class="flex w-full flex-col bg-[#183B56] text-white lg:fixed lg:inset-y-0 lg:w-64">

            <div class="flex h-20 items-center justify-between border-b border-white/10 px-6">
                <a href="{{ route('consumer.dashboard') }}"
                   class="flex items-center gap-3">
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/10">
                        <x-lucide-shopping-bag class="h-5 w-5 text-white"/>
                    </div>

                    <div>
                        <span class="block text-lg font-bold tracking-tight">
                            MeetMeinSunset
                        </span>
                        <span class="text-[10px] uppercase tracking-[0.2em] text-slate-300">
                            Customer Panel
                        </span>
                    </div>
                </a>

                <a href="{{ route('store.home') }}"
                   class="text-slate-300 transition hover:text-white lg:hidden"
                   aria-label="Back to store">
                    <x-lucide-store class="h-5 w-5"/>
                </a>
            </div>

            <div class="px-5 py-6">
                <p class="mb-3 px-3 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-400">
                    Menu
                </p>

                @php
                    $navigation = [
                        [
                            'label' => 'Dashboard',
                            'route' => 'consumer.dashboard',
                            'icon' => 'layout-dashboard',
                            'active' => request()->routeIs('consumer.dashboard'),
                        ],
                        [
                            'label' => 'Cart',
                            'route' => 'cart.index',
                            'icon' => 'shopping-cart',
                            'active' => request()->routeIs('cart.index'),
                        ],
                        [
                            'label' => 'Orders',
                            'route' => 'consumer.orders',
                            'icon' => 'package',
                            'active' => request()->routeIs('consumer.orders'),
                        ],
                        [
                            'label' => 'Order History',
                            'route' => 'consumer.orders.history',
                            'icon' => 'history',
                            'active' => request()->routeIs('consumer.orders.history'),
                        ],
                        [
                            'label' => 'My Account',
                            'route' => 'consumer.account',
                            'icon' => 'user-round',
                            'active' => request()->routeIs('consumer.account'),
                        ],
                    ];
                @endphp

                <nav class="flex gap-2 overflow-x-auto lg:flex-col">
                    @foreach ($navigation as $item)
                        <a href="{{ route($item['route']) }}"
                           @class([
                               'flex shrink-0 items-center gap-3 rounded-xl px-4 py-3 text-sm font-medium transition',
                               'bg-white text-[#183B56] shadow-sm' => $item['active'],
                               'text-slate-300 hover:bg-white/10 hover:text-white' => !$item['active'],
                           ])>

                            @if ($item['icon'] === 'layout-dashboard')
                                <x-lucide-layout-dashboard class="h-5 w-5"/>
                            @elseif ($item['icon'] === 'shopping-cart')
                                <x-lucide-shopping-cart class="h-5 w-5"/>
                            @elseif ($item['icon'] === 'package')
                                <x-lucide-package class="h-5 w-5"/>
                            @elseif ($item['icon'] === 'history')
                                <x-lucide-history class="h-5 w-5"/>
                            @elseif ($item['icon'] === 'user-round')
                                <x-lucide-user-round class="h-5 w-5"/>
                            @endif

                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </nav>
            </div>

            <div class="mt-auto hidden border-t border-white/10 p-5 lg:block">
                <a href="{{ route('store.home') }}"
                   class="mb-3 flex items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-300 transition hover:bg-white/10 hover:text-white">
                    <x-lucide-store class="h-5 w-5"/>
                    Back to Store
                </a>

                <form method="POST" action="{{ route('customer.logout') }}">
                    @csrf

                    <button type="submit"
                            class="flex w-full items-center gap-3 rounded-xl px-4 py-3 text-sm text-slate-300 transition hover:bg-red-500/10 hover:text-red-300">
                        <x-lucide-log-out class="h-5 w-5"/>
                        Sign Out
                    </button>
                </form>
            </div>
        </aside>

        {{-- Main Content --}}
        <main class="min-w-0 flex-1 lg:ml-64">

            {{-- Topbar --}}
            <header class="sticky top-0 z-30 flex h-20 items-center justify-between border-b border-slate-200 bg-white/95 px-5 backdrop-blur sm:px-8">

                <div>
                    <p class="text-xs text-slate-400">
                        Customer Portal
                    </p>
                    <h1 class="text-lg font-bold text-[#183B56]">
                        {{ $heading ?? 'My Account' }}
                    </h1>
                </div>

                <div class="flex items-center gap-3">
                    <div class="hidden text-right sm:block">
                        <p class="text-sm font-semibold text-[#183B56]">
                            {{ auth('consumer')->user()->name }}
                        </p>
                        <p class="text-xs text-slate-400">
                            Customer Account
                        </p>
                    </div>

                    <div class="flex h-10 w-10 items-center justify-center rounded-full bg-[#168C91]/10 font-bold text-[#168C91]">
                        {{ strtoupper(substr(auth('consumer')->user()->name, 0, 1)) }}
                    </div>
                </div>
            </header>

            {{-- Page Content --}}
            <div class="p-5 sm:p-8">
                {{ $slot }}
            </div>

            {{-- Mobile footer actions --}}
            <div class="border-t border-slate-200 bg-white p-4 lg:hidden">
                <div class="flex items-center justify-between">
                    <a href="{{ route('store.home') }}"
                       class="text-sm font-medium text-[#183B56]">
                        <x-lucide-store class="mr-1 inline h-4 w-4"/>
                        Back to Store
                    </a>

                    <form method="POST" action="{{ route('customer.logout') }}">
                        @csrf
                        <button type="submit"
                                class="text-sm font-medium text-red-500">
                            <x-lucide-log-out class="mr-1 inline h-4 w-4"/>
                            Sign Out
                        </button>
                    </form>
                </div>
            </div>

        </main>
    </div>

</body>
</html>
