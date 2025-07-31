<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OCRController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
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

    // Route untuk urusan data posts daripada jsonplaceholder
    Route::resource('posts', PostController::class);

    Route::get('/step1', [ProfileController::class, 'step1'])->name('profile.step1');
    Route::post('/step1', [ProfileController::class, 'step1store'])->name('profile.step1store');

    Route::get('/step2', [ProfileController::class, 'step2'])->name('profile.step2');
    Route::post('/step2', [ProfileController::class, 'step2store'])->name('profile.step2store');

    Route::get('/step3', [ProfileController::class, 'step3'])->name('profile.step3');
    Route::post('/step3', [ProfileController::class, 'step3store'])->name('profile.step3store');

    Route::get('/step-final', [ProfileController::class, 'stepFinal'])->name('profile.step-final');


    Route::get('/ocr', [OCRController::class, 'index'])->name('ocr.index');
    Route::post('/ocr/process', [OCRController::class, 'processImage'])->name('ocr.process');
    Route::post('/ocr/extract-form', [OCRController::class, 'extractFormData'])->name('ocr.extract-form');

    // Add to routes/web.php untuk testing
    Route::get('/test-vision-config', function() {
        return [
            'enabled' => config('google-cloud-vision.enabled'),
            'project_id' => config('google-cloud-vision.project_id'),
            'key_file' => config('google-cloud-vision.key_file'),
            'key_file_exists' => file_exists(config('google-cloud-vision.key_file')),
            'env_enabled' => env('GOOGLE_CLOUD_VISION_ENABLED'),
            'env_project' => env('GOOGLE_CLOUD_PROJECT_ID'),
            'env_keyfile' => env('GOOGLE_CLOUD_KEY_FILE'),
        ];
    });

});

Route::view('contoh', 'template-contoh');

Route::get('/google', function () {
    return config('google-cloud-vision.key_file');
});

Route::get('/test-ssl', function() {
    $context = stream_context_create([
        "http" => [
            "method" => "GET",
            "header" => "Content-Type: application/json\r\n",
        ],
        "ssl" => [
            "verify_peer" => false,
            "verify_peer_name" => false,
        ],
    ]);

    try {
        $result = file_get_contents("https://www.google.com", false, $context);
        return ['ssl_test' => 'SUCCESS', 'can_connect' => true];
    } catch (Exception $e) {
        return ['ssl_test' => 'FAILED', 'error' => $e->getMessage()];
    }
});
