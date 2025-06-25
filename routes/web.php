<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JawatanController;

// Halaman utama
// Format route: Route::method('url', function);
Route::get('/', HomeController::class);

// Route untuk login
Route::get('/login', [LoginController::class, 'borangLogin'])->name('login');
Route::post('/login', [LoginController::class, 'prosesLogin'])->name('login.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk register
Route::get('/register', [RegisterController::class, 'borangDaftar'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/password/reset', [PasswordResetController::class, 'borangReset'])->name('password.request');
Route::post('/password/email', [PasswordResetController::class, 'emailReset'])->name('password.email');
Route::post('/password/reset', [PasswordResetController::class, 'updatePassword'])->name('password.update');

// Route untuk contact
Route::get('/contact', [ContactController::class, 'borangContact'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendContact'])->name('contact.send');

// Route untuk admin
Route::group([
    'prefix' => 'admin', // Prefix URL untuk admin
    'as' => 'admin.', // Prefix untuk nama route
], function () {
   
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    // Route untuk pengurusan pengguna
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}/edit', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Route untuk pengurusan jawatan
    Route::resource('jawatan', JawatanController::class);
});

Route::view('contoh', 'template-contoh');