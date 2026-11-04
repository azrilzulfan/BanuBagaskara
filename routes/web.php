<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\AspirationSubmissionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PerformanceReportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kenali', [ProfileController::class, 'index'])->name('profile');
Route::get('/kinerja', [PerformanceReportController::class, 'index'])->name('kinerja.index');
Route::get('/kinerja/{slug}', [PerformanceReportController::class, 'show'])->name('kinerja.show');
Route::get('/berita', [NewsController::class, 'index'])->name('berita.index');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('berita.show');
Route::get('/galeri', [GalleryController::class, 'index'])->name('galeri.index');
Route::get('/kontak', [ContactController::class, 'index'])->name('kontak.index');
Route::post('/kontak/aspirasi', [AspirationSubmissionController::class, 'store'])
    ->middleware(['throttle:3,10'])
    ->name('aspirasi.store');

/*
|--------------------------------------------------------------------------
| Authentication Routes (Single Admin)
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');
Route::any('/register', fn () => abort(404));
