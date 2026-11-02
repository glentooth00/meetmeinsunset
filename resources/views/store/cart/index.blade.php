
<x-layouts.consumer>
    <x-slot:title>My Cart</x-slot:title>
    <x-slot:heading>My Cart</x-slot:heading>

    <section class="min-h-[70vh] bg-[#F8FAFB] px-4 py-12 sm:px-6 lg:py-16">
        <div class="mx-auto max-w-6xl">

            <div class="mb-8">
                <p class="text-xs font-bold uppercase tracking-widest text-[#168C91]">
                    Your Shopping Bag
                </p>

                <h1 class="mt-2 text-3xl font-bold text-[#183B56]">
                    My Cart
                </h1>

                <p class="mt-2 text-sm text-slate-500">
                    Review your selected products before checkout.
                </p>
            </div>

            <div class="rounded-2xl border border-slate-100 bg-white p-10 text-center shadow-sm">
                <x-lucide-shopping-bag class="mx-auto h-12 w-12 text-slate-300" />

                <h2 class="mt-4 text-lg font-semibold text-[#183B56]">
                    Your cart is empty
                </h2>

                <p class="mt-2 text-sm text-slate-500">
                    You haven't added any products yet.
                </p>

                <a href="{{ route('store.shop') }}"
                   class="mt-6 inline-flex rounded-full bg-[#183B56] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#168C91]">
                    Continue Shopping
                </a>
            </div>

        </div>
    </section>

</x-layouts.consumer>