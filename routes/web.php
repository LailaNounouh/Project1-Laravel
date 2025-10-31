<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqQuestionController;
use Illuminate\Support\Facades\Auth;

Route::get('/', [NewsController::class, 'index'])->name('home');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::post('/faq', [FaqController::class, 'store'])->name('faq.store');
Route::post('/faq/question', [FaqQuestionController::class, 'store'])->name('faq.question.store');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::resource('news', NewsController::class)->except(['index', 'show']);
    Route::resource('faqs', FaqController::class);
});

require __DIR__ . '/auth.php';
