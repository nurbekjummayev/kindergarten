<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/kindergarten/{kindergarten}', [LandingController::class, 'show'])->name('kindergarten.show');
Route::get('/faq', [LandingController::class, 'faq'])->name('faq');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{blog:slug}', [BlogController::class, 'show'])->name('blog.show');
