<?php

use App\Http\Controllers\frontend\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class,'index'])->name('pages.index');
Route::get('/success',[PagesController::class,'sucess'])->name('pages.success');
Route::post('/cart/{id}',[PagesController::class,'addcart'])->name('cart');

Route::get('/orders',[PagesController::class,'orders'])->name('backend.orders.index');