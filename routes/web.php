<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get(
    '@{user:handle}',
    App\Http\Controllers\Users\ProfileController::class,
)->name('users:profile');

Route::get(
    '@{user:handle}/{article:slug}',
    App\Http\Controllers\Articles\ShowController::class,
)->name('articles:show');

// /topics/tutorials
// /category/beginner
