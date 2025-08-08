<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\WargaController;
use App\Http\Controllers\Warga\BerandaController;
use App\Http\Controllers\Warga\AuthController;
use App\Http\Controllers\admin\DuesCategoryController;
use App\Http\Controllers\admin\PeymentController;


// Halaman beranda (hanya bisa diakses setelah login)
Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/admin/categories', [DuesCategoryController::class, 'index'])->name('admin.categories');
Route::get('/admin/warga', [WargaController::class, 'index'])->name('admin.warga');
Route::get('/admin/warga-create', [WargaController::class, 'index'])->name('admin.warga');
Route::get('/admin/payment', [PeymentController::class, 'index'])->name('admin.payment');
Route::get('/admin/officer', [PeymentController::class, 'index'])->name('admin.officer');

// Tampilkan daftar warga
Route::get('/admin/warga', [WargaController::class, 'index'])->name('admin.warga.index');
Route::get('/admin/warga/create', [WargaController::class, 'create'])->name('admin.warga.create');
Route::post('/admin/warga', [WargaController::class, 'store'])->name('admin.warga.store');

Route::post('/admin/warga/edit', [WargaController::class, 'edit'])->name('admin.warga.edit');
Route::post('/admin/warga/destroy', [WargaController::class, 'destroy'])->name('admin.warga.destroy');

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');


