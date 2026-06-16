<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\JournalistController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('jornalista.dashboard')
        : redirect()->route('login');
});

Route::middleware('auth')->group(function () {

    Route::get('/jornalista', [JournalistController::class, 'dashboard'])
        ->name('jornalista.dashboard');

    Route::resource('articles', ArticleController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('gallery', GalleryController::class);

    // ADMIN
    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.dashboard');

});

require __DIR__.'/auth.php';