
<x-layouts.store>

    <x-slot:title>
        Sign In | MeetMeinSunset
    </x-slot:title>

    <section class="bg-[#F8FAFB] px-4 py-12 sm:px-6 lg:py-20">

        <div class="mx-auto grid max-w-6xl overflow-hidden rounded-3xl bg-white shadow-sm lg:grid-cols-2">

            {{-- Left Side: Branding --}}
            <div class="relative hidden min-h-[620px] flex-col justify-between overflow-hidden bg-[#183B56] p-12 text-white lg:flex">

                <div class="relative z-10">
                    <p class="text-sm font-bold uppercase tracking-[0.2em] text-teal-300">
                        MeetMeinSunset
                    </p>

                    <h1 class="mt-16 max-w-md text-5xl font-bold leading-tight tracking-tight">
                        Made for those who care.
                    </h1>

                    <p class="mt-6 max-w-sm text-base leading-8 text-slate-300">
                        Discover comfortable, stylish, and dependable
                        medical apparel designed for your everyday shift.
                    </p>
                </div>

                <div class="relative z-10">
                    <div class="h-px w-16 bg-teal-400"></div>

                    <p class="mt-5 text-sm text-slate-300">
                        Comfort. Style. Professionalism.
                    </p>
                </div>

                {{-- Decorative circles --}}
                <div class="absolute -bottom-32 -right-24 h-96 w-96 rounded-full border border-white/10"></div>
                <div class="absolute -bottom-20 -right-12 h-72 w-72 rounded-full border border-white/10"></div>
                <div class="absolute -bottom-8 -right-0 h-48 w-48 rounded-full bg-[#168C91]/20"></div>

            </div>


            {{-- Right Side: Login Form --}}
            <div class="flex items-center justify-center px-6 py-12 sm:px-12 lg:px-16">

                <div class="w-full max-w-md">

                    <div class="mb-10 text-center lg:text-left">

                        <p class="text-xs font-bold uppercase tracking-[0.2em] text-[#168C91]">
                            Welcome Back
                        </p>

                        <h2 class="mt-3 text-3xl font-bold tracking-tight text-[#183B56]">
                            Sign in to your account
                        </h2>

                        <p class="mt-3 text-sm leading-6 text-slate-500">
                            Enter your details below to access your account.
                        </p>

                    </div>


                    {{-- Login Form --}}
                    <form method="POST" action="{{ route('login.store') }}" class="space-y-6">

                        @csrf

                        {{-- Email --}}
                        <div>
                            <label for="email" class="mb-2 block text-sm font-semibold text-slate-700">
                                Email Address
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="you@example.com"
                                autocomplete="email"
                                required
                                autofocus
                                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-[#168C91] focus:ring-2 focus:ring-[#168C91]/10 @error('email') border-red-400 @enderror"
                            >

                            @error('email')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- Password --}}
                        <div>
                            <div class="mb-2 flex items-center justify-between">
                                <label for="password" class="block text-sm font-semibold text-slate-700">
                                    Password
                                </label>

                                <a href="#"
                                   class="text-xs font-semibold text-[#168C91] hover:text-[#183B56]">
                                    Forgot password?
                                </a>
                            </div>

                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="Enter your password"
                                autocomplete="current-password"
                                required
                                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3.5 text-sm text-slate-800 outline-none transition placeholder:text-slate-400 focus:border-[#168C91] focus:ring-2 focus:ring-[#168C91]/10"
                            >

                            @error('password')
                                <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        {{-- Remember Me --}}
                        <div class="flex items-center gap-2">
                            <input
                                type="checkbox"
                                id="remember"
                                name="remember"
                                value="1"
                                class="h-4 w-4 rounded border-slate-300 text-[#168C91] focus:ring-[#168C91]"
                            >

                            <label for="remember" class="text-sm text-slate-600">
                                Remember me
                            </label>
                        </div>


                        {{-- Submit --}}
                        <button
                            type="submit"
                            class="flex w-full items-center justify-center rounded-full bg-[#183B56] px-6 py-4 text-sm font-semibold text-white transition hover:bg-[#168C91] focus:outline-none focus:ring-4 focus:ring-[#168C91]/20"
                        >
                            Sign In
                        </button>

                    </form>


                    {{-- Registration Link --}}
                    <div class="mt-8 text-center">
                        <p class="text-sm text-slate-500">
                            Don't have an account?

                            <a href="{{ url('/register') }}"
                               class="font-semibold text-[#168C91] hover:text-[#183B56]">
                                Create an account
                            </a>
                        </p>
                    </div>


                    <div class="mt-10 border-t border-slate-100 pt-6 text-center">
                        <a href="{{ route('store.home') }}"
                           class="text-xs font-medium text-slate-400 transition hover:text-[#168C91]">
                            ← Back to MeetMeinSunset
                        </a>
                    </div>

                </div>
            </div>

        </div>

    </section>

</x-layouts.store>
