
@props([
    'name',
    'price',
    'image' => null,
    'badge' => null,
    'category' => 'Medical Apparel',
])

<div class="group">
    <a href="{{ url('/shop') }}" class="block">

        {{-- Product Image --}}
        <div class="relative aspect-[4/5] overflow-hidden rounded-2xl bg-[#F1F5F7]">

            @if($image)
                <img src="{{ $image }}"
                     alt="{{ $name }}"
                     class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
            @else
                <div class="flex h-full items-center justify-center">
                    <div class="text-center">
                        <x-lucide-shirt class="mx-auto h-16 w-16 text-slate-300"/>
                        <p class="mt-3 text-xs font-medium text-slate-400">
                            Product image coming soon
                        </p>
                    </div>
                </div>
            @endif

            @if($badge)
                <span class="absolute left-3 top-3 rounded-full bg-[#168C91] px-3 py-1 text-[10px] font-bold uppercase tracking-wide text-white">
                    {{ $badge }}
                </span>
            @endif

            {{-- Wishlist --}}
            <button type="button"
                    aria-label="Add to wishlist"
                    class="absolute right-3 top-3 flex h-9 w-9 items-center justify-center rounded-full bg-white text-slate-600 shadow-sm transition hover:text-rose-500">
                <x-lucide-heart class="h-4 w-4"/>
            </button>
        </div>

        {{-- Product Details --}}
        <div class="pt-4">
            <p class="text-xs font-medium uppercase tracking-wider text-slate-400">
                {{ $category }}
            </p>

            <h3 class="mt-1 text-sm font-semibold text-[#183B56] transition group-hover:text-[#168C91]">
                {{ $name }}
            </h3>

            <p class="mt-2 text-sm font-bold text-[#183B56]">
                ₱{{ number_format((float) $price, 2) }}
            </p>
        </div>
    </a>
</div>
