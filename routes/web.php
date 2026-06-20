<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\JournalistController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AdminController;

// ROTA HOME — necessária pois o layout usa route('home') no logo
Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('jornalista.dashboard')
        : redirect()->route('login');
})->name('home');

// ROTA TEMPORÁRIA DE DIAGNÓSTICO - REMOVER DEPOIS
Route::get('/debug-auth', function () {
    return [
        'autenticado' => Auth::check(),
        'usuario' => Auth::user(),
        'session_id' => session()->getId(),
        'guard_padrao' => config('auth.defaults.guard'),
    ];
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
use App\Http\Controllers\ReaderController;