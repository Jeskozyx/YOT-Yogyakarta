<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('users.landingpage');
});

Route::get('/about', function () {
    return view('users.about_us');
});

Route::get('/division/{division}', function ($division) {
    return view('users.detail', ['division' => $division]);
})->name('division.detail');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/account_manage', [UserController::class, 'index'])->name('account_manage');
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