<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/basket', [BasketController::class, 'index'])->name('basket.index');
Route::post('/basket/add', [BasketController::class, 'store'])->name('basket.index');
Route::get('/login', function () {
    return view('login');
});

Route::get('/product/details', function () {
    return view('details');
});
Route::get('/account/orders', function () {
    return view('account-orders');
});

