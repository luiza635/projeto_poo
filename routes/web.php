<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\JournalistController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/jornalista');
    }

    return redirect('/login');
});

Route::middleware('guest')->group(function () {
    require __DIR__.'/auth.php';
});

Route::get('/jornalista', [JournalistController::class, 'dashboard'])
    ->middleware('auth')
    ->name('jornalista');

Route::middleware('auth')->group(function () {
    Route::resource('articles', ArticleController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('gallery', GalleryController::class);
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');