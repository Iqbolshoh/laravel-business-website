<?php

use Illuminate\Support\Facades\Route;
use App\Filament\Pages\Auth\Register;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
