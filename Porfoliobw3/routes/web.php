<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MessageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ClickController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profielpagina', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
Route::post('/messages/send', [MessageController::class, 'send'])->name('messages.send');

// Reacties toevoegen
Route::post('/news/{news}/comments',[CommentController::class, 'store'])->name('comments.store');
Route::post('/api/click', [ClickController::class, 'store'])->middleware('auth');
Route::post('/clicks', [ClickController::class, 'store'])->name('clicks.store');


Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::resource('/users', UserController::class);
    Route::resource('/news', NewsController::class);
    Route::resource('/faq', FAQController::class);
    Route::resource('/categories', CategoryController::class);
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}/reply', [ContactController::class, 'reply'])->name('contacts.reply');
    Route::post('/contacts/{contact}/send-reply', [ContactController::class, 'sendReply'])->name('contacts.sendReply');
});

require __DIR__.'/auth.php';