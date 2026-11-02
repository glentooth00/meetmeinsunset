
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HeroSettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;

use App\Models\HeroSetting;
use App\Models\Category;
use App\Models\Product;

/*
|--------------------------------------------------------------------------
| Storefront
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    $hero = HeroSetting::first();

    $categories = Category::where('is_active', true)
        ->orderBy('sort_order')
        ->orderBy('name')
        ->get();

    $products = Product::with('category')
        ->where('is_active', true)
        ->whereHas('category', function ($query) {
            $query->where('is_active', true);
        })
        ->where('is_featured', true)
        ->latest()
        ->take(4)
        ->get();

    if ($products->isEmpty()) {
        $products = Product::with('category')
            ->where('is_active', true)
            ->whereHas('category', function ($query) {
                $query->where('is_active', true);
            })
            ->latest()
            ->take(4)
            ->get();
    }

    return view('store.home', compact('hero', 'categories', 'products'));
})->name('store.home');


Route::get('/shop', function (Request $request) {
    $categories = Category::where('is_active', true)
        ->orderBy('sort_order')
        ->orderBy('name')
        ->get();

    $query = Product::with('category')
        ->where('is_active', true)
        ->whereHas('category', function ($q) {
            $q->where('is_active', true);
        });

    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('category')) {
        $query->whereHas('category', function ($q) use ($request) {
            $q->where('slug', $request->category)
              ->where('is_active', true);
        });
    }

    switch ($request->input('sort')) {
        case 'price_low':
            $query->orderByRaw('COALESCE(sale_price, price) ASC');
            break;

        case 'price_high':
            $query->orderByRaw('COALESCE(sale_price, price) DESC');
            break;

        case 'name':
            $query->orderBy('name');
            break;

        default:
            $query->latest();
            break;
    }

    $products = $query->paginate(12)->withQueryString();

    return view('store.shop', compact('products', 'categories'));
})->name('store.shop');


/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->name('login.store');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::view('/dashboard', 'admin.dashboard')
            ->name('dashboard');

        Route::get('/hero', [HeroSettingController::class, 'edit'])
            ->name('hero.edit');

        Route::put('/hero', [HeroSettingController::class, 'update'])
            ->name('hero.update');

        Route::resource('categories', CategoryController::class)
            ->except(['show', 'create', 'edit']);

        Route::resource('products', ProductController::class)
            ->only(['index', 'store', 'update', 'destroy']);
    });
