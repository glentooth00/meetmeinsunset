
<x-layouts.store>
    <section class="min-h-[75vh] bg-[#F4F8FA] px-4 py-16">
        <div class="mx-auto max-w-md rounded-2xl border border-gray-100 bg-white p-8 shadow-sm">

            <div class="mb-8 text-center">
                <h1 class="text-2xl font-semibold tracking-tight text-[#183B56]">
                    Create your account
                </h1>

                <p class="mt-2 text-sm text-gray-500">
                    Join MeetMeinSunset and start shopping.
                </p>
            </div>

            <form method="POST" action="{{ route('customer.register.store') }}" class="space-y-5">
                @csrf

                {{-- Full Name --}}
                <div>
                    <label for="name" class="mb-2 block text-sm font-medium text-gray-700">
                        Full Name
                    </label>

                    <input
                        id="name"
                        name="name"
                        type="text"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="Enter your full name"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-[#168C91] focus:ring-2 focus:ring-[#168C91]/10"
                    >

                    @error('name')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-gray-700">
                        Email Address
                    </label>

                    <input
                        id="email"
                        name="email"
                        type="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        placeholder="you@example.com"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-[#168C91] focus:ring-2 focus:ring-[#168C91]/10"
                    >

                    @error('email')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Phone --}}
                <div>
                    <label for="phone" class="mb-2 block text-sm font-medium text-gray-700">
                        Phone Number <span class="font-normal text-gray-400">(Optional)</span>
                    </label>

                    <input
                        id="phone"
                        name="phone"
                        type="tel"
                        value="{{ old('phone') }}"
                        autocomplete="tel"
                        placeholder="09XX XXX XXXX"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-[#168C91] focus:ring-2 focus:ring-[#168C91]/10"
                    >

                    @error('phone')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="mb-2 block text-sm font-medium text-gray-700">
                        Password
                    </label>

                    <input
                        id="password"
                        name="password"
                        type="password"
                        required
                        autocomplete="new-password"
                        placeholder="At least 8 characters"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-[#168C91] focus:ring-2 focus:ring-[#168C91]/10"
                    >

                    @error('password')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div>
                    <label for="password_confirmation" class="mb-2 block text-sm font-medium text-gray-700">
                        Confirm Password
                    </label>

                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        required
                        autocomplete="new-password"
                        placeholder="Confirm your password"
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-[#168C91] focus:ring-2 focus:ring-[#168C91]/10"
                    >
                </div>

                {{-- Submit --}}
                <button
                    type="submit"
                    class="w-full rounded-lg bg-[#168C91] px-4 py-3 text-sm font-semibold text-white transition hover:bg-[#11777B]"
                >
                    Create Account
                </button>
            </form>

            <div class="mt-6 text-center text-sm text-gray-500">
                Already have an account?

                <a href="{{ route('customer.login') }}"
                   class="font-semibold text-[#168C91] hover:underline">
                    Sign in
                </a>
            </div>

        </div>
    </section>
</x-layouts.store>
