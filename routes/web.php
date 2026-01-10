<?php

use App\Http\Controllers\MainController;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainController::class,'startGame'])->name('star');
Route::post('/',[MainController::class,'prepareGame'])->name('prepareGame');
Route::get('/game',[MainController::class,'game'])->name('game');
Route::get('/answer{answer}',[MainController::class,'answer'])->name('answer');