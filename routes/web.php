<?php

use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/kindergarten/{kindergarten}', [LandingController::class, 'show'])->name('kindergarten.show');
