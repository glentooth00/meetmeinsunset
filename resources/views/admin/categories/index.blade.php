<x-layouts.app>
    <x-slot:header>
        Categories
    </x-slot:header>

    <div class="mx-auto max-w-7xl space-y-6">

        {{-- Header --}}
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
            <div>
                <h2 class="text-xl font-bold text-zinc-900">Category Management</h2>
                <p class="mt-1 text-sm text-zinc-500">
                    Manage the categories displayed on your storefront.
                </p>
            </div>

           <x-ui.dialog>
            <x-ui.dialog-trigger>
                <x-ui.button
                    color="#168C91"
                    class="!bg-[#168C91] !text-white"
                >
                    <x-lucide-plus class="mr-2 h-4 w-4" />
                    Add Category
                </x-ui.button>
            </x-ui.dialog-trigger>

            <x-ui.dialog-content :close-on-overlay="false">

                <x-ui.dialog-header>
                    <x-ui.dialog-title>Add Category</x-ui.dialog-title>
                    <x-ui.dialog-description>
                        Create a new category for your storefront.
                    </x-ui.dialog-description>
                </x-ui.dialog-header>

                <form
                    action="{{ route('admin.categories.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="space-y-5"
                >
                    @csrf

                    {{-- Category Name --}}
                    <div class="grid gap-2">
                        <label for="category-name" class="text-sm font-medium text-zinc-700">
                            Category Name <span class="text-red-500">*</span>
                        </label>

                        <x-ui.input
                            id="category-name"
                            name="name"
                            placeholder="e.g. Scrubs"
                            value="{{ old('name') }}"
                            required
                        />

                        @error('name')
                            <p class="text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="grid gap-2">
                        <label for="category-description" class="text-sm font-medium text-zinc-700">
                            Description
                        </label>

                        <x-ui.textarea
                            id="category-description"
                            name="description"
                            rows="3"
                            placeholder="Write a short description..."
                        >{{ old('description') }}</x-ui.textarea>

                        @error('description')
                            <p class="text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Category Image --}}
                    <div class="grid gap-2">
                        <label for="category-image" class="text-sm font-medium text-zinc-700">
                            Category Image
                        </label>

                        <input
                            id="category-image"
                            type="file"
                            name="image"
                            accept=".jpg,.jpeg,.png,.webp"
                            class="block w-full rounded-lg border border-zinc-200 bg-white text-sm text-zinc-600 file:mr-4 file:border-0 file:bg-zinc-100 file:px-4 file:py-2.5 file:text-sm file:font-medium file:text-zinc-700 hover:file:bg-zinc-200"
                        >

                        <p class="text-xs text-zinc-400">
                            JPG, PNG or WEBP. Maximum size: 5MB.
                        </p>

                        @error('image')
                            <p class="text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Display Order --}}
                    <div class="grid gap-2">
                        <label for="category-order" class="text-sm font-medium text-zinc-700">
                            Display Order
                        </label>

                        <x-ui.input
                            id="category-order"
                            type="number"
                            name="sort_order"
                            min="0"
                            value="{{ old('sort_order', 0) }}"
                        />

                        <p class="text-xs text-zinc-400">
                            Lower numbers appear first on the homepage.
                        </p>

                        @error('sort_order')
                            <p class="text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Active Status --}}
                    <div class="flex items-center gap-3 rounded-lg border border-zinc-200 p-3">
                        <input type="hidden" name="is_active" value="0">

                        <input
                            id="category-active"
                            type="checkbox"
                            name="is_active"
                            value="1"
                            checked
                            class="h-4 w-4 rounded border-zinc-300 text-[#168C91] focus:ring-[#168C91]"
                        >

                        <label for="category-active" class="cursor-pointer">
                            <span class="block text-sm font-medium text-zinc-800">
                                Active Category
                            </span>
                            <span class="block text-xs text-zinc-500">
                                Display this category on the storefront.
                            </span>
                        </label>
                    </div>

                    {{-- Dialog Actions --}}
                    <x-ui.dialog-footer>
                        <x-ui.button
                            type="button"
                            variant="outline"
                            @click="open = false"
                        >
                            Cancel
                        </x-ui.button>

                        <x-ui.button
                            type="submit"
                            color="#168C91"
                            class="!bg-[#168C91] !text-white"
                        >
                            <x-lucide-check class="mr-2 h-4 w-4" />
                            Save Category
                        </x-ui.button>
                    </x-ui.dialog-footer>

                </form>

            </x-ui.dialog-content>
        </x-ui.dialog>
        </div>

        {{-- Notifications --}}
        <x-ui.sonner />

        {{-- Categories Table --}}
        <div class="overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm">

            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">

                    <thead class="border-b border-zinc-200 bg-zinc-50 text-xs uppercase tracking-wider text-zinc-500">
                        <tr>
                            <th class="px-6 py-4">Category</th>
                            <th class="px-6 py-4">Description</th>
                            <th class="px-6 py-4 text-center">Order</th>
                            <th class="px-6 py-4 text-center">Status</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-zinc-100">

                        @forelse($categories as $category)
                            <tr class="transition hover:bg-zinc-50">

                                {{-- Category --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">

                                        <div class="h-14 w-12 shrink-0 overflow-hidden rounded-lg bg-[#EDF4F5]">
                                            @if($category->image_path)
                                                <img
                                                    src="{{ asset('storage/' . $category->image_path) }}"
                                                    alt="{{ $category->name }}"
                                                    class="h-full w-full object-cover"
                                                >
                                            @else
                                                <div class="flex h-full items-center justify-center text-[#168C91]">
                                                    <x-lucide-image class="h-5 w-5"/>
                                                </div>
                                            @endif
                                        </div>

                                        <div>
                                            <p class="font-semibold text-zinc-800">
                                                {{ $category->name }}
                                            </p>
                                            <p class="mt-1 text-xs text-zinc-400">
                                                {{ $category->slug }}
                                            </p>
                                        </div>

                                    </div>
                                </td>

                                {{-- Description --}}
                                <td class="max-w-xs px-6 py-4 text-zinc-500">
                                    {{ $category->description ?: 'No description' }}
                                </td>

                                {{-- Order --}}
                                <td class="px-6 py-4 text-center text-zinc-600">
                                    {{ $category->sort_order }}
                                </td>

                                {{-- Status --}}
                                <td class="px-6 py-4 text-center">
                                    @if($category->is_active)
                                        <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700">
                                            Active
                                        </span>
                                    @else
                                        <span class="rounded-full bg-zinc-100 px-3 py-1 text-xs font-semibold text-zinc-500">
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-end gap-2">

                                        <a
                                            href="{{ route('admin.categories.edit', $category) }}"
                                            class="rounded-lg border border-zinc-200 p-2 text-zinc-500 transition hover:border-[#168C91] hover:text-[#168C91]"
                                            title="Edit category"
                                        >
                                            <x-lucide-pencil class="h-4 w-4"/>
                                        </a>

                                        <form
                                            action="{{ route('admin.categories.destroy', $category) }}"
                                            method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this category?')"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="rounded-lg border border-zinc-200 p-2 text-zinc-500 transition hover:border-red-300 hover:text-red-600"
                                                title="Delete category"
                                            >
                                                <x-lucide-trash-2 class="h-4 w-4"/>
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-16 text-center">
                                    <x-lucide-tags class="mx-auto h-10 w-10 text-zinc-300"/>

                                    <p class="mt-3 font-semibold text-zinc-700">
                                        No categories yet
                                    </p>

                                    <p class="mt-1 text-sm text-zinc-400">
                                        Start by creating your first product category.
                                    </p>

                                    <a
                                        href="{{ route('admin.categories.create') }}"
                                        class="mt-4 inline-flex items-center gap-2 text-sm font-semibold text-[#168C91] hover:underline"
                                    >
                                        <x-lucide-plus class="h-4 w-4"/>
                                        Add your first category
                                    </a>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if($categories->hasPages())
                <div class="border-t border-zinc-200 px-6 py-4">
                    {{ $categories->links() }}
                </div>
            @endif

        </div>

        <p class="text-xs text-zinc-400">
            Showing {{ $categories->count() }} of {{ $categories->total() }} categories.
        </p>

    </div>
</x-layouts.app>