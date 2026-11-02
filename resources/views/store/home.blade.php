
<x-layouts.store>

    <x-slot:title>
        MeetMeinSunset | Premium Medical Apparel
    </x-slot:title>


    {{-- Hero Section --}}
    <section class="mx-auto max-w-[1600px] px-4 pt-5 sm:px-6 lg:px-8">
        <div class="relative grid min-h-[480px] overflow-hidden rounded-3xl bg-[#EDF4F5] lg:grid-cols-2">

            <div class="relative z-10 flex flex-col justify-center px-8 py-16 md:px-14 lg:px-16">
                <span class="text-xs font-bold uppercase tracking-[0.2em] text-[#168C91]">
                    {{ $hero?->eyebrow ?? 'Premium Medical Apparel' }}
                </span>

                <h1 class="mt-6 max-w-xl text-4xl font-bold leading-tight tracking-tight text-[#183B56] sm:text-5xl lg:text-6xl">
                    {{ $hero?->heading_line_1 ?? 'Comfort.' }}
                    <br>
                    {{ $hero?->heading_line_2 ?? 'Style.' }}
                    <br>
                    {{ $hero?->heading_line_3 ?? 'Professionalism.' }}
                </h1>

                <p class="mt-6 max-w-md text-base leading-7 text-slate-600">
                    {{ $hero?->description ?? 'Discover quality scrubs, uniforms, and medical apparel designed for the people who care.' }}
                </p>

                <div class="mt-8">
                    <a href="{{ $hero?->button_url ?: url('/shop') }}"
                    class="inline-flex items-center gap-3 rounded-full bg-[#183B56] px-8 py-4 text-sm font-semibold text-white transition hover:bg-[#168C91]">
                        {{ $hero?->button_text ?? 'Shop Now' }}
                        <x-lucide-arrow-right class="h-4 w-4"/>
                    </a>
                </div>

                <div class="mt-10 flex flex-wrap gap-6 text-xs font-medium text-slate-600">
                    <span class="flex items-center gap-2">
                        <x-lucide-truck class="h-5 w-5 text-[#168C91]"/>
                        {{ $hero?->feature_one ?? 'Convenient Delivery' }}
                    </span>

                    <span class="flex items-center gap-2">
                        <x-lucide-shield-check class="h-5 w-5 text-[#168C91]"/>
                        {{ $hero?->feature_two ?? 'Secure Shopping' }}
                    </span>
                </div>
            </div>

            {{-- Hero Image --}}
            <div class="relative min-h-[300px] overflow-hidden bg-gradient-to-br from-[#D8E9EC] via-[#C8DDE0] to-[#EDF4F5]">

                @if($hero?->image_path)
                    <img
                        src="{{ asset('storage/'.$hero->image_path) }}"
                        alt="{{ $hero->image_alt ?: 'Healthcare professionals wearing medical scrubs' }}"
                        class="absolute inset-0 h-full w-full object-cover"
                    >
                @else
                    <div class="absolute inset-0 flex flex-col items-center justify-center p-8 text-center">
                        <div class="rounded-full bg-white/70 p-7">
                            <x-lucide-stethoscope class="h-20 w-20 text-[#168C91]"/>
                        </div>

                        <p class="mt-5 text-sm font-semibold text-[#183B56]">
                            Your lifestyle hero photography goes here
                        </p>

                        <p class="mt-2 text-xs text-slate-600">
                            Upload your hero image from the admin panel.
                        </p>
                    </div>
                @endif

            </div>
        </div>
    </section>

    {{-- Shop by Category --}}
    <section class="mx-auto max-w-[1600px] px-4 py-20 sm:px-6 lg:px-8">

        {{-- Section Heading --}}
        <div class="mb-10 flex flex-col items-center text-center">
            <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#168C91]">
                Explore Our Collection
            </p>

            <h2 class="mt-3 text-3xl font-bold tracking-tight text-[#183B56] md:text-4xl">
                Shop by Category
            </h2>

            <p class="mt-3 max-w-lg text-sm leading-6 text-slate-500">
                Find everything you need to look and feel your best throughout every shift.
            </p>
        </div>

        @if($categories->isNotEmpty())

            <x-ui.carousel class="w-full">

                <x-ui.carousel-content>

                    @foreach($categories as $category)
                        <x-ui.carousel-item class="basis-1/2 sm:basis-1/3 lg:basis-1/6">

                            <div class="p-2">
                                <a href="{{ url('/categories/' . $category->slug) }}"
                                class="group block min-w-0">

                                    {{-- Category Image --}}
                                    <div class="relative aspect-[4/5] overflow-hidden rounded-xl bg-[#EDF4F5]">

                                        @if($category->image_path)
                                            <img
                                                src="{{ asset('storage/' . $category->image_path) }}"
                                                alt="{{ $category->name }}"
                                                class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                                            >
                                        @else
                                            <div class="flex h-full w-full flex-col items-center justify-center gap-4 text-[#168C91]">
                                                <x-lucide-image class="h-10 w-10 opacity-50"/>

                                                <span class="text-xs font-medium text-slate-400">
                                                    Category Image
                                                </span>
                                            </div>
                                        @endif

                                        <div class="absolute inset-0 bg-gradient-to-t from-[#183B56]/30 to-transparent opacity-0 transition group-hover:opacity-100"></div>
                                    </div>

                                    {{-- Category Details --}}
                                    <div class="flex items-start justify-between gap-2 pt-4">

                                        <div class="min-w-0">
                                            <h3 class="text-sm font-bold text-[#183B56] transition group-hover:text-[#168C91]">
                                                {{ $category->name }}
                                            </h3>

                                            <p class="mt-1 text-xs leading-5 text-slate-500 line-clamp-2">
                                                {{ $category->description }}
                                            </p>
                                        </div>

                                        <x-lucide-arrow-up-right
                                            class="mt-1 h-4 w-4 shrink-0 text-[#168C91] transition group-hover:translate-x-1 group-hover:-translate-y-1"
                                        />

                                    </div>

                                </a>
                            </div>

                        </x-ui.carousel-item>
                    @endforeach

                </x-ui.carousel-content>

                {{-- Navigation --}}
                <div class="mt-8 flex justify-center gap-3">
                    <x-ui.carousel-previous />
                    <x-ui.carousel-next />
                </div>

            </x-ui.carousel>

        @else

            <div class="py-12 text-center">
                <p class="text-sm text-slate-400">
                    Categories will appear here soon.
                </p>
            </div>

        @endif

    </section>

    {{-- Best Sellers --}}
    <section class="bg-[#F8FAFB] py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="mb-8 flex items-end justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#168C91]">
                        Customer Favorites
                    </p>

                    <h2 class="mt-2 text-2xl font-bold tracking-tight text-[#183B56] md:text-3xl">
                        Best Sellers
                    </h2>
                </div>

                <a href="{{ url('/shop') }}"
                   class="flex items-center gap-2 text-sm font-semibold text-[#183B56] transition hover:text-[#168C91]">
                    View All
                    <x-lucide-arrow-right class="h-4 w-4"/>
                </a>
            </div>

            <div class="grid grid-cols-2 gap-5 md:grid-cols-3 lg:grid-cols-4">

                <x-store.product-card
                    name="Classic Navy Scrub Set"
                    category="Women's Collection"
                    price="1299"
                    badge="Best Seller"
                />

                <x-store.product-card
                    name="Essential Men's Scrubs"
                    category="Men's Collection"
                    price="1399"
                    badge="New"
                />

                <x-store.product-card
                    name="Everyday Comfort Scrubs"
                    category="Women's Collection"
                    price="1199"
                />

                <x-store.product-card
                    name="Premium Teal Scrub Set"
                    category="Men's Collection"
                    price="1499"
                    badge="Popular"
                />

            </div>
        </div>
    </section>


    {{-- Promotional Banner --}}
    <section class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="flex flex-col items-center justify-between gap-8 rounded-3xl bg-[#183B56] px-8 py-12 text-center md:flex-row md:px-16 md:text-left">

            <div>
                <p class="text-xs font-bold uppercase tracking-[0.2em] text-teal-300">
                    Made for Every Shift
                </p>

                <h2 class="mt-4 text-3xl font-bold text-white md:text-4xl">
                    Feel good.
                    <br class="hidden md:block">
                    Look professional.
                </h2>

                <p class="mt-4 max-w-lg text-sm leading-7 text-slate-300">
                    Find your perfect fit with medical apparel made
                    for comfort, confidence, and everyday performance.
                </p>
            </div>

            <a href="{{ url('/shop') }}"
               class="inline-flex shrink-0 items-center gap-3 rounded-full bg-white px-8 py-4 text-sm font-semibold text-[#183B56] transition hover:bg-teal-100">
                Explore Collection
                <x-lucide-arrow-right class="h-4 w-4"/>
            </a>

        </div>
    </section>

</x-layouts.store>
