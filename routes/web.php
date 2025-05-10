<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServiceController;


use App\Http\Controllers\ContactController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/services', [ServiceController::class, 'index']);


Route::get('/contact', [ContactController::class, 'index']);
Route::post('/send_message', [ContactController::class, 'sendMessage'])->name('send_message');

