<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\PasswordResetController;

// Halaman utama
// Format route: Route::method('url', function);
Route::get('/', HomeController::class);

// Route untuk login
Route::get('/login', [LoginController::class, 'borangLogin'])->name('login');
Route::post('/login', [LoginController::class, 'prosesLogin'])->name('login.authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk register
Route::get('/register', [RegisterController::class, 'borangDaftar'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/password/reset', [PasswordResetController::class, 'borangReset'])->name('password.request');
Route::post('/password/email', [PasswordResetController::class, 'emailReset'])->name('password.email');
Route::post('/password/reset', [PasswordResetController::class, 'updatePassword'])->name('password.update');

// Route untuk contact
Route::get('/contact', [ContactController::class, 'borangContact'])->name('contact');
Route::post('/contact', [ContactController::class, 'sendContact'])->name('contact.send');

// Route untuk pengguna
Route::middleware('auth', 'checkuser')->group( function() {

    Route::get('dashboard', function () {
        return view('pengguna.template-dashboard');
    })->name('dashboard.pengguna');

    Route::get('jobs', [IklanController::class, 'index'])->name('jobs.index');
    Route::get('jobs/apply/{id?}', [PermohonanController::class, 'store'])->name('jobs.apply');

    Route::get('permohonan', [\App\Http\Controllers\PermohonanController::class, 'index'])->name('permohonan.index');
    Route::get('permohonan/{permohonan}/edit', [\App\Http\Controllers\PermohonanController::class, 'edit'])->name('permohonan.edit');
    Route::put('permohonan/{permohonan}', [\App\Http\Controllers\PermohonanController::class, 'update'])->name('permohonan.update');
    Route::delete('permohonan/{permohonan}', [\App\Http\Controllers\PermohonanController::class, 'destroy'])->name('permohonan.destroy');

    
});

Route::view('contoh', 'template-contoh');