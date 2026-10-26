<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController; // این خط برای کتاب‌ها اضافه شده
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::middleware('guest')->group(function () {
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');

    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

Route::middleware('auth')->group(function () {
    // این خط تغییر کرد تا داشبورد به کنترلر کتاب‌ها وصل شود
    Route::get('/dashboard', [BookController::class, 'index'])->name('dashboard');
    
    // این خط جدید برای ذخیره کتاب است
    Route::post('/books', [BookController::class, 'store'])->name('books.store');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});