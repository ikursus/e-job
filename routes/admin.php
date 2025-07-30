<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Admin\JawatanController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermohonanController;

// Route untuk admin
// Route::group([
//     'prefix' => 'admin', // Prefix URL untuk admin
//     'as' => 'admin.', // Prefix untuk nama route
//     'middleware' => ['auth']
// ], function () {
   
Route::get('/dashboard', DashboardController::class)->name('dashboard');

// Route untuk pengurusan pengguna
Route::post('/users/datatables', [UserController::class, 'datatables'])->name('users.datatables');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}/edit', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// Route untuk pengurusan jawatan
Route::resource('jawatan', JawatanController::class);

// Route untuk pengurusan permohonan
Route::get('permohonan', [PermohonanController::class, 'index'])->name('permohonan.index');

Route::get('permohonan/export', [PermohonanController::class, 'export'])->name('permohonan.export');
Route::get('permohonan/{id}', [PermohonanController::class, 'show'])->name('permohonan.show');

Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::delete('notifications/{id?}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
Route::get('notifications/{id}', [NotificationController::class, 'read'])->name('notifications.read');


// });