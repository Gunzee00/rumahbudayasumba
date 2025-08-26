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
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FacilityController;


Route::get('/facilities-user', action: [FacilityController::class, 'showUser'])->name('user.facilities');

Route::get('/', [HomeController::class, 'showUser'])->name('user.home');
Route::get('/about-home', [SubHomeController::class, 'showUser'])->name('user.subhome');
Route::get('/about-us', [AboutUsController::class, 'showUser'])->name('user.about-us');

Route::view('/contact-us', 'user.contact-us')->name('contact');
Route::post('/contact-us', [ContactUsController::class, 'store'])->name('contact.store');

Route::get('/rooms', [RoomController::class, 'showUser']);
Route::get('/room/{id}', [RoomController::class, 'roomDetail'])->name('room.detail');
 
//facility

 


Route::get('/booking/{room}', [BookingController::class, 'create'])
    ->name('booking.create')
    ->middleware('auth');

Route::post('/booking/{room}', [BookingController::class, 'store'])
    ->name('booking.store')
    ->middleware('auth');

    Route::get('/my-bookings', [BookingController::class, 'myBookings'])
    ->name('booking.myBookings')
    ->middleware('auth');
 
// Auth routes
 
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
 
// Auth
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
 Route::post('/logout', [AuthController::class, 'logoutUser'])->name('logout');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [AuthController::class, 'profileUser'])->name('user.profile');
});



Route::middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/admin-dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');

    // Home management
    Route::resource('/admin/home-management', HomeController::class)->names([
        'index' => 'home.index',
        'store' => 'home.store',
        'update' => 'home.update',
        'destroy' => 'home.destroy',
    ])->except(['create', 'edit', 'show']);

    // Galeri
    Route::get('/admin/galeri', [GaleriController::class, 'index'])->name('galeri.index');
    Route::post('/admin/galeri/store', [GaleriController::class, 'store'])->name('galeri.store');
    Route::post('/admin/galeri/update/{id}', [GaleriController::class, 'update'])->name('galeri.update');
    Route::delete('/admin/galeri/destroy/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');

    // News
    Route::get('/admin/news-management', [NewsController::class, 'index'])->name('news.index');
    Route::post('/admin/news-management', [NewsController::class, 'store'])->name('news.store');
    Route::put('/admin/news-management/update/{id}', [NewsController::class, 'update'])->name('news.update');
    Route::delete('/admin/news-management/delete/{id}', [NewsController::class, 'destroy'])->name('news.destroy');

    // Footer
    Route::get('/admin/footer-management', [FooterController::class, 'index'])->name('footer.index');
    Route::post('/admin/footer-management', [FooterController::class, 'store'])->name('footer.store');
    Route::post('/admin/footer-management/update/{id}', [FooterController::class, 'update'])->name('footer.update');
    Route::delete('/admin/footer-management/delete/{id}', [FooterController::class, 'destroy'])->name('footer.destroy');

    // About Us
    Route::get('/admin/about-us', [AboutUsController::class, 'index'])->name('about.index');
    Route::post('/admin/about-us', [AboutUsController::class, 'store'])->name('about.store');
    Route::put('/admin/about-us/update/{id}', [AboutUsController::class, 'update'])->name('about.update');
    Route::delete('/admin/about-us/delete/{id}', [AboutUsController::class, 'destroy'])->name('about.destroy');

    // Contact Us
    Route::get('/admin/contact-us', [ContactUsController::class, 'index'])->name('contact.index');
    Route::delete('/admin/contact-us/delete/{id}', [ContactUsController::class, 'destroy'])->name('contact.destroy');

    // Sub Home
    Route::get('/admin/sub-home-management', [SubHomeController::class, 'index'])->name('subhome.index');
    Route::post('/admin/sub-home-management', [SubHomeController::class, 'store'])->name('subhome.store');
    Route::put('/admin/sub-home-management/update/{id}', [SubHomeController::class, 'update'])->name('subhome.update');
    Route::delete('/admin/sub-home-management/delete/{id}', [SubHomeController::class, 'destroy'])->name('subhome.destroy');
    Route::get('/admin/sub-home-management/{id}', [SubHomeController::class, 'show'])->name('subhome.show');

    // Room
    Route::get('/admin/room-management', [RoomController::class, 'index'])->name('rooms.index');
    Route::post('/admin/room-management', [RoomController::class, 'store'])->name('rooms.store');
    Route::put('/admin/room-management/{room}', [RoomController::class, 'update'])->name('rooms.update');
    Route::delete('/admin/room-management/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');

    // Admin Booking Management
  // Admin Booking Management
Route::get('/booking', [BookingController::class, 'index'])->name('admin.management-booking');
Route::post('/booking/{id}/approve', [BookingController::class, 'approve'])->name('admin.management-booking.approve');
Route::post('/booking/{id}/reject', [BookingController::class, 'reject'])->name('admin.management-booking.reject');
Route::post('/booking/{id}/revert', [BookingController::class, 'revertApproval'])->name('admin.management-booking.revert');

// Facility Management (Admin)
  Route::get('/facilities', [FacilityController::class, 'index'])->name('admin.facilities');

    // tambah facility
    Route::post('/facilities', [FacilityController::class, 'store'])->name('admin.facilities.store');

    // update facility
    Route::put('/facilities/{id}', [FacilityController::class, 'update'])->name('admin.facilities.update');

    // hapus facility
    Route::delete('/facilities/{id}', [FacilityController::class, 'destroy'])->name('admin.facilities.destroy');

});
