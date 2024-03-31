<?php

use App\Http\Controllers\Backend\ReservationsController;
use Illuminate\Support\Facades\Route;

Route::prefix('Reservations')->group(function () {
  Route::get('index',[ReservationsController::class,'index'])->name('backend.reservations.index');

  Route::get('create',[ReservationsController::class,'create'])->name('backend.reservations.create');

  Route::post('store',[ReservationsController::class,'store'])->name('backend.reservations.store');

  Route::get('{id}/edit',[ReservationsController::class,'edit'])->name('backend.reservations.edit');

  Route::put('{id}/update',[ReservationsController::class,'update'])->name('backend.reservations.update');

  Route::delete('destroy/{id}',[ReservationsController::class,'destroy'])->name('backend.reservations.destroy');

});