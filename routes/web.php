<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainController::class,'startGame'])->name('star');
Route::post('/',[MainController::class,'prepareGame'])->name('prepare');