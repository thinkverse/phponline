<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('dashboard')
    ->middleware(['auth:sanctum', 'verified'])
    ->as('dashboard:')
    ->group(function () {

    Route::view('/', 'dashboard')->name('index');
});


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
