<?php


use App\Http\Controllers\NameController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PostController;
require __DIR__.'/auth.php';

Route::get('/name', [NameController::class, 'index']);
//Route::get('/name', [AboutController::class, 'index']);

// Basic GET Route
Route::get('/home', function () {
    return view('home');
    });
    // Route with Parameters & Optional Fallbacks
    Route::middleware('auth')->group(function () {

        Route::get('/posts', [PostController::class, 'index']);
    
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    
        Route::get('/posts/create', [PostController::class, 'create'])
            ->name('posts.create');
    
        Route::post('/posts', [PostController::class, 'store'])
            ->name('posts.store');
    
        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
            ->name('posts.edit');
    
        Route::put('/posts/{post}', [PostController::class, 'update'])
            ->name('posts.update');
    
        Route::delete('/posts/{post}', [PostController::class, 'destroy'])
            ->name('posts.destroy');
    });