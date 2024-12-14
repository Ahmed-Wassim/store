<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\site\CartController;
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\site\CheckoutController;
use App\Http\Controllers\Dashboard\StoreController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Site\StoreController as SiteStoreController;
use App\Http\Controllers\Site\ProductController as SiteProductController;
use App\Http\Controllers\Site\CategoryController as SiteCategoryController;

Route::get('/', HomeController::class)->name('home');
Route::resource('/categories', SiteCategoryController::class);
Route::get('/products/{product}', [SiteProductController::class, 'show'])->name('products.show');
Route::resource('/cart', CartController::class)->only(['index', 'store', 'update', 'destroy']);

Route::get('checkout', [CheckoutController::class, 'create'])->name('checkout');
Route::post('checkout', [CheckoutController::class, 'store']);

Route::resource('/stores', SiteStoreController::class)->except(['index']);

require __DIR__ . '/auth.php';

Route::get('dashboard/index', function () {
    // dd(Auth::user());
    return view('dashboard.index');
})->middleware(['auth', 'role:admin|super admin|vendor'])->name('dashboard');

Route::middleware(['auth', 'role:admin|super admin|vendor'])->prefix('/dashboard')->name('dashboard.')->group(function () {
    Route::resource('categories', CategoryController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::resource('products', ProductController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('/stores', StoreController::class)->only(['index', 'destroy', 'edit']);
    Route::post('stores/updateStatus', [StoreController::class, 'updateStatus'])->name('stores.updateStatus');
});
