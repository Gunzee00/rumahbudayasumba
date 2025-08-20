<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FooterController;

Route::get('/', function () {
    return view('dashboard'); // pastikan ejaan benar
});
 
// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
 


// Dashboard (protected)
Route::get('/admin-dashboard', [HomeController::class, 'dashboard'])->middleware('auth')->name('admin.dashboard');
Route::get('/admin/home-management', [HomeController::class, 'index'])->name('home.index');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');
    Route::resource('/admin/home-management', HomeController::class)->names([
        'index' => 'home.index',
        'store' => 'home.store',
        'update' => 'home.update',
        'destroy' => 'home.destroy',
    ])->except(['create', 'edit', 'show']);
});


Route::middleware('auth')->group(function () {
    Route::get('/admin/galeri', [GaleriController::class, 'index'])->name('galeri.index');
    Route::post('/admin/galeri/store', [GaleriController::class, 'store'])->name('galeri.store');
    Route::post('/admin/galeri/update/{id}', [GaleriController::class, 'update'])->name('galeri.update');
    Route::delete('/admin/galeri/destroy/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');
});

Route::middleware('auth')->group(function () {

    // Halaman news management
    Route::get('/admin/news-management', [NewsController::class, 'index'])->name('news.index');

    // CRUD routes
    Route::post('/admin/news-management', [NewsController::class, 'store'])->name('news.store');
    Route::post('/admin/news-management/update/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/admin/news-management/delete/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

});

Route::middleware('auth')->group(function () {

    // Halaman footer management
    Route::get('/admin/footer-management', [FooterController::class, 'index'])->name('footer.index');

    // CRUD routes
    Route::post('/admin/footer-management', [FooterController::class, 'store'])->name('footer.store');
    Route::post('/admin/footer-management/update/{id}', [FooterController::class, 'update'])->name('footer.update');
    Route::delete('/admin/footer-management/delete/{id}', [FooterController::class, 'destroy'])->name('footer.destroy');

});