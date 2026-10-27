<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Di sini aku matiin route register sama reset password biar orang ga bisa daftar sendiri lewat URL
Auth::routes([
    'register' => false,
    'reset'    => false,
]);

// Kalau orang buka localhost:8000 langsung aku lempar ke /home
Route::redirect('/', '/home');

// Semua route di bawah ini wajib login dulu (pake middleware auth)
Route::middleware('auth')->group(function () {
    // Route buat halaman dashboard aku
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Nah, route buat data buku yang tadi sempet ilang/belum dinamai:
    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
});