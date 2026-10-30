
<footer class="bg-[#183B56] text-white">

    <div class="mx-auto grid max-w-7xl gap-10 px-4 py-14 sm:px-6 md:grid-cols-2 lg:grid-cols-4 lg:px-8">

        <div class="lg:col-span-2">
            <h2 class="text-xl font-bold">MeetMeinSunset</h2>

            <p class="mt-2 text-xs font-semibold uppercase tracking-[0.2em] text-teal-300">
                Medical Apparel
            </p>

            <p class="mt-5 max-w-sm text-sm leading-7 text-slate-300">
                Comfortable, stylish, and dependable medical apparel
                for the people who care for others.
            </p>
        </div>

        <div>
            <h3 class="text-sm font-semibold">Explore</h3>
            <ul class="mt-5 space-y-3 text-sm text-slate-300">
                <li><a href="{{ url('/shop') }}" class="hover:text-white">Shop All</a></li>
                <li><a href="{{ url('/categories') }}" class="hover:text-white">Categories</a></li>
                <li><a href="{{ url('/about') }}" class="hover:text-white">About Us</a></li>
                <li><a href="{{ url('/contact') }}" class="hover:text-white">Contact</a></li>
            </ul>
        </div>

        <div>
            <h3 class="text-sm font-semibold">Customer Care</h3>
            <ul class="mt-5 space-y-3 text-sm text-slate-300">
                <li><a href="{{ url('/shipping') }}" class="hover:text-white">Shipping Information</a></li>
                <li><a href="{{ url('/returns') }}" class="hover:text-white">Returns & Exchanges</a></li>
                <li><a href="{{ url('/privacy') }}" class="hover:text-white">Privacy Policy</a></li>
                <li><a href="{{ url('/terms') }}" class="hover:text-white">Terms & Conditions</a></li>
            </ul>
        </div>

    </div>

    <div class="border-t border-white/10">
        <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-3 px-4 py-6 text-xs text-slate-400 sm:px-6 md:flex-row lg:px-8">
            <p>&copy; {{ date('Y') }} MeetMeinSunset. All rights reserved.</p>
            <p>Made for those who care.</p>
        </div>
    </div>

</footer>
