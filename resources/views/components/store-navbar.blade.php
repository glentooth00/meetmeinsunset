<nav class="sticky top-0 z-50 bg-white border-b shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between relative">

        {{-- LEFT: LOGO --}}
        <div class="flex items-center">
            <a href="/" class="flex items-center gap-2">

                <img 
                    src="{{ asset('images/meetmeinsun.png') }}" 
                    alt="Logo"
                    class="h-10 w-auto object-contain"
                >

                <span class="hidden sm:block text-lg font-semibold tracking-wide">
                    MyStore
                </span>

            </a>
        </div>

        {{-- CENTER: TAGLINE --}}
        <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
            <p class="text-xs tracking-widest text-gray-700 font-medium uppercase whitespace-nowrap bg-white px-3 py-1">
                made for the moments that mattered most
            </p>
        </div>

        {{-- RIGHT: SEARCH + ICONS --}}
        <div class="flex items-center gap-10">

            {{-- SEARCH --}}
            <div class="hidden md:flex items-center border rounded-lg px-3 py-1">
                <input 
                    type="text" 
                    placeholder="Search"
                    class="outline-none text-sm w-40"
                >
            </div>

            {{-- ICONS --}}
                <div class="flex items-center gap-12 text-sm">

                    {{-- CART --}}
                    <a href="/cart" class="relative flex items-center justify-center hover:opacity-70 transition px-1">

                        {{-- CART ICON (bigger) --}}
                        <span class="text-2xl leading-none">
                            🛒
                        </span>

                        {{-- BADGE --}}
                        <span class="absolute -top-1 -right-1 bg-black text-white text-[10px] w-5 h-5 flex items-center justify-center rounded-full">
                            2
                        </span>

                    </a>

                    {{-- LOGIN --}}
                    <a href="/login" class="flex items-center text-gray-700 hover:text-black transition font-medium px-3">
                        Login
                    </a>

                    {{-- SIGN UP --}}
                    <a href="/register" class="flex items-center bg-black text-white px-3 py-1 rounded-md hover:opacity-80 transition">
                        Sign Up
                    </a>

                </div>
        </div>
    </div>
</nav>