<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainController::class,'startGame'])->name('star');
Route::post('/',[MainController::class,'prepareGame'])->name('prepareGame');
Route::get('/teste',[MainController::class,'quizz']);