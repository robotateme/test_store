<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/basket', [BasketController::class, 'index'])->name('basket.index');
Route::post('/basket/add', [BasketController::class, 'store'])->name('basket.store');
Route::delete('/basket/remove', [BasketController::class, 'removePosition'])->name('basket.remove');
Route::post('/order/create', [OrderController::class, 'store'])->name('order.create');
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout')->middleware('auth');

Route::get('/product/details', function () {
    return view('details');
});
Route::get('/profile/orders', function () {
    return view('account-orders');
})->name('account.orders')
    ->middleware('auth');

