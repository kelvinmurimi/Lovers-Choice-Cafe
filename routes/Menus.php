<?php

use App\Http\Controllers\Backend\MenusController;
use Illuminate\Support\Facades\Route;

Route::prefix('Menus')->group(function () {
  Route::get('index',[MenusController::class,'index'])->name('backend.menus.index');

  Route::get('create',[MenusController::class,'create'])->name('backend.menus.create');

  Route::post('store',[MenusController::class,'store'])->name('backend.menus.store');

  Route::get('{id}/edit',[MenusController::class,'edit'])->name('backend.menus.edit');

  Route::put('{id}/update',[MenusController::class,'update'])->name('backend.menus.update');

  Route::delete('destroy/{id}',[MenusController::class,'destroy'])->name('backend.menus.destroy');

});