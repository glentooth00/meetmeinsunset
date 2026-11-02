
<x-layouts.consumer>
    <x-slot:title>My Account</x-slot:title>
    <x-slot:heading>My Account</x-slot:heading>

    <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
        <h2 class="text-lg font-bold text-[#183B56]">
            Personal Information
        </h2>

        <div class="mt-6 grid gap-5 sm:grid-cols-2">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                    Full Name
                </p>
                <p class="mt-2 font-medium text-[#183B56]">
                    {{ auth('consumer')->user()->name }}
                </p>
            </div>

            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                    Email Address
                </p>
                <p class="mt-2 font-medium text-[#183B56]">
                    {{ auth('consumer')->user()->email }}
                </p>
            </div>

            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">
                    Phone Number
                </p>
                <p class="mt-2 font-medium text-[#183B56]">
                    {{ auth('consumer')->user()->phone ?? 'Not provided' }}
                </p>
            </div>
        </div>
    </div>
</x-layouts.consumer>
