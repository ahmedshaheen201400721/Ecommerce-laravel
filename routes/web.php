<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
\Illuminate\Support\Facades\Auth::loginUsingId(1);
Route::get('/', function () {
    return view('main');
});

Route::get('/products', function () {
    return view('products');
});

Route::get('/product', function () {
    return view('single');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/thanks', function () {
    return view('thank');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
