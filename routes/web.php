<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\AuthController;

// Halaman beranda (hanya bisa diakses setelah login)
Route::get('/', [BerandaController::class, 'index'])->name('beranda');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Logout (POST method untuk keamanan)
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Contoh routing data
Route::get('/warga', [WargaController::class, 'index'])->name('warga');
Route::get('/iuran', [IuranController::class, 'index'])->name('iuran');
