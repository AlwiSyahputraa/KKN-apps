<?php
// ======================================================================
// FILE: routes/web.php
// LOKASI: Ganti seluruh isi file Anda dengan kode ini.
// PENTING: Setelah menyimpan file ini, jalankan `php artisan route:clear` di terminal.
// ======================================================================

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController; // <-- Pastikan ini ada
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\ProkerController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\KeuanganController;
use App\Http\Controllers\Admin\DokumenController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PaymentRequestController;
use App\Http\Controllers\Admin\HumasController;
use App\Http\Controllers\Admin\InventariController;

// Rute Halaman Publik
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/profil', [PageController::class, 'profil'])->name('profil');
Route::get('/berita/{berita}', [PageController::class, 'showBerita'])->name('berita.show');
Route::get('/proker/{proker}', [PageController::class, 'showProker'])->name('proker.show');
Route::get('/galeri/{galeri}', [PageController::class, 'showGaleri'])->name('galeri.show');

// Rute Konfirmasi Pembayaran (yang menyebabkan error)
Route::get('/bayar/{kode_unik}', [PaymentController::class, 'show'])->middleware('auth')->name('pembayaran.show');
Route::post('/bayar/{kode_unik}', [PaymentController::class, 'store'])->middleware('auth')->name('pembayaran.store');

// Rute Otentikasi (Login, Register, dll.)
Auth::routes(['register' => false]);

// Rute untuk halaman dashboard utama setelah login
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

// Rute untuk Pengaturan Akun Pengguna
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Grup Rute untuk fitur Admin lainnya
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('berita', BeritaController::class);
    Route::resource('proker', ProkerController::class);
    Route::resource('galeri', GaleriController::class);
    Route::resource('anggota', AnggotaController::class);
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
    Route::resource('keuangan', KeuanganController::class);

    Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
    Route::get('/dokumen/create', [DokumenController::class, 'create'])->name('dokumen.create');
    Route::post('/dokumen', [DokumenController::class, 'store'])->name('dokumen.store');
    Route::get('/dokumen/{dokumen}/edit', [DokumenController::class, 'edit'])->name('dokumen.edit');
    Route::put('/dokumen/{dokumen}', [DokumenController::class, 'update'])->name('dokumen.update');
    Route::delete('/dokumen/{dokumen}', [DokumenController::class, 'destroy'])->name('dokumen.destroy');

    Route::resource('users', UserController::class);
    Route::resource('permintaan', PaymentRequestController::class);
    Route::post('/permintaan/verifikasi/{confirmation}', [PaymentRequestController::class, 'verify'])->name('permintaan.verify');
    Route::post('/users/{user}/approve', [UserController::class, 'approve'])->name('users.approve');
    Route::get('/humas', [HumasController::class, 'index'])->name('humas.index');
    Route::post('/humas', [HumasController::class, 'update'])->name('humas.update');
    Route::resource('inventaris', InventariController::class);
});