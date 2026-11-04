<?php

use App\Http\Controllers\Admin\AspirationController as AdminAspirationController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\PerformanceReportController as AdminPerformanceReportController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\AspirationSubmissionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PerformanceReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes (6 Halaman Utama)
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

// Submission Aspirasi Warga dengan Rate Limiting (3 per 10 menit)
Route::post('/kontak/aspirasi', [AspirationSubmissionController::class, 'store'])
    ->middleware(['throttle:3,10'])
    ->name('aspirasi.store');

// SEO XML Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

/*
|--------------------------------------------------------------------------
| Authentication Routes (Single Admin)
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::any('/register', fn () => abort(404));

/*
|--------------------------------------------------------------------------
| Admin Protected Routes (7 Modul Dasbor)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // 1. Dashboard Ringkasan & KPI
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // 2. Modul Hasil Kinerja (Modular Block Canvas)
    Route::get('/kinerja', [AdminPerformanceReportController::class, 'index'])->name('kinerja.index');
    Route::post('/kinerja', [AdminPerformanceReportController::class, 'store'])->name('kinerja.store');
    Route::put('/kinerja/{report}', [AdminPerformanceReportController::class, 'update'])->name('kinerja.update');
    Route::delete('/kinerja/{report}', [AdminPerformanceReportController::class, 'destroy'])->name('kinerja.destroy');
    Route::patch('/kinerja/{report}/toggle-featured', [AdminPerformanceReportController::class, 'toggleFeatured'])->name('kinerja.toggle-featured');
    Route::patch('/kinerja/{report}/toggle-status', [AdminPerformanceReportController::class, 'toggleStatus'])->name('kinerja.toggle-status');

    // 3. Modul Kelola Berita
    Route::get('/berita', [AdminNewsController::class, 'index'])->name('berita.index');
    Route::post('/berita', [AdminNewsController::class, 'store'])->name('berita.store');
    Route::put('/berita/{news}', [AdminNewsController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{news}', [AdminNewsController::class, 'destroy'])->name('berita.destroy');
    Route::patch('/berita/{news}/toggle-featured', [AdminNewsController::class, 'toggleFeatured'])->name('berita.toggle-featured');
    Route::patch('/berita/{news}/toggle-status', [AdminNewsController::class, 'toggleStatus'])->name('berita.toggle-status');

    // 4. Modul Kelola Galeri Album & Foto
    Route::get('/galeri', [AdminGalleryController::class, 'index'])->name('galeri.index');
    Route::post('/galeri', [AdminGalleryController::class, 'store'])->name('galeri.store');
    Route::put('/galeri/{album}', [AdminGalleryController::class, 'update'])->name('galeri.update');
    Route::delete('/galeri/{album}', [AdminGalleryController::class, 'destroy'])->name('galeri.destroy');
    Route::patch('/galeri/{album}/toggle-status', [AdminGalleryController::class, 'toggleStatus'])->name('galeri.toggle-status');

    // 5. Modul Kotak Aspirasi Warga & Disposisi
    Route::get('/aspirasi', [AdminAspirationController::class, 'index'])->name('aspirasi.index');
    Route::get('/aspirasi/export', [AdminAspirationController::class, 'exportCsv'])->name('aspirasi.export');
    Route::patch('/aspirasi/{aspiration}/status', [AdminAspirationController::class, 'updateStatus'])->name('aspirasi.update-status');
    Route::post('/aspirasi/{aspiration}/notes', [AdminAspirationController::class, 'storeNote'])->name('aspirasi.store-note');
    Route::delete('/aspirasi/{aspiration}', [AdminAspirationController::class, 'destroy'])->name('aspirasi.destroy');
    Route::post('/aspirasi/bulk-delete', [AdminAspirationController::class, 'bulkDelete'])->name('aspirasi.bulk-delete');

    // 6. Modul Pengaturan Halaman Website
    Route::get('/pengaturan', [AdminSettingController::class, 'index'])->name('pengaturan.index');
    Route::post('/pengaturan', [AdminSettingController::class, 'update'])->name('pengaturan.update');
});
