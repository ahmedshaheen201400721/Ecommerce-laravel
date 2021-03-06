<?php

use Illuminate\Http\Request;
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
//\Illuminate\Support\Facades\Auth::loginUsingId(1);

Route::get('/',[\App\Http\Controllers\productController::class,'index'])->name('main');


Route::get('/shop', [\App\Http\Controllers\productController::class,'shop'])->name('shop.index');
Route::get('shop/{product:slug}', [\App\Http\Controllers\productController::class,'show'])->name('shop.product');


Route::get('/cart', [\App\Http\Controllers\cartController::class,'index'])->name('cart.index');
Route::post('/cart', [\App\Http\Controllers\cartController::class,'store'])->name('cart.store');
Route::patch('/cart', [\App\Http\Controllers\cartController::class,'update'])->name('cart.update');
Route::delete('/cart/{id}', [\App\Http\Controllers\cartController::class,'destroy'])->name('cart.destroy');
Route::post('saved/cart/{id}', [\App\Http\Controllers\cartController::class,'switchToSaved'])->name('cart.switch');
Route::post('back/cart/{id}', [\App\Http\Controllers\cartController::class,'back'])->name('cart.back');
Route::delete('back/cart/{id}', [\App\Http\Controllers\cartController::class,'destroySaved'])->name('cart.destroySaved');


Route::get('/charage', [\App\Http\Controllers\charageController::class,'index'])->name('charge.index')->middleware('auth');
Route::post('/charage', [\App\Http\Controllers\charageController::class,'store'])->name('charge.post')->middleware('auth');


Route::delete('/coupon', [\App\Http\Controllers\couponController::class,'destroy'])->name('coupon.destroy');
Route::post('/coupon', [\App\Http\Controllers\couponController::class,'store'])->name('coupon.store');


Route::get('/empty',function (){
    \Gloudemans\Shoppingcart\Facades\Cart::destroy();
    session()->forget('subtotal');
    \Gloudemans\Shoppingcart\Facades\Cart::instance('saveForLater')->destroy();
    return \Gloudemans\Shoppingcart\Facades\Cart::content();
});



Route::get('/thanks', function () {
    return view('pages.thank');
})->name('thanks');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');




require __DIR__.'/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
