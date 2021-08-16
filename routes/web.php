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
//main
Route::get('/',[\App\Http\Controllers\productController::class,'index'])->name('main');

//shop
Route::get('/shop', [\App\Http\Controllers\productController::class,'shop'])->name('shop.index');
Route::get('shop/{product:slug}', [\App\Http\Controllers\productController::class,'show'])->name('shop.product');

//cart
Route::get('/cart', [\App\Http\Controllers\cartController::class,'index'])->name('cart.index');
Route::post('/cart', [\App\Http\Controllers\cartController::class,'store'])->name('cart.store');
Route::patch('/cart', [\App\Http\Controllers\cartController::class,'update'])->name('cart.update');
Route::delete('/cart/{id}', [\App\Http\Controllers\cartController::class,'destroy'])->name('cart.destroy');
Route::post('saved/cart/{id}', [\App\Http\Controllers\cartController::class,'switchToSaved'])->name('cart.switch');
Route::post('back/cart/{id}', [\App\Http\Controllers\cartController::class,'back'])->name('cart.back');
Route::delete('back/cart/{id}', [\App\Http\Controllers\cartController::class,'destroySaved'])->name('cart.destroySaved');

//charge
Route::get('/charage', [\App\Http\Controllers\charageController::class,'index'])->name('charge.index')->middleware('auth');
Route::post('/charage', [\App\Http\Controllers\charageController::class,'store'])->name('charge.post')->middleware('auth');

//coupon
Route::delete('/coupon', [\App\Http\Controllers\couponController::class,'destroy'])->name('coupon.destroy');
Route::post('/coupon', [\App\Http\Controllers\couponController::class,'store'])->name('coupon.store');

//profile
Route::name('profile.')->middleware('auth')->prefix('profile')->group(function (){
    Route::get('/show',[\App\Http\Controllers\UserController::class,'show'])->name('show');
    Route::patch('/edit',[\App\Http\Controllers\UserController::class,'edit'])->name('edit');
});
//empty cart
Route::get('/empty',function (){
    \Gloudemans\Shoppingcart\Facades\Cart::destroy();
    session()->forget('subtotal');
    \Gloudemans\Shoppingcart\Facades\Cart::instance('saveForLater')->destroy();
    return \Gloudemans\Shoppingcart\Facades\Cart::content();
});

//search
Route::get('/search',function (){
    return view('pages.search');
});

//thanks
Route::get('/thanks', function () {
    return view('pages.thank');
})->name('thanks');

//dashboard
Route::redirect('/dashboard', "/")->name('dashboard');




require __DIR__.'/auth.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
