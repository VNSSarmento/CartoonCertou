<?php

use App\Http\Controllers\MainController;
use App\Models\Main;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;

Route::get('/',[MainController::class,'startGame'])->name('start');
Route::post('/',[MainController::class,'prepareGame'])->name('prepareGame');
Route::get('/game',[MainController::class,'game'])->name('game');
Route::get('/answer{answer}',[MainController::class,'answer'])->name('answer');
Route::get('/nextQuestion',[MainController::class,'nextQuestion'])->name('nextQuestion');
Route::get('/result',[MainController::class,'resultGame'])->name('result');