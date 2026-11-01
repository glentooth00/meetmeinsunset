
<x-layouts.app>
    <x-ui.sonner />

    <x-slot:header>
        Homepage Hero
    </x-slot:header>

    <div class="mx-auto max-w-4xl space-y-6">

        {{-- Validation errors --}}
        @if($errors->any())
            <div class="rounded-lg border border-danger/30 bg-danger/10 px-4 py-3 text-sm text-danger">
                <p class="mb-2 font-semibold">Please check the following:</p>
                <ul class="list-inside list-disc">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            method="POST"
            action="{{ route('admin.hero.update') }}"
            enctype="multipart/form-data"
            class="space-y-6"
        >
            @csrf
            @method('PUT')

            {{-- Text content --}}
            <div class="rounded-xl border border-border bg-card p-6 space-y-5">
                <div>
                    <h3 class="text-base font-semibold">Hero Content</h3>
                    <p class="mt-1 text-sm text-muted-foreground">
                        Edit the text displayed on your storefront homepage.
                    </p>
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium">Small Heading</label>
                    <input
                        type="text"
                        name="eyebrow"
                        value="{{ old('eyebrow', $hero->eyebrow) }}"
                        required
                        class="w-full rounded-lg border border-border bg-background px-3 py-2 text-sm"
                    >
                </div>

                <div class="grid gap-4 sm:grid-cols-3">
                    @foreach([1, 2, 3] as $line)
                        <div>
                            <label class="mb-2 block text-sm font-medium">
                                Heading Line {{ $line }}
                            </label>
                            <input
                                type="text"
                                name="heading_line_{{ $line }}"
                                value="{{ old('heading_line_'.$line, $hero->{'heading_line_'.$line}) }}"
                                required
                                class="w-full rounded-lg border border-border bg-background px-3 py-2 text-sm"
                            >
                        </div>
                    @endforeach
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium">Description</label>
                    <textarea
                        name="description"
                        rows="4"
                        required
                        class="w-full rounded-lg border border-border bg-background px-3 py-2 text-sm"
                    >{{ old('description', $hero->description) }}</textarea>
                </div>
            </div>

            {{-- Button --}}
            <div class="rounded-xl border border-border bg-card p-6 space-y-5">
                <h3 class="text-base font-semibold">Call to Action</h3>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-medium">Button Text</label>
                        <input
                            type="text"
                            name="button_text"
                            value="{{ old('button_text', $hero->button_text) }}"
                            required
                            class="w-full rounded-lg border border-border bg-background px-3 py-2 text-sm"
                        >
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium">Button Link</label>
                        <input
                            type="text"
                            name="button_url"
                            value="{{ old('button_url', $hero->button_url) }}"
                            required
                            placeholder="/shop"
                            class="w-full rounded-lg border border-border bg-background px-3 py-2 text-sm"
                        >
                    </div>
                </div>
            </div>

            {{-- Features --}}
            <div class="rounded-xl border border-border bg-card p-6 space-y-5">
                <h3 class="text-base font-semibold">Hero Features</h3>

                <div class="grid gap-4 sm:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-medium">Feature One</label>
                        <input
                            type="text"
                            name="feature_one"
                            value="{{ old('feature_one', $hero->feature_one) }}"
                            required
                            class="w-full rounded-lg border border-border bg-background px-3 py-2 text-sm"
                        >
                    </div>

                    <div>
                        <label class="mb-2 block text-sm font-medium">Feature Two</label>
                        <input
                            type="text"
                            name="feature_two"
                            value="{{ old('feature_two', $hero->feature_two) }}"
                            required
                            class="w-full rounded-lg border border-border bg-background px-3 py-2 text-sm"
                        >
                    </div>
                </div>
            </div>

            {{-- Hero image --}}
            <div class="rounded-xl border border-border bg-card p-6 space-y-5">
                <div>
                    <h3 class="text-base font-semibold">Hero Image</h3>
                    <p class="mt-1 text-sm text-muted-foreground">
                        Upload a JPG, PNG, or WebP image. Maximum size: 5 MB.
                    </p>
                </div>

                @if($hero->image_path)
                    <div class="overflow-hidden rounded-xl border border-border">
                        <img
                            src="{{ asset('storage/'.$hero->image_path) }}"
                            alt="{{ $hero->image_alt }}"
                            class="h-64 w-full object-cover"
                        >
                    </div>
                @else
                    <div class="flex h-48 items-center justify-center rounded-xl border border-dashed border-border bg-muted/30">
                        <p class="text-sm text-muted-foreground">
                            No hero image uploaded yet.
                        </p>
                    </div>
                @endif

                <div>
                    <label class="mb-2 block text-sm font-medium">Upload / Replace Image</label>
                    <input
                        type="file"
                        name="image"
                        accept="image/jpeg,image/png,image/webp"
                        class="block w-full text-sm text-muted-foreground file:mr-4 file:rounded-lg file:border-0 file:bg-primary file:px-4 file:py-2 file:text-sm file:font-medium file:text-primary-foreground"
                    >
                </div>

                <div>
                    <label class="mb-2 block text-sm font-medium">Image Alt Text</label>
                    <input
                        type="text"
                        name="image_alt"
                        value="{{ old('image_alt', $hero->image_alt) }}"
                        placeholder="Healthcare professionals wearing medical scrubs"
                        class="w-full rounded-lg border border-border bg-background px-3 py-2 text-sm"
                    >
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex flex-wrap items-center justify-between gap-3">
                <a
                    href="{{ route('store.home') }}"
                    target="_blank"
                    class="text-sm font-medium text-muted-foreground hover:text-foreground"
                >
                    View Storefront
                </a>

                <x-ui.button
                    type="submit"
                    variant="solid"
                    color="#047857"
                    class="!bg-green-600 !text-white !shadow-md hover:!bg-green-700"
                >
                    <x-lucide-check class="mr-2 h-4 w-4" />
                    Save Hero Changes
                </x-ui.button>
            </div>

        </form>
    </div>

    @if(session('sonner'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                window.toast.success(
                    @json(session('sonner.message'))
                );
            });
        </script>
    @endif

</x-layouts.app>


