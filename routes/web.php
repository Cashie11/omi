<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeachingController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BookingAdminController;
use App\Http\Controllers\Admin\ConsultantAdminController;
use App\Http\Controllers\Admin\FaqAdminController;
use App\Http\Controllers\Admin\GalleryAdminController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ServiceAdminController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeachingAdminController;
use Illuminate\Support\Facades\Route;

// Public pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/consultants', [ConsultantController::class, 'index'])->name('consultants');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store')
    ->middleware('throttle:10,1');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/{service}', [ServiceController::class, 'show'])->name('services.show');

// Teachings
Route::get('/teachings', [TeachingController::class, 'index'])->name('teachings');

// FAQ
Route::get('/faq', [FaqController::class, 'index'])->name('faq');

// Booking
Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::post('/booking', [BookingController::class, 'store'])
    ->name('booking.store')
    ->middleware('throttle:10,1');

// Admin login
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login'])
    ->name('login.attempt')
    ->middleware('throttle:5,1');

// Admin area (single authenticated user)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn () => redirect()->route('admin.messages.index'))->name('home');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Messages
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

    // Bookings
    Route::get('/bookings', [BookingAdminController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/{booking}', [BookingAdminController::class, 'show'])->name('bookings.show');
    Route::delete('/bookings/{booking}', [BookingAdminController::class, 'destroy'])->name('bookings.destroy');

    // Consultants
    Route::get('/consultants', [ConsultantAdminController::class, 'index'])->name('consultants.index');
    Route::get('/consultants/create', [ConsultantAdminController::class, 'create'])->name('consultants.create');
    Route::post('/consultants', [ConsultantAdminController::class, 'store'])->name('consultants.store');
    Route::get('/consultants/{consultant}/edit', [ConsultantAdminController::class, 'edit'])->name('consultants.edit');
    Route::put('/consultants/{consultant}', [ConsultantAdminController::class, 'update'])->name('consultants.update');
    Route::delete('/consultants/{consultant}', [ConsultantAdminController::class, 'destroy'])->name('consultants.destroy');
    Route::delete('/consultants/{consultant}/photo', [ConsultantAdminController::class, 'removePhoto'])->name('consultants.photo.destroy');

    // Services
    Route::get('/services', [ServiceAdminController::class, 'index'])->name('services.index');
    Route::get('/services/create', [ServiceAdminController::class, 'create'])->name('services.create');
    Route::post('/services', [ServiceAdminController::class, 'store'])->name('services.store');
    Route::get('/services/{service}/edit', [ServiceAdminController::class, 'edit'])->name('services.edit');
    Route::put('/services/{service}', [ServiceAdminController::class, 'update'])->name('services.update');
    Route::delete('/services/{service}', [ServiceAdminController::class, 'destroy'])->name('services.destroy');

    // Teachings
    Route::get('/teachings', [TeachingAdminController::class, 'index'])->name('teachings.index');
    Route::get('/teachings/create', [TeachingAdminController::class, 'create'])->name('teachings.create');
    Route::post('/teachings', [TeachingAdminController::class, 'store'])->name('teachings.store');
    Route::get('/teachings/{topic}/edit', [TeachingAdminController::class, 'edit'])->name('teachings.edit');
    Route::put('/teachings/{topic}', [TeachingAdminController::class, 'update'])->name('teachings.update');
    Route::delete('/teachings/{topic}', [TeachingAdminController::class, 'destroy'])->name('teachings.destroy');

    // FAQs
    Route::get('/faqs', [FaqAdminController::class, 'index'])->name('faqs.index');
    Route::get('/faqs/create', [FaqAdminController::class, 'create'])->name('faqs.create');
    Route::post('/faqs', [FaqAdminController::class, 'store'])->name('faqs.store');
    Route::get('/faqs/{faq}/edit', [FaqAdminController::class, 'edit'])->name('faqs.edit');
    Route::put('/faqs/{faq}', [FaqAdminController::class, 'update'])->name('faqs.update');
    Route::delete('/faqs/{faq}', [FaqAdminController::class, 'destroy'])->name('faqs.destroy');

    // Gallery
    Route::get('/gallery', [GalleryAdminController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/create', [GalleryAdminController::class, 'create'])->name('gallery.create');
    Route::post('/gallery', [GalleryAdminController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/{image}/edit', [GalleryAdminController::class, 'edit'])->name('gallery.edit');
    Route::put('/gallery/{image}', [GalleryAdminController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{image}', [GalleryAdminController::class, 'destroy'])->name('gallery.destroy');

    // Settings
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
});
