<x-layouts.app>
    <x-ui.sonner />

    <x-slot:header>
        Products
    </x-slot:header>

    <div class="mx-auto max-w-7xl space-y-6">

        {{-- Page heading --}}
        <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-semibold text-gray-900">Products</h1>
                <p class="mt-1 text-sm text-gray-500">
                    Manage your store products, prices, and inventory.
                </p>
            </div>

            {{-- Add Product Dialog --}}
            <x-ui.dialog>
                <x-ui.dialog-trigger>
                    <x-ui.button color="#168C91" class="!bg-[#168C91] !text-white">
                        <x-lucide-plus class="mr-2 h-4 w-4" />
                        Add Product
                    </x-ui.button>
                </x-ui.dialog-trigger>

                <x-ui.dialog-content class="!max-w-2xl">
                    <x-ui.dialog-header>
                        <x-ui.dialog-title>Add New Product</x-ui.dialog-title>
                        <x-ui.dialog-description>
                            Enter the product details below.
                        </x-ui.dialog-description>
                    </x-ui.dialog-header>

                    <form action="{{ route('admin.products.store') }}"
                          method="POST"
                          enctype="multipart/form-data"
                          class="space-y-4">
                        @csrf

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="sm:col-span-2">
                                <label class="mb-1 block text-sm font-medium text-gray-700">Product Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" required
                                       placeholder="e.g. Classic Scrub Set"
                                       class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 focus:border-[#168C91] focus:outline-none focus:ring-1 focus:ring-[#168C91]">
                            </div>

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">Category</label>
                                <select name="category_id" required
                                        class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 focus:border-[#168C91] focus:outline-none">
                                    <option value="">Select category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">Stock Quantity</label>
                                <input type="number" name="stock_quantity" min="0"
                                       value="{{ old('stock_quantity', 0) }}" required
                                       class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 focus:border-[#168C91] focus:outline-none">
                            </div>

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">Price (₱)</label>
                                <input type="number" name="price" min="0" step="0.01"
                                       value="{{ old('price') }}" required
                                       placeholder="0.00"
                                       class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 focus:border-[#168C91] focus:outline-none">
                            </div>

                            <div>
                                <label class="mb-1 block text-sm font-medium text-gray-700">Sale Price (₱)</label>
                                <input type="number" name="sale_price" min="0" step="0.01"
                                       value="{{ old('sale_price') }}"
                                       placeholder="Optional"
                                       class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 focus:border-[#168C91] focus:outline-none">
                            </div>

                            <div class="sm:col-span-2">
                                <label class="mb-1 block text-sm font-medium text-gray-700">Description</label>
                                <textarea name="description" rows="3"
                                          placeholder="Describe this product..."
                                          class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 focus:border-[#168C91] focus:outline-none">{{ old('description') }}</textarea>
                            </div>

                            <div class="sm:col-span-2">
                                <label class="mb-1 block text-sm font-medium text-gray-700">Product Image</label>
                                <input type="file" name="image" accept="image/*"
                                       class="block w-full rounded-lg border border-gray-300 text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-100 file:px-4 file:py-2">
                                <p class="mt-1 text-xs text-gray-500">JPG, PNG, or WEBP. Maximum 5 MB.</p>
                            </div>

                            <div class="sm:col-span-2">
                                <label class="mb-1 block text-sm font-medium text-gray-700">Image Alt Text</label>
                                <input type="text" name="image_alt" value="{{ old('image_alt') }}"
                                       placeholder="Short description of the image"
                                       class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 focus:border-[#168C91] focus:outline-none">
                            </div>

                            <div class="flex flex-wrap gap-6 sm:col-span-2">
                                <label class="flex items-center gap-2 text-sm text-gray-700">
                                    <input type="hidden" name="is_active" value="0">
                                    <input type="checkbox" name="is_active" value="1"
                                           @checked(old('is_active', true))
                                           class="rounded border-gray-300 text-[#168C91] focus:ring-[#168C91]">
                                    Active
                                </label>

                                <label class="flex items-center gap-2 text-sm text-gray-700">
                                    <input type="hidden" name="is_featured" value="0">
                                    <input type="checkbox" name="is_featured" value="1"
                                           @checked(old('is_featured'))
                                           class="rounded border-gray-300 text-[#168C91] focus:ring-[#168C91]">
                                    Featured product
                                </label>
                            </div>
                        </div>

                        <x-ui.dialog-footer>
                            <x-ui.button type="submit" color="#168C91"
                                         class="!bg-[#168C91] !text-white">
                                Save Product
                            </x-ui.button>
                        </x-ui.dialog-footer>
                    </form>
                </x-ui.dialog-content>
            </x-ui.dialog>
        </div>

        {{-- Search and filter --}}
        <div class="rounded-xl border border-gray-200 bg-white p-4">
            <form method="GET" action="{{ route('admin.products.index') }}"
                  class="flex flex-col gap-3 sm:flex-row">
                <div class="relative flex-1">
                    <x-lucide-search class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-400" />
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="Search products..."
                           class="w-full rounded-lg border border-gray-300 py-2 pl-9 pr-3 text-sm text-gray-900 focus:border-[#168C91] focus:outline-none">
                </div>

                <select name="category"
                        class="rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-700 focus:border-[#168C91] focus:outline-none">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @selected(request('category') == $category->id)>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                <x-ui.button type="submit" variant="outline">
                    Filter
                </x-ui.button>

                @if(request()->hasAny(['search', 'category']))
                    <a href="{{ route('admin.products.index') }}"
                       class="rounded-lg border border-gray-300 px-4 py-2 text-center text-sm text-gray-600 hover:bg-gray-50">
                        Clear
                    </a>
                @endif
            </form>
        </div>

        {{-- Products table --}}
        <div class="overflow-hidden rounded-xl border border-gray-200 bg-white">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-gray-50 text-xs uppercase tracking-wide text-gray-500">
                        <tr>
                            <th class="px-5 py-4">Product</th>
                            <th class="px-5 py-4">Category</th>
                            <th class="px-5 py-4">Price</th>
                            <th class="px-5 py-4">Stock</th>
                            <th class="px-5 py-4">Status</th>
                            <th class="px-5 py-4 text-right">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">
                        @forelse($products as $product)
                            <tr class="hover:bg-gray-50/70">
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        @if($product->image_path)
                                            <img src="{{ asset('storage/' . $product->image_path) }}"
                                                 alt="{{ $product->image_alt ?: $product->name }}"
                                                 class="h-12 w-12 rounded-lg border border-gray-200 object-cover">
                                        @else
                                            <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-gray-100 text-gray-400">
                                                <x-lucide-image class="h-5 w-5" />
                                            </div>
                                        @endif

                                        <div>
                                            <p class="font-medium text-gray-900">{{ $product->name }}</p>
                                            @if($product->is_featured)
                                                <span class="mt-1 inline-flex items-center gap-1 text-xs text-amber-600">
                                                    <x-lucide-star class="h-3 w-3" /> Featured
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </td>

                                <td class="px-5 py-4 text-gray-600">
                                    {{ $product->category?->name ?? 'Uncategorized' }}
                                </td>

                                <td class="px-5 py-4">
                                    @if($product->sale_price)
                                        <p class="font-medium text-gray-900">
                                            ₱{{ number_format((float) $product->sale_price, 2) }}
                                        </p>
                                        <p class="text-xs text-gray-400 line-through">
                                            ₱{{ number_format((float) $product->price, 2) }}
                                        </p>
                                    @else
                                        <span class="font-medium text-gray-900">
                                            ₱{{ number_format((float) $product->price, 2) }}
                                        </span>
                                    @endif
                                </td>

                                <td class="px-5 py-4">
                                    <span class="{{ $product->stock_quantity <= 5 ? 'text-amber-600' : 'text-gray-700' }}">
                                        {{ $product->stock_quantity }}
                                    </span>
                                </td>

                                <td class="px-5 py-4">
                                    @if($product->is_active)
                                        <span class="rounded-full bg-emerald-50 px-2.5 py-1 text-xs font-medium text-emerald-700">
                                            Active
                                        </span>
                                    @else
                                        <span class="rounded-full bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-600">
                                            Inactive
                                        </span>
                                    @endif
                                </td>

                                <td class="px-5 py-4">
                                    <div class="flex items-center justify-end gap-2">
                                        {{-- Edit dialog --}}
                                        <x-ui.dialog>
                                            <x-ui.dialog-trigger>
                                                <button type="button"
                                                        class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-[#168C91]"
                                                        title="Edit product">
                                                    <x-lucide-pencil class="h-4 w-4" />
                                                </button>
                                            </x-ui.dialog-trigger>

                                            <x-ui.dialog-content class="!max-w-2xl">
                                                <x-ui.dialog-header>
                                                    <x-ui.dialog-title>Edit Product</x-ui.dialog-title>
                                                    <x-ui.dialog-description>
                                                        Update {{ $product->name }}.
                                                    </x-ui.dialog-description>
                                                </x-ui.dialog-header>

                                                <form action="{{ route('admin.products.update', $product) }}"
                                                      method="POST" enctype="multipart/form-data"
                                                      class="space-y-4">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="grid gap-4 sm:grid-cols-2">
                                                        <div class="sm:col-span-2">
                                                            <label class="mb-1 block text-sm font-medium text-gray-700">Product Name</label>
                                                            <input type="text" name="name" value="{{ $product->name }}" required
                                                                   class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 focus:border-[#168C91] focus:outline-none">
                                                        </div>

                                                        <div>
                                                            <label class="mb-1 block text-sm font-medium text-gray-700">Category</label>
                                                            <select name="category_id" required
                                                                    class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 focus:border-[#168C91] focus:outline-none">
                                                                @foreach($categories as $category)
                                                                    <option value="{{ $category->id }}" @selected($product->category_id == $category->id)>
                                                                        {{ $category->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div>
                                                            <label class="mb-1 block text-sm font-medium text-gray-700">Stock Quantity</label>
                                                            <input type="number" name="stock_quantity" min="0"
                                                                   value="{{ $product->stock_quantity }}" required
                                                                   class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 focus:border-[#168C91] focus:outline-none">
                                                        </div>

                                                        <div>
                                                            <label class="mb-1 block text-sm font-medium text-gray-700">Price (₱)</label>
                                                            <input type="number" name="price" min="0" step="0.01"
                                                                   value="{{ $product->price }}" required
                                                                   class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 focus:border-[#168C91] focus:outline-none">
                                                        </div>

                                                        <div>
                                                            <label class="mb-1 block text-sm font-medium text-gray-700">Sale Price (₱)</label>
                                                            <input type="number" name="sale_price" min="0" step="0.01"
                                                                   value="{{ $product->sale_price }}"
                                                                   class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 focus:border-[#168C91] focus:outline-none">
                                                        </div>

                                                        <div class="sm:col-span-2">
                                                            <label class="mb-1 block text-sm font-medium text-gray-700">Description</label>
                                                            <textarea name="description" rows="3"
                                                                      class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 focus:border-[#168C91] focus:outline-none">{{ $product->description }}</textarea>
                                                        </div>

                                                        <div class="sm:col-span-2">
                                                            @if($product->image_path)
                                                                <div class="mb-3 flex items-center gap-3">
                                                                    <img src="{{ asset('storage/' . $product->image_path) }}"
                                                                         class="h-16 w-16 rounded-lg border object-cover"
                                                                         alt="{{ $product->image_alt ?: $product->name }}">
                                                                    <span class="text-xs text-gray-500">Current product image</span>
                                                                </div>
                                                            @endif

                                                            <label class="mb-1 block text-sm font-medium text-gray-700">Replace Image</label>
                                                            <input type="file" name="image" accept="image/*"
                                                                   class="block w-full rounded-lg border border-gray-300 text-sm text-gray-700 file:mr-4 file:border-0 file:bg-gray-100 file:px-4 file:py-2">
                                                        </div>

                                                        <div class="sm:col-span-2">
                                                            <label class="mb-1 block text-sm font-medium text-gray-700">Image Alt Text</label>
                                                            <input type="text" name="image_alt" value="{{ $product->image_alt }}"
                                                                   class="w-full rounded-lg border border-gray-300 px-3 py-2 text-sm text-gray-900 focus:border-[#168C91] focus:outline-none">
                                                        </div>

                                                        <div class="flex flex-wrap gap-6 sm:col-span-2">
                                                            <label class="flex items-center gap-2 text-sm text-gray-700">
                                                                <input type="hidden" name="is_active" value="0">
                                                                <input type="checkbox" name="is_active" value="1"
                                                                       @checked($product->is_active)
                                                                       class="rounded border-gray-300 text-[#168C91] focus:ring-[#168C91]">
                                                                Active
                                                            </label>

                                                            <label class="flex items-center gap-2 text-sm text-gray-700">
                                                                <input type="hidden" name="is_featured" value="0">
                                                                <input type="checkbox" name="is_featured" value="1"
                                                                       @checked($product->is_featured)
                                                                       class="rounded border-gray-300 text-[#168C91] focus:ring-[#168C91]">
                                                                Featured product
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <x-ui.dialog-footer>
                                                        <x-ui.button type="submit" color="#168C91"
                                                                     class="!bg-[#168C91] !text-white">
                                                            Update Product
                                                        </x-ui.button>
                                                    </x-ui.dialog-footer>
                                                </form>
                                            </x-ui.dialog-content>
                                        </x-ui.dialog>

                                        {{-- Delete --}}
                                        <form action="{{ route('admin.products.destroy', $product) }}"
                                              method="POST"
                                              onsubmit="return confirm('Are you sure you want to delete this product?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="rounded-lg p-2 text-gray-400 hover:bg-red-50 hover:text-red-600"
                                                    title="Delete product">
                                                <x-lucide-trash-2 class="h-4 w-4" />
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-5 py-12 text-center">
                                    <x-lucide-package class="mx-auto h-9 w-9 text-gray-300" />
                                    <p class="mt-3 font-medium text-gray-700">No products found</p>
                                    <p class="mt-1 text-sm text-gray-500">
                                        Add your first product to get started.
                                    </p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="border-t border-gray-100 px-5 py-4">
                {{ $products->links() }}
            </div>
        </div>
    </div>

    @if(session('sonner'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                window.toast.success(@json(session('sonner.message')));
            });
        </script>
    @endif
</x-layouts.app>