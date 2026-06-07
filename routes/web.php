<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/noticias/{id}', function ($id) {
    return view('news.show', ['id' => $id]);
})->name('news.show');

Route::middleware('auth')->group(function () {
    Route::post('/comentarios', [CommentController::class, 'store'])->name('comments.store');
    Route::put('/comentarios/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comentarios/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::get('/admin/dashboard', function () {
    if (auth()->user()->email !== 'admin@email.com') {
        return redirect()->route('home');
    }

    return view('admin.dashboard');
})->middleware('auth')->name('admin.dashboard');

Route::get('/dashboard', function () {
    if (auth()->user()->email === 'admin@email.com') {
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('home');
})->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';