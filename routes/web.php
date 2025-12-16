<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;


Route::post('/contact-send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/', function () {
    return view('users.landingpage');
})->name('landingpage');

Route::get('/aboutus', function () {
    return view('users.aboutus');
})->name('aboutus');

Route::get('/division', [EventController::class, 'divisionPage'])->name('division');

Route::get('/division/{division}', function ($division) {
    return view('users.detail', ['division' => $division]);
})->name('division.detail');





Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/account_manage', [UserController::class, 'index'])->name('account_manage');
    Route::put('/users/{id}/suspend', [UserController::class, 'suspend'])->name('users.suspend');
    Route::patch('/users/{id}/unban', [UserController::class, 'unban'])->name('users.unban');
});

// HANYA BUAT INPUT KEGIATAN SAJA
Route::middleware(['auth'])->group(function () {
    Route::get('/kegiatan', [EventController::class, 'create'])->name('kegiatan'); // Langsung ke form create
    Route::post('/kegiatan', [EventController::class, 'store'])->name('kegiatan.store');
    Route::get('/kegiatan/{id}/edit', [EventController::class, 'edit'])->name('kegiatan.edit');
    Route::put('/kegiatan/{id}', [EventController::class, 'update'])->name('kegiatan.update');
    Route::delete('/kegiatan/{id}', [EventController::class, 'destroy'])->name('kegiatan.destroy');
});

Route::get('/documentations', [EventController::class, 'documentation'])->name('documentations');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';