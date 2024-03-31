<?php


use App\Http\Controllers\backend\TablesController;
use Illuminate\Support\Facades\Route;

Route::prefix('Tables')->group(function () {
  Route::get('index',[TablesController::class,'index'])->name('backend.tables.index');

  Route::get('create',[TablesController::class,'create'])->name('backend.tables.create');

  Route::post('store',[TablesController::class,'store'])->name('backend.tables.store');

  Route::get('{id}/edit',[TablesController::class,'edit'])->name('backend.tables.edit');

  Route::put('{id}/update',[TablesController::class,'update'])->name('backend.tables.update');

  Route::delete('destroy/{id}',[TablesController::class,'destroy'])->name('backend.tables.destroy');

});