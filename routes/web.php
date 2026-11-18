<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DesaController;
use App\Http\Controllers\UmkmController;

// 🏠 Halaman utama
Route::get('/', [DesaController::class, 'welcome'])->name('welcome');
Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

// 🔐 Route untuk admin
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // ✅ CRUD UMKM admin
    Route::post('/umkm', [AdminController::class, 'storeUmkm'])->name('umkm.store');
    Route::put('/umkm/{umkm}', [AdminController::class, 'updateUmkm'])->name('umkm.update');
    Route::delete('/umkm/{umkm}', [AdminController::class, 'destroyUmkm'])->name('umkm.destroy');

    // ✅ CRUD Profil Desa
    Route::put('/profil-desa', [AdminController::class, 'updateDesaProfile'])->name('profil-desa.update'); // Tambahkan ini

    // ✅ CRUD Pemerintahan admin
    Route::post('/pemerintahan', [AdminController::class, 'storePemerintahan'])->name('pemerintahan.store');
    Route::put('/pemerintahan/{pemerintahan}', [AdminController::class, 'updatePemerintahan'])->name('pemerintahan.update');
    Route::delete('/pemerintahan/{pemerintahan}', [AdminController::class, 'destroyPemerintahan'])->name('pemerintahan.destroy');

    // ✅ CRUD Produk UMKM admin
    Route::post('/produk', [AdminController::class, 'storeProduk'])->name('produk.store');
    Route::put('/produk/{produk}', [AdminController::class, 'updateProduk'])->name('produk.update');
    Route::delete('/produk/{produk}', [AdminController::class, 'destroyProduk'])->name('produk.destroy');

    // ✅ CRUD Galeri admin
    Route::post('/galeri', [AdminController::class, 'storeGaleri'])->name('galeri.store');
    Route::put('/galeri/{galeri}', [AdminController::class, 'updateGaleri'])->name('galeri.update');
    Route::delete('/galeri/{galeri}', [AdminController::class, 'destroyGaleri'])->name('galeri.destroy');

     // ✅ CRUD Manajemen Pengguna
    Route::post('/users', [AdminController::class, 'storeUser'])->name('users.store');
    Route::put('/users/{user}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('users.destroy');
});

// Profil Desa Lembang (Untuk tampilan user)
Route::get('/profildesa', [DesaController::class, 'index'])->name('profildesa');
Route::get('/strukturdesa', [DesaController::class, 'struktur'])->name('strukturdesa');
Route::get('/galeridesa', [DesaController::class, 'galeri'])->name('galeridesa');

// UMKM UMKM UMKM (Untuk tampilan user)
Route::get('/umkm', [UmkmController::class, 'daftarumkm'])->name('daftarumkm');

// 👤 Route untuk user login biasa
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';