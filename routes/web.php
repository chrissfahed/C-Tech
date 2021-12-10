<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ShopsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AboutusController;


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



Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::patch('/cart/{product}', [CartController::class, 'update'])->name('cart.update');


Route::get('/contactus', [ContactusController::class, 'index'])->name('contactus.show');

Route::get('/empty',[CartController::class, 'emptycart'])->name('cart.empty');

Route::get('/appointment', [AppointmentController::class, 'index'])->name('appointment.index');

Route::post('/appointment2', [AppointmentController::class, 'update'])->name('appointment.store');

Route::get('/aboutus', [AboutusController::class,'index'])->name('aboutus.index');

// Route::get('/search', [ShopsController::class, 'search'])->name('search');
Route::get('/search', 'App\Http\Controllers\ShopsController@search')->name('search');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function() {   
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.show');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

    Route::post('/cart', [CartController::class, 'store'])->name('cart.store'); 

    Route::get('/Logout', [HomeController::class, 'logout'])->name('home.logout'); 

    Route::get('/profile', [UsersController::class, 'index'])->name('user.index');
    
    Route::get('/checkout2',[CheckoutController::class,'store'])->name('checkout.store');

    Route::post('/userupdate',[UsersController::class, 'update'])->name('user.update');
});