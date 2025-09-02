<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\WargaController;
use App\Http\Controllers\Warga\BerandaController;
use App\Http\Controllers\Warga\AuthController;
use App\Http\Controllers\Admin\DuesCategoryController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\OfficerController;

use App\Http\Controllers\warga\DashboardController as WargaDashboardController;
// use App\Http\Controllers\DuesMemberController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dues', [DuesMemberController::class, 'index'])->name('dues.index');
    Route::get('/dues/create', [DuesMemberController::class, 'create'])->name('dues.create');
    Route::post('/dues', [DuesMemberController::class, 'store'])->name('dues.store');
});

// Officer Dashboard
Route::get('/officer/dashboard', function () {
    return view('officer.dashboard'); // bikin blade sesuai kebutuhan
})->name('officer.dashboard');

// untuk warga
Route::get('/warga/dashboard', [App\Http\Controllers\Warga\DashboardController::class, 'index'])
    ->name('warga.dashboard')
    ->middleware('auth');

// untuk admin
Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
    ->name('admin.dashboard')
    ->middleware('auth');


// Halaman beranda (hanya bisa diakses setelah login)

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/admin/categories', [DuesCategoryController::class, 'index'])->name('admin.categories');
Route::get('/admin/warga', [WargaController::class, 'index'])->name('admin.warga');
Route::get('/admin/warga-create', [WargaController::class, 'index'])->name('admin.warga');
Route::get('/admin/payment', [PaymentController::class, 'index'])->name('admin.payment');

    Route::get('/admin/officer', [OfficerController::class, 'index'])->name('admin.officer');
    Route::get('/admin/officer/create', [OfficerController::class, 'create'])->name('admin.officer.create');
    Route::post('/admin/officer', [OfficerController::class, 'store'])->name('admin.officer.store');
    Route::get('/admin/officer/{id}/edit', [OfficerController::class, 'edit'])->name('admin.officer.edit');
    Route::put('/admin/officer/{id}', [OfficerController::class, 'update'])->name('admin.officer.update');
    Route::delete('/admin/officer/{id}', [OfficerController::class, 'destroy'])->name('admin.officer.destroy');


//     Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/warga', [WargaController::class, 'index'])->name('admin.warga.index');
//     Route::get('/admin/warga/create', [WargaController::class, 'create'])->name('admin.warga.create');
//     Route::post('/admin/warga', [WargaController::class, 'store'])->name('admin.warga.store');
//     Route::get('/admin/warga/{id}/edit', [WargaController::class, 'edit'])->name('admin.warga.edit');
//     Route::put('/admin/warga/{id}', [WargaController::class, 'update'])->name('admin.warga.update');
//     Route::delete('/admin/warga/{id}', [WargaController::class, 'destroy'])->name('admin.warga.destroy');
// });

Route::get('/admin/warga', [WargaController::class, 'index'])->name('admin.warga.index');
Route::get('/admin/warga/create', [WargaController::class, 'create'])->name('admin.warga.create');
Route::post('/admin/warga', [WargaController::class, 'store'])->name('admin.warga.store');
Route::get('/admin/warga/{id}/edit', [WargaController::class, 'edit'])->name('admin.warga.edit');
Route::put('/admin/warga/{id}', [WargaController::class, 'update'])->name('admin.warga.update');
Route::delete('/admin/warga/{id}', [WargaController::class, 'destroy'])->name('admin.warga.destroy');

Route::post('/admin/payment', [PaymentController::class, 'store'])->name('admin.payment.store');

Route::get('/verified', [PaymentController::class, 'verified'])->name('admin.payment.verified');
Route::post('admin/payment/{id}/verify', [PaymentController::class, 'verify'])->name('admin.payment.verify');
Route::get('/admin/payment', [PaymentController::class, 'index'])->name('admin.payment');
Route::get('/admin/payment/create', [PaymentController::class, 'create'])->name('admin.payment.create');
Route::get('/admin/payment/{id}/edit', [PaymentController::class, 'edit'])->name('admin.payment.edit');
Route::put('/admin/payment/{id}', [PaymentController::class, 'update'])->name('admin.payment.update');
Route::delete('/admin/payment/{id}', [PaymentController::class, 'destroy'])->name('admin.payment.destroy');
// Route::post('/admin/payment/store', [PaymentController::class, 'store'])->name('admin.payment.store');
Route::get('/admin/payment/{id}/show', [PaymentController::class, 'show'])->name('admin.payment.show');
Route::post('/admin/payment/{id}/complete', [PaymentController::class, 'complete'])->name('admin.payment.complete');
Route::get('/admin/payment/search-user', [PaymentController::class, 'searchUser'])->name('admin.payment.searchUser');

// Verifikasi pembayaran
// Route::patch('/admin/payment/{id}/verify', [PaymentController::class, 'verify'])->name('admin.payment.verify');




// Route kategori iuran
Route::get('/admin/categories', [DuesCategoryController::class, 'index'])->name('admin.categories');
Route::get('/admin/categories/create', [DuesCategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories', [DuesCategoryController::class, 'store'])->name('admin.categories.store');
Route::get('/admin/categories/{id}/edit', [DuesCategoryController::class, 'edit'])->name('admin.categories.edit');
Route::put('/admin/categories/{id}', [DuesCategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{id}', [DuesCategoryController::class, 'destroy'])->name('admin.categories.destroy');


Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');


