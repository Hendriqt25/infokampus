<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use Illuminate\Support\Facades\Route;

Route::get('berita', [BeritaController::class, 'index']);
Route::get('galeri', [GaleriController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('admin/berita', [BeritaController::class, 'index']);
    Route::post('admin/berita', [BeritaController::class, 'tambah']);
    Route::put('admin/berita/{id}', [BeritaController::class, 'ubah']);
    Route::delete('admin/berita/{id}', [BeritaController::class, 'hapus']);

    Route::get('admin/galeri', [GaleriController::class, 'index']);
    Route::post('admin/galeri', [GaleriController::class, 'tambah']);
    Route::put('admin/galeri/{id}', [GaleriController::class, 'ubah']);
    Route::delete('admin/galeri/{id}', [GaleriController::class, 'hapus']);
});
