<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Route untuk dashboard
// Route::get('/siswa/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');
Route::get('/', [DashboardController::class, 'index'])->name('siswa.landing');

// Route untuk login dan logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('loginform');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman utama diarahkan ke login jika belum login


// Route yang membutuhkan autentikasi
// Route::middleware('auth')->group(function () {
    Route::get('/siswa/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');

    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    


    // Route untuk scan RFID
    Route::get('/siswa/scan', function () {
        return view('siswa.scan');
    })->name('siswa.scan');

    Route::post('/siswa/read', [SiswaController::class, 'read'])->name('siswa.read');
    Route::get('/siswa/{rfid_id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::delete('/siswa/{rfid_id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
    Route::post('/siswa/absen', [SiswaController::class, 'storeAbsensi'])->name('siswa.absen');
    Route::put('/siswa/{rfid_id}', [SiswaController::class, 'update'])->name('siswa.update');
// });
