<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ClickController;



Route::get('/', function () {
    return view('home.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
Route::post('/messages/send', [MessageController::class, 'send'])->name('messages.send');

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::resource('news', NewsController::class);

// Reacties toevoegen
Route::post('/news/{news}/comments',[CommentController::class, 'store'])->name('comments.store');
Route::get('/', [NewsController::class, 'index'])->name('home');
Route::post('/api/click', [ClickController::class, 'store'])->middleware('auth');
Route::post('/clicks', [ClickController::class, 'store'])->name('clicks.store');

require __DIR__.'/auth.php';
