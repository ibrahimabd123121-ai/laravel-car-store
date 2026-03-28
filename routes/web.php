<?php

use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\PartsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::resource('brands',BrandController::class);
Route::resource('cars',CarController::class);
Route::resource('parts',PartsController::class);
Route::get('store/cars',[StoreController::class,'cars'])->name('store.cars');
Route::get('store/show/{id}',[StoreController::class,'show'])->name('store.show');

Route::post('/cart/add/{id}',[CartController::class,'add'])->name('cart.add');
Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::post('/cart/remove/{id}',[CartController::class,'remove'])->name('cart.remove');
Route::post('/cart/update/{id}',[CartController::class,'update'])->name('cart.update');


Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');