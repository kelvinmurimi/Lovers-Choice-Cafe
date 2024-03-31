<?php

use App\Http\Controllers\Backend\CategoriesController;
use Illuminate\Support\Facades\Route;

Route::prefix('Categories')->group(function () {
  Route::get('index',[CategoriesController::class,'index'])->name('backend.categories.index');

  Route::get('create',[CategoriesController::class,'create'])->name('backend.categories.create');

  Route::post('store',[CategoriesController::class,'store'])->name('backend.categories.store');

  Route::get('{id}/edit',[CategoriesController::class,'edit'])->name('backend.categories.edit');

  Route::put('{id}/update',[CategoriesController::class,'update'])->name('backend.categories.update');

  Route::delete('destroy/{id}',[CategoriesController::class,'destroy'])->name('backend.categories.destroy');

});