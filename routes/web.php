<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\JournalistController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserDashboardController;

// ROTA HOME
Route::get('/', function () {
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $user = Auth::user();

    return in_array($user->role, ['admin', 'jornalista'])
        ? redirect()->route('jornalista.dashboard')
        : redirect()->route('user.dashboard');
})->name('home');

// ROTAS SÓ PARA JORNALISTA/ADMIN (criar, editar, excluir)
Route::middleware(['auth', 'journalist'])->group(function () {

    Route::get('/jornalista', [JournalistController::class, 'dashboard'])
        ->name('jornalista.dashboard');

    Route::resource('articles', ArticleController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('gallery', GalleryController::class);

    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.dashboard');

});

// ROTAS DO USUÁRIO COMUM (somente leitura)
Route::middleware('auth')->group(function () {

    Route::get('/painel', [UserDashboardController::class, 'index'])
        ->name('user.dashboard');

    Route::get('/painel/{article}', [UserDashboardController::class, 'show'])
        ->name('user.article.show');

});

require __DIR__.'/auth.php';