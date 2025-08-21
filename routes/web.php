<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ContactUsController;
 use App\Http\Controllers\SubHomeController;


Route::get('/', [HomeController::class, 'showUser'])->name('user.home');
Route::get('/about-home', [SubHomeController::class, 'showUser'])->name('user.subhome');
Route::get('/about-us', [AboutUsController::class, 'showUser'])->name('user.about-us');

Route::view('/contact-us', 'user.contact-us')->name('contact');
Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact.store');
 

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
    Route::put('/admin/news-management/update/{id}', [NewsController::class, 'update'])->name('news.update');
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

Route::middleware('auth')->group(function () {
    // Halaman About Us Management
    Route::get('/admin/about-us', [AboutUsController::class, 'index'])->name('about.index');

    // CRUD routes
    Route::post('/admin/about-us', [AboutUsController::class, 'store'])->name('about.store');
    Route::put('/admin/about-us/update/{id}', [AboutUsController::class, 'update'])->name('about.update');
    Route::delete('/admin/about-us/delete/{id}', [AboutUsController::class, 'destroy'])->name('about.destroy');
});



Route::middleware('auth')->group(function () {
    // Halaman Contact Us Management (admin lihat pesan user)
    Route::get('/admin/contact-us', [ContactUsController::class, 'index'])->name('contact.index');

    // Hapus pesan tertentu
    Route::delete('/admin/contact-us/delete/{id}', [ContactUsController::class, 'destroy'])->name('contact.destroy');
});
Route::middleware('auth')->group(function () {
    // Halaman Sub Home Management
    Route::get('/admin/sub-home-management', [SubHomeController::class, 'index'])->name('subhome.index');

    // CRUD routes
    Route::post('/admin/sub-home-management', [SubHomeController::class, 'store'])->name('subhome.store');
    Route::put('/admin/sub-home-management/update/{id}', [SubHomeController::class, 'update'])->name('subhome.update');
    Route::delete('/admin/sub-home-management/delete/{id}', [SubHomeController::class, 'destroy'])->name('subhome.destroy');

    // 👇 Tambahkan jika butuh show
    Route::get('/admin/sub-home-management/{id}', [SubHomeController::class, 'show'])->name('subhome.show');
});
