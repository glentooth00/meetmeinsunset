
<header class="sticky top-0 z-40 border-b border-slate-100 bg-white">
    <div class="mx-auto flex h-20 max-w-7xl items-center justify-between gap-5 px-4 sm:px-6 lg:px-8">

        {{-- Logo --}}
        <a href="{{ route('store.home') }}" class="flex shrink-0 items-center gap-2.5">
            <div class="flex h-10 w-10 items-center justify-center rounded-full border-2 border-[#168C91] text-[#168C91]">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="1.8" class="h-7 w-7">
                    <path d="M12 21s-8-4.5-8-11a4.5 4.5 0 0 1 8-2.8A4.5 4.5 0 0 1 20 10c0 6.5-8 11-8 11Z"/>
                    <path d="M5 12h4l2-3 2 6 2-3h4"/>
                </svg>
            </div>

            <div>
                <span class="block text-lg font-bold tracking-tight text-[#183B56]">
                    MeetMeinSunset
                </span>
                <span class="block text-[9px] font-semibold uppercase tracking-[0.25em] text-slate-500">
                    Medical Apparel
                </span>
            </div>
        </a>

        {{-- Desktop Navigation --}}
        <nav class="hidden items-center gap-7 lg:flex">
            <a href="{{ route('store.home') }}"
               class="text-sm font-semibold text-[#168C91]">Home</a>

            <a href="{{ url('/shop') }}"
               class="text-sm font-medium text-slate-600 hover:text-[#168C91]">Shop All</a>

            <a href="{{ url('/categories') }}"
               class="text-sm font-medium text-slate-600 hover:text-[#168C91]">Categories</a>

            <a href="{{ url('/about') }}"
               class="text-sm font-medium text-slate-600 hover:text-[#168C91]">About Us</a>

            <a href="{{ url('/contact') }}"
               class="text-sm font-medium text-slate-600 hover:text-[#168C91]">Contact</a>
        </nav>

        {{-- Actions --}}
        <div class="flex items-center gap-3">

            {{-- Search --}}
            <a href="{{ url('/shop') }}"
               class="hidden rounded-full bg-slate-50 p-2.5 text-[#183B56] hover:bg-slate-100 sm:block"
               aria-label="Search">
                <x-lucide-search class="h-5 w-5"/>
            </a>

            {{-- Account --}}
            <a href="{{ url('/account') }}"
               class="hidden rounded-full bg-slate-50 p-2.5 text-[#183B56] hover:bg-slate-100 sm:block"
               aria-label="My account">
                <x-lucide-user-round class="h-5 w-5"/>
            </a>

            {{-- Cart --}}
            <a href="{{ url('/cart') }}"
               class="relative rounded-full bg-slate-50 p-2.5 text-[#183B56] hover:bg-slate-100"
               aria-label="Shopping cart">
                <x-lucide-shopping-bag class="h-5 w-5"/>

                <span class="absolute -right-1 -top-1 flex h-4 w-4 items-center justify-center rounded-full bg-[#168C91] text-[10px] font-bold text-white">
                    0
                </span>
            </a>

            {{-- Mobile menu --}}
            <details class="relative lg:hidden">
                <summary class="flex h-10 w-10 cursor-pointer list-none items-center justify-center rounded-lg hover:bg-slate-100">
                    <x-lucide-menu class="h-6 w-6 text-[#183B56]"/>
                </summary>

                <nav class="absolute right-0 top-12 z-50 w-56 rounded-xl border border-slate-100 bg-white p-3 shadow-xl">
                    <div class="flex flex-col">
                        <a href="{{ route('store.home') }}" class="rounded-lg px-4 py-3 text-sm hover:bg-slate-50">Home</a>
                        <a href="{{ url('/shop') }}" class="rounded-lg px-4 py-3 text-sm hover:bg-slate-50">Shop All</a>
                        <a href="{{ url('/categories') }}" class="rounded-lg px-4 py-3 text-sm hover:bg-slate-50">Categories</a>
                        <a href="{{ url('/about') }}" class="rounded-lg px-4 py-3 text-sm hover:bg-slate-50">About Us</a>
                        <a href="{{ url('/contact') }}" class="rounded-lg px-4 py-3 text-sm hover:bg-slate-50">Contact</a>
                        <a href="{{ url('/account') }}" class="rounded-lg px-4 py-3 text-sm hover:bg-slate-50">My Account</a>
                    </div>
                </nav>
            </details>
        </div>
    </div>
</header>
