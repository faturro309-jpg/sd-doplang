<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PpdbController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi.index');
Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])->name('ekstrakurikuler.index');
Route::get('/visi-misi', [HomeController::class, 'visiMisi'])->name('visi-misi');
Route::get('/sejarah', [HomeController::class, 'sejarah'])->name('sejarah.index');
Route::get('/alur', [HomeController::class, 'alur'])->name('alur.index');
Route::get('/berita', [HomeController::class, 'beritaIndex'])->name('berita.index');
Route::get('/berita/{slug}', [HomeController::class, 'beritaShow'])->name('berita.show');
Route::get('/galeri-foto', [HomeController::class, 'galeriFoto'])->name('galeri.foto');
Route::get('/galeri-video', [HomeController::class, 'galeriVideo'])->name('galeri.video');
Route::get('/guru', [HomeController::class, 'direktoriGuru'])->name('direktori.guru');

// PPDB Routes
Route::get('/pendaftaran-online', [PpdbController::class, 'create'])->name('ppdb.create');
Route::post('/pendaftaran-online', [PpdbController::class, 'store'])->name('ppdb.store');
Route::get('/pendaftaran-online/berhasil', [PpdbController::class, 'success'])->name('ppdb.success');

