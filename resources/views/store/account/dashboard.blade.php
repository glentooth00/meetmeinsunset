
<x-layouts.consumer>
    <x-slot:title>Dashboard</x-slot:title>
    <x-slot:heading>Dashboard</x-slot:heading>

    <div class="space-y-8">

        {{-- Welcome --}}
        <section class="overflow-hidden rounded-2xl bg-[#183B56] p-7 text-white sm:p-9">
            <div class="relative z-10">
                <p class="text-sm font-medium text-slate-300">
                    Welcome back,
                </p>

                <h2 class="mt-2 text-2xl font-bold sm:text-3xl">
                    {{ auth('consumer')->user()->name }}!
                </h2>

                <p class="mt-3 max-w-xl text-sm leading-6 text-slate-300">
                    Manage your orders, keep track of your purchases,
                    and discover your next favorite essentials.
                </p>

                <a href="{{ route('store.shop') }}"
                   class="mt-6 inline-flex items-center gap-2 rounded-full bg-white px-5 py-3 text-sm font-semibold text-[#183B56] transition hover:bg-[#168C91] hover:text-white">
                    Start Shopping
                    <x-lucide-arrow-right class="h-4 w-4"/>
                </a>
            </div>
        </section>

        {{-- Statistics --}}
        <section>
            <div class="mb-4">
                <h3 class="text-lg font-bold text-[#183B56]">
                    Your Overview
                </h3>
                <p class="text-sm text-slate-500">
                    A quick look at your shopping activity.
                </p>
            </div>

            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">

                <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-slate-500">Cart Items</span>
                        <div class="rounded-xl bg-[#168C91]/10 p-3 text-[#168C91]">
                            <x-lucide-shopping-cart class="h-5 w-5"/>
                        </div>
                    </div>
                    <p class="mt-4 text-3xl font-bold text-[#183B56]">0</p>
                    <p class="mt-1 text-xs text-slate-400">Items in your cart</p>
                </div>

                <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-slate-500">Active Orders</span>
                        <div class="rounded-xl bg-amber-50 p-3 text-amber-600">
                            <x-lucide-package class="h-5 w-5"/>
                        </div>
                    </div>
                    <p class="mt-4 text-3xl font-bold text-[#183B56]">0</p>
                    <p class="mt-1 text-xs text-slate-400">Orders being processed</p>
                </div>

                <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-slate-500">Completed Orders</span>
                        <div class="rounded-xl bg-emerald-50 p-3 text-emerald-600">
                            <x-lucide-check-circle class="h-5 w-5"/>
                        </div>
                    </div>
                    <p class="mt-4 text-3xl font-bold text-[#183B56]">0</p>
                    <p class="mt-1 text-xs text-slate-400">Successfully completed</p>
                </div>

            </div>
        </section>

        {{-- Quick Links --}}
        <section>
            <h3 class="mb-4 text-lg font-bold text-[#183B56]">
                Quick Access
            </h3>

            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-3">

                <a href="{{ route('cart.index') }}"
                   class="group rounded-2xl border border-slate-100 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                    <x-lucide-shopping-bag class="h-7 w-7 text-[#168C91]"/>
                    <h4 class="mt-4 font-bold text-[#183B56]">My Cart</h4>
                    <p class="mt-1 text-sm text-slate-500">
                        Review the products you've selected.
                    </p>
                    <span class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-[#168C91]">
                        View Cart <x-lucide-arrow-right class="h-4 w-4"/>
                    </span>
                </a>

                <a href="{{ route('consumer.orders') }}"
                   class="group rounded-2xl border border-slate-100 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                    <x-lucide-package class="h-7 w-7 text-[#168C91]"/>
                    <h4 class="mt-4 font-bold text-[#183B56]">My Orders</h4>
                    <p class="mt-1 text-sm text-slate-500">
                        Check the status of your orders.
                    </p>
                    <span class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-[#168C91]">
                        View Orders <x-lucide-arrow-right class="h-4 w-4"/>
                    </span>
                </a>

                <a href="{{ route('consumer.account') }}"
                   class="group rounded-2xl border border-slate-100 bg-white p-5 shadow-sm transition hover:-translate-y-1 hover:shadow-md">
                    <x-lucide-user-round class="h-7 w-7 text-[#168C91]"/>
                    <h4 class="mt-4 font-bold text-[#183B56]">My Account</h4>
                    <p class="mt-1 text-sm text-slate-500">
                        Manage your personal information.
                    </p>
                    <span class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-[#168C91]">
                        Manage Account <x-lucide-arrow-right class="h-4 w-4"/>
                    </span>
                </a>

            </div>
        </section>

        {{-- Recent Orders --}}
        <section class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <div>
                    <h3 class="font-bold text-[#183B56]">Recent Orders</h3>
                    <p class="mt-1 text-sm text-slate-500">
                        Your latest purchases will appear here.
                    </p>
                </div>

                <a href="{{ route('consumer.orders.history') }}"
                   class="text-sm font-semibold text-[#168C91] hover:underline">
                    View Order History
                </a>
            </div>

            <div class="py-12 text-center">
                <x-lucide-clipboard-list class="mx-auto h-10 w-10 text-slate-300"/>
                <p class="mt-3 font-medium text-slate-600">
                    No orders yet
                </p>
                <p class="mt-1 text-sm text-slate-400">
                    Your order activity will appear here.
                </p>
            </div>
        </section>

    </div>
</x-layouts.consumer>
