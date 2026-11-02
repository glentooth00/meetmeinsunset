<x-layouts.store>
    {{-- Shop Header --}}
    <section class="bg-[#F8FAFB] border-b border-gray-100">
        <div class="mx-auto max-w-7xl px-4 py-14 sm:px-6 lg:px-8">
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#168C91]">
                MeetMeinSunset Collection
            </p>

            <h1 class="mt-3 text-3xl font-bold tracking-tight text-[#183B56] md:text-4xl">
                Shop All
            </h1>

            <p class="mt-3 max-w-xl text-sm leading-6 text-gray-500">
                Discover thoughtfully selected medical apparel designed
                for comfort, confidence, and everyday performance.
            </p>
        </div>
    </section>

    {{-- Shop Content --}}
    <section class="py-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            {{-- Filters --}}
            <form method="GET" action="{{ route('store.shop') }}"
                  class="mb-8 space-y-4">

                <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between">

                    {{-- Search --}}
                    <div class="relative w-full lg:max-w-sm">
                        <x-lucide-search
                            class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-400"/>

                        <input
                            type="search"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="Search products..."
                            class="w-full rounded-lg border border-gray-200 bg-white py-3 pl-10 pr-4 text-sm text-gray-700 outline-none transition focus:border-[#168C91] focus:ring-1 focus:ring-[#168C91]"
                        />
                    </div>

                    <div class="flex flex-col gap-3 sm:flex-row">

                        {{-- Category --}}
                        <select
                            name="category"
                            onchange="this.form.submit()"
                            class="min-w-[180px] rounded-lg border border-gray-200 bg-white px-4 py-3 text-sm text-gray-700 outline-none focus:border-[#168C91]">

                            <option value="">All Categories</option>

                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->slug }}"
                                    @selected(request('category') === $category->slug)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>

                        {{-- Sorting --}}
                        <select
                            name="sort"
                            onchange="this.form.submit()"
                            class="min-w-[180px] rounded-lg border border-gray-200 bg-white px-4 py-3 text-sm text-gray-700 outline-none focus:border-[#168C91]">

                            <option value="newest" @selected(request('sort', 'newest') === 'newest')>
                                Newest Arrivals
                            </option>

                            <option value="price_low" @selected(request('sort') === 'price_low')>
                                Price: Low to High
                            </option>

                            <option value="price_high" @selected(request('sort') === 'price_high')>
                                Price: High to Low
                            </option>

                            <option value="name" @selected(request('sort') === 'name')>
                                Name: A to Z
                            </option>
                        </select>

                        <button
                            type="submit"
                            class="rounded-lg bg-[#183B56] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#168C91]">
                            Search
                        </button>

                        @if(request()->hasAny(['search', 'category', 'sort']))
                            <a href="{{ route('store.shop') }}"
                               class="rounded-lg border border-gray-200 px-5 py-3 text-center text-sm font-medium text-gray-600 transition hover:bg-gray-50">
                                Clear
                            </a>
                        @endif
                    </div>
                </div>
            </form>

            {{-- Results information --}}
            <div class="mb-6 flex items-center justify-between">
                <p class="text-sm text-gray-500">
                    Showing
                    <span class="font-semibold text-[#183B56]">
                        {{ $products->firstItem() ?? 0 }}–{{ $products->lastItem() ?? 0 }}
                    </span>
                    of
                    <span class="font-semibold text-[#183B56]">
                        {{ $products->total() }}
                    </span>
                    products
                </p>
            </div>

            {{-- Product Grid --}}
            @if($products->isNotEmpty())
                <div class="grid grid-cols-2 gap-x-4 gap-y-8 sm:gap-x-6 md:grid-cols-3 lg:grid-cols-4">

                    @foreach($products as $product)
                        <x-store.product-card
                            :name="$product->name"
                            :category="$product->category?->name ?? 'Medical Apparel'"
                            :price="$product->sale_price ?? $product->price"
                            :badge="$product->sale_price ? 'Sale' : ($product->is_featured ? 'Featured' : null)"
                            :image="$product->image_path ? asset('storage/' . $product->image_path) : null"
                        />
                    @endforeach

                </div>

                {{-- Pagination --}}
                <div class="mt-12">
                    {{ $products->links() }}
                </div>
            @else
                {{-- Empty State --}}
                <div class="rounded-2xl border border-dashed border-gray-300 bg-[#F8FAFB] px-6 py-20 text-center">

                    <x-lucide-search-x class="mx-auto h-12 w-12 text-gray-300"/>

                    <h2 class="mt-5 text-xl font-semibold text-[#183B56]">
                        No products found
                    </h2>

                    <p class="mt-2 text-sm text-gray-500">
                        We couldn't find products matching your search.
                        Try another keyword or category.
                    </p>

                    <a href="{{ route('store.shop') }}"
                       class="mt-6 inline-flex items-center rounded-lg bg-[#168C91] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#117579]">
                        View All Products
                    </a>
                </div>
            @endif

        </div>
    </section>
</x-layouts.store>