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
    Route::get('/user/{id}', function (string $id) {
    return 'User ID: ' . $id;
    });
    Route::get('/user/{name?}', function (?string $name = 'Guest') {
    return 'Hello ' . $name;
    });

    Route::get('/posts', [PostController::class, 'index'])
    ->middleware('auth');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    Route::get('/posts/create', [PostController::class, 'create'])
    ->middleware('auth')
    ->name('posts.create');

    Route::post('/posts', [PostController::class, 'store'])
    ->middleware('auth')
    ->name('posts.store');

    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
    ->middleware('auth')
    ->name('posts.edit');

    Route::put('/posts/{post}', [PostController::class, 'update'])
    ->middleware('auth')
    ->name('posts.update');

    Route::delete('/posts/{post}', [PostController::class, 'destroy'])
    ->middleware('auth')
    ->name('posts.destroy');
