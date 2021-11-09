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


    /**
     * Articles
     */
    Route::prefix('articles')->as('articles:')->group(function () {
        Route::get('/', App\Http\Controllers\Pages\Dashboard\Articles\IndexController::class)->name('index');
        Route::get('create', App\Http\Controllers\Pages\Dashboard\Articles\CreateController::class)->name('create');
//        Route::post('/', 'ArticleController@store')->name('store');
//        Route::get('/{article}', 'ArticleController@show')->name('show');
//        Route::get('/{article}/edit', 'ArticleController@edit')->name('edit');
//        Route::put('/{article}', 'ArticleController@update')->name('update');
//        Route::delete('/{article}', 'ArticleController@destroy')->name('destroy');
    });
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
