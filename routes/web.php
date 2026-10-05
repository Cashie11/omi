<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ConsultantAdminController;
use App\Http\Controllers\Admin\GalleryAdminController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Route;

// Public pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/consultants', [ConsultantController::class, 'index'])->name('consultants');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])
    ->name('contact.store')
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

    // Consultants
    Route::get('/consultants', [ConsultantAdminController::class, 'index'])->name('consultants.index');
    Route::get('/consultants/create', [ConsultantAdminController::class, 'create'])->name('consultants.create');
    Route::post('/consultants', [ConsultantAdminController::class, 'store'])->name('consultants.store');
    Route::get('/consultants/{consultant}/edit', [ConsultantAdminController::class, 'edit'])->name('consultants.edit');
    Route::put('/consultants/{consultant}', [ConsultantAdminController::class, 'update'])->name('consultants.update');
    Route::delete('/consultants/{consultant}', [ConsultantAdminController::class, 'destroy'])->name('consultants.destroy');
    Route::delete('/consultants/{consultant}/photo', [ConsultantAdminController::class, 'removePhoto'])->name('consultants.photo.destroy');

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
