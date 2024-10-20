<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('auth/login', [AuthController::class, 'login'])->name('auth.login');

Route::get('/details', function () {
    return view('details');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/account/orders', function () {
    return view('account-orders');
});

