<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AboutController;

use App\Http\Controllers\ArticleController;

use App\Http\Controllers\AuthController;

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [ArticleController::class, 'index'])->name('home');
Route::resource('articles', ArticleController::class);

Route::get('/favorites', [ArticleController::class, 'favorites'])->name('favorites');

Route::post('/favorites/add/{id}', [ArticleController::class, 'addToFavorites'])->name('favorites.add');

Route::get('/products', [ArticleController::class, 'products'])->name('products');

Route::get('/toggle-edit', function () {
    session(['editMode' => !session('editMode', false)]);
    return back();
});

Route::get('/lang/{locale}', function ($locale) {
    if (!in_array($locale, ['ro', 'ru'])) {
        abort(404);
    }

    session(['locale' => $locale]);

    return redirect()->back();
})->name('lang.switch');

Route::view('/delivery', 'articles.delivery')->name('articles.delivery');
Route::view('/contact', 'articles.contact')->name('articles.contact');
Route::view('/about', 'articles.about')->name('articles.about');
Route::view('/payment', 'articles.payment')->name('articles.payment');


Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');

Route::get('/orders', [CheckoutController::class, 'orders'])->name('orders.index');


Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/increase/{id}', [CartController::class, 'increaseQuantity'])
    ->name('cart.increase');

Route::post('/cart/decrease/{id}', [CartController::class, 'decreaseQuantity'])
    ->name('cart.decrease');

Route::post('/cart/remove/{id}', [CartController::class, 'remove'])
    ->name('cart.remove');

Route::post('/favorites/toggle/{id}', [ArticleController::class, 'addToFavorites'])
    ->name('favorites.toggle');


Route::delete('/favorites/{id}', [ArticleController::class, 'remove'])
    ->name('favorites.remove');
