<?php

use App\Http\Controllers\frontend\PagesController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class,'index'])->name('pages.index');