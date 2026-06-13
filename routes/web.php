<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Models\Berita;
use App\Models\Galeri;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    try {
        $heroBerita = Berita::latest()->take(3)->get();
    } catch (QueryException) {
        $heroBerita = collect();
    }

    return view('home', ['heroBerita' => $heroBerita]);
});

Route::get('/login', [AdminController::class, 'login'])->name('login');
Route::post('/login', [AdminController::class, 'authenticate']);

Route::post('/logout', [AdminController::class, 'logout']);

Route::get('/berita', function () {
    try {
        $heroBerita = Berita::latest()->take(3)->get();
        $semuaBerita = Berita::latest()->paginate(9);
    } catch (QueryException) {
        $heroBerita = collect();
        $semuaBerita = collect();
    }

    return view('berita', [
        'heroBerita' => $heroBerita,
        'semuaBerita' => $semuaBerita,
    ]);
});

Route::get('/galeri', function () {
    try {
        $heroBerita = Berita::latest()->take(3)->get();
        $galeri = Galeri::latest()->paginate(9);
    } catch (QueryException) {
        $heroBerita = collect();
        $galeri = collect();
    }

    return view('galeri', [
        'heroBerita' => $heroBerita,
        'galeri' => $galeri,
    ]);
});

Route::get('/about', function () {
    try {
        $heroBerita = Berita::latest()->take(3)->get();
    } catch (QueryException) {
        $heroBerita = collect();
    }

    return view('about', ['heroBerita' => $heroBerita]);
});

Route::get('/call', function () {
    try {
        $heroBerita = Berita::latest()->take(3)->get();
    } catch (QueryException) {
        $heroBerita = collect();
    }

    return view('call', ['heroBerita' => $heroBerita]);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    Route::get('/admin/beritaadmin', [BeritaController::class, 'index']);
    Route::post('/admin/beritaadmin', [BeritaController::class, 'tambah']);
    Route::put('/admin/beritaadmin/{id}', [BeritaController::class, 'ubah']);
    Route::delete('/admin/beritaadmin/{id}', [BeritaController::class, 'hapus']);

    Route::get('/admin/galeriadmin', [GaleriController::class, 'index']);
    Route::post('/admin/galeriadmin', [GaleriController::class, 'tambah']);
    Route::put('/admin/galeriadmin/{id}', [GaleriController::class, 'ubah']);
    Route::delete('/admin/galeriadmin/{id}', [GaleriController::class, 'hapus']);

    Route::get('/admin/profil', [AdminController::class, 'profil']);
    Route::put('/admin/profil', [AdminController::class, 'updateProfil']);
});
