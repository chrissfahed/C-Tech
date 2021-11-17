<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ShopsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\AppointmentController;
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
Route::get('/', [ItemsController::class, 'index']);

Route::get('/shop', [ShopsController::class, 'index'])->name('shop.index');

Route::get('/shop/{id}', [ShopsController::class, 'show'])->name('shop.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::post('/cart', [CartController::class, 'store'])->name('cart.store');

Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::patch('/cart/{product}', [CartController::class, 'update'])->name('cart.update');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.show');

Route::get('/contactus', [ContactusController::class, 'index'])->name('contactus.show');

Route::get('/empty',[CartController::class, 'emptycart'])->name('cart.empty');

Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment.index');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
