<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {

    Route::get('/home', function () {
        return view('home');
    });

    Route::get('/profile', [ProfileController::class, 'edit']);
    Route::patch('/profile', [ProfileController::class, 'update']);
    Route::delete('/profile', [ProfileController::class, 'destroy']);

    Route::post('/comentarios', [CommentController::class, 'store']);

    Route::middleware('journalist')->group(function () {

        Route::get('/jornalista', function () {
            return view('journalist.dashboard');
        });

        Route::get('/jornalista/materias', function () {
            return view('journalist.news.index');
        });

        Route::get('/jornalista/categorias', function () {
            return view('journalist.categories.index');
        });

        Route::get('/jornalista/galeria', function () {
            return view('journalist.gallery.index');
        });
    });

    Route::prefix('admin')->middleware('journalist')->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        });

        Route::get('/news', function () {
            return view('admin.news.index');
        });

        Route::get('/categories', function () {
            return view('admin.categories.index');
        });

        Route::get('/gallery', function () {
            return view('admin.gallery.index');
        });
    });
});

require __DIR__.'/auth.php';
Route::middleware(['auth', 'journalist'])->group(function () {

    Route::get('/jornalista', function () {
        return view('journalist.dashboard');
    });

});
