
<x-layouts.admin-guest>
    <div class="min-h-screen flex items-center justify-center bg-[#F4F8FA] px-4 py-12">

        <div class="w-full max-w-md">

            {{-- Brand --}}
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-bold tracking-tight text-[#183B56]">
                    MeetMeinSunset
                </h1>
                <p class="mt-2 text-sm text-gray-500">
                    Administration Portal
                </p>
            </div>

            {{-- Login Card --}}
            <div class="rounded-2xl border border-gray-100 bg-white p-8 shadow-sm">

                <div class="mb-7">
                    <h2 class="text-xl font-semibold text-[#183B56]">
                        Admin Sign In
                    </h2>
                    <p class="mt-1 text-sm text-gray-500">
                        Enter your administrator credentials to continue.
                    </p>
                </div>

                @if ($errors->any())
                    <div class="mb-5 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-600">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.store') }}" class="space-y-5">
                    @csrf

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
                            autofocus
                            autocomplete="username"
                            placeholder="admin@example.com"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-[#168C91] focus:ring-2 focus:ring-[#168C91]/10"
                        >
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
                            autocomplete="current-password"
                            placeholder="Enter your password"
                            class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-[#168C91] focus:ring-2 focus:ring-[#168C91]/10"
                        >
                    </div>

                    {{-- Remember Me --}}
                    <div class="flex items-center">
                        <input
                            id="remember"
                            name="remember"
                            type="checkbox"
                            value="1"
                            class="h-4 w-4 rounded border-gray-300 text-[#168C91] focus:ring-[#168C91]"
                        >

                        <label for="remember" class="ml-2 text-sm text-gray-600">
                            Remember me
                        </label>
                    </div>

                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="w-full rounded-lg bg-[#183B56] px-4 py-3 text-sm font-semibold text-white transition hover:bg-[#122F45]"
                    >
                        Sign In to Admin
                    </button>
                </form>
            </div>

            <p class="mt-6 text-center text-xs text-gray-400">
                &copy; {{ date('Y') }} MeetMeinSunset. All rights reserved.
            </p>

        </div>
    </div>
</x-layouts.admin-guest>
