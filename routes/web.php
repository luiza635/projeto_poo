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
});

Route::middleware(['auth', 'journalist'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/admin/news', fn() => view('admin.news.index'));
    Route::get('/admin/categories', fn() => view('admin.categories.index'));
    Route::get('/admin/gallery', fn() => view('admin.gallery.index'));
});

require __DIR__.'/auth.php';