
<x-layouts.app>

    <x-slot:header>
        Dashboard
    </x-slot:header>

    <div class="space-y-8">

        {{-- Welcome --}}
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-slate-900">
                    Welcome back, {{ auth()->user()->name }}!
                </h1>
                <p class="mt-1 text-sm text-slate-500">
                    Here's what's happening with your store.
                </p>
            </div>

            <div class="text-sm text-slate-500">
                {{ now()->format('l, F d, Y') }}
            </div>
        </div>


        {{-- Summary Cards --}}
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">

            {{-- Revenue --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-slate-500">Total Revenue</p>
                    <div class="rounded-xl bg-teal-50 p-3 text-teal-700">
                        <x-lucide-wallet class="h-5 w-5"/>
                    </div>
                </div>

                <p class="mt-5 text-2xl font-bold text-slate-900">₱0.00</p>
                <p class="mt-1 text-xs text-slate-400">No sales data yet</p>
            </div>

            {{-- Orders --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-slate-500">Total Orders</p>
                    <div class="rounded-xl bg-blue-50 p-3 text-blue-700">
                        <x-lucide-shopping-bag class="h-5 w-5"/>
                    </div>
                </div>

                <p class="mt-5 text-2xl font-bold text-slate-900">0</p>
                <p class="mt-1 text-xs text-slate-400">Orders received</p>
            </div>

            {{-- Products --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-slate-500">Products</p>
                    <div class="rounded-xl bg-orange-50 p-3 text-orange-700">
                        <x-lucide-package class="h-5 w-5"/>
                    </div>
                </div>

                <p class="mt-5 text-2xl font-bold text-slate-900">0</p>
                <p class="mt-1 text-xs text-slate-400">Products in catalog</p>
            </div>

            {{-- Customers --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-slate-500">Customers</p>
                    <div class="rounded-xl bg-purple-50 p-3 text-purple-700">
                        <x-lucide-users class="h-5 w-5"/>
                    </div>
                </div>

                <p class="mt-5 text-2xl font-bold text-slate-900">0</p>
                <p class="mt-1 text-xs text-slate-400">Registered customers</p>
            </div>

        </div>


        {{-- Main Dashboard Content --}}
        <div class="grid grid-cols-1 gap-6 xl:grid-cols-3">

            {{-- Recent Orders --}}
            <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm xl:col-span-2">

                <div class="flex items-center justify-between border-b border-slate-100 px-6 py-5">
                    <div>
                        <h2 class="font-semibold text-slate-900">Recent Orders</h2>
                        <p class="mt-1 text-xs text-slate-500">
                            Monitor your latest customer orders.
                        </p>
                    </div>

                    <a href="#"
                       class="text-sm font-semibold text-[#168C91] hover:text-[#183B56]">
                        View All
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">
                            <tr>
                                <th class="px-6 py-4 font-semibold">Order</th>
                                <th class="px-6 py-4 font-semibold">Customer</th>
                                <th class="px-6 py-4 font-semibold">Date</th>
                                <th class="px-6 py-4 font-semibold">Amount</th>
                                <th class="px-6 py-4 font-semibold">Status</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-slate-100 text-slate-400">
                                        <x-lucide-shopping-bag class="h-6 w-6"/>
                                    </div>

                                    <p class="mt-4 font-medium text-slate-700">
                                        No orders yet
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        Customer orders will appear here.
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>


            {{-- Quick Actions --}}
            <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

                <h2 class="font-semibold text-slate-900">Quick Actions</h2>
                <p class="mt-1 text-xs text-slate-500">
                    Manage your online store.
                </p>

                <div class="mt-6 space-y-3">

                    <a href="#"
                       class="flex items-center gap-4 rounded-xl border border-slate-100 p-4 transition hover:border-teal-200 hover:bg-teal-50/50">
                        <div class="rounded-lg bg-teal-50 p-3 text-teal-700">
                            <x-lucide-plus class="h-5 w-5"/>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-slate-800">Add Product</p>
                            <p class="mt-1 text-xs text-slate-500">Create a new product</p>
                        </div>
                    </a>

                    <a href="#"
                       class="flex items-center gap-4 rounded-xl border border-slate-100 p-4 transition hover:border-blue-200 hover:bg-blue-50/50">
                        <div class="rounded-lg bg-blue-50 p-3 text-blue-700">
                            <x-lucide-shopping-cart class="h-5 w-5"/>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-slate-800">Manage Orders</p>
                            <p class="mt-1 text-xs text-slate-500">View customer orders</p>
                        </div>
                    </a>

                    <a href="#"
                       class="flex items-center gap-4 rounded-xl border border-slate-100 p-4 transition hover:border-purple-200 hover:bg-purple-50/50">
                        <div class="rounded-lg bg-purple-50 p-3 text-purple-700">
                            <x-lucide-users class="h-5 w-5"/>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-slate-800">Customers</p>
                            <p class="mt-1 text-xs text-slate-500">View registered customers</p>
                        </div>
                    </a>

                    <a href="#"
                       class="flex items-center gap-4 rounded-xl border border-slate-100 p-4 transition hover:border-orange-200 hover:bg-orange-50/50">
                        <div class="rounded-lg bg-orange-50 p-3 text-orange-700">
                            <x-lucide-settings class="h-5 w-5"/>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-slate-800">Store Settings</p>
                            <p class="mt-1 text-xs text-slate-500">Configure your store</p>
                        </div>
                    </a>

                </div>
            </div>

        </div>


        {{-- Store Overview --}}
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">

            <div class="flex items-center gap-3">
                <div class="rounded-xl bg-teal-50 p-3 text-teal-700">
                    <x-lucide-store class="h-6 w-6"/>
                </div>

                <div>
                    <h2 class="font-semibold text-slate-900">
                        MeetMeinSunset Store
                    </h2>
                    <p class="mt-1 text-xs text-slate-500">
                        Your online medical apparel store.
                    </p>
                </div>
            </div>

            <div class="mt-6 flex flex-col justify-between gap-4 rounded-xl bg-slate-50 p-5 sm:flex-row sm:items-center">
                <div>
                    <p class="text-sm font-semibold text-slate-800">
                        Your storefront is ready for setup.
                    </p>
                    <p class="mt-1 text-xs text-slate-500">
                        Start by adding products and configuring your catalog.
                    </p>
                </div>

                <a href="{{ route('store.home') }}"
                   target="_blank"
                   class="inline-flex items-center justify-center gap-2 rounded-full bg-[#183B56] px-5 py-3 text-xs font-semibold text-white transition hover:bg-[#168C91]">
                    View Storefront
                    <x-lucide-external-link class="h-4 w-4"/>
                </a>
            </div>

        </div>

    </div>

</x-layouts.app>
