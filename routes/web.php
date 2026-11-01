
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\HeroSettingController;
use App\Models\HeroSetting;
use App\Http\Controllers\Admin\CategoryController;
use App\Models\Category;
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

    return view('store.home', compact('hero', 'categories'));
})->name('store.home');

/*
|--------------------------------------------------------------------------
| Customer Authentication
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
| Admin Dashboard
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
    ->except(['show']);


    });
