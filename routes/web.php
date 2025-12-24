<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TaskNoteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::post('/contact-send', [ContactController::class, 'send'])->name('contact.send');

// --- PUBLIC ROUTES ---

Route::get('/', function () {
    return view('users.landingpage');
})->name('landingpage');

Route::get('/aboutus', function () {
    return view('users.aboutus');
})->name('aboutus');

// --- ROUTE CONTACT US (BARU) ---
Route::get('/contact', function () {
    return view('users.contact');
})->name('contact');

// --- ROUTE HALAMAN EVENT UTAMA ---
Route::get('/event', function () {
    // Pastikan file view ada di resources/views/users/event.blade.php
    return view('users.event'); 
})->name('event');

// --- ROUTE HALAMAN DETAIL EVENT ---
// Menangani URL seperti /event/1, /event/2, dst.
Route::get('/event/{id}', function ($id) {
    // Kita kirim $id ke view agar bisa diproses (nantinya untuk query database)
    return view('users.event_detail', ['id' => $id]);
})->name('event.detail');


Route::get('/division', [EventController::class, 'divisionPage'])->name('division');

Route::get('/division/{division}', function ($division) {
    return view('users.detail', ['division' => $division]);
})->name('division.detail');


// --- AUTH & ADMIN ROUTES ---

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/account_manage', [UserController::class, 'index'])->name('account_manage');
    Route::put('/users/{id}/suspend', [UserController::class, 'suspend'])->name('users.suspend');
    Route::patch('/users/{id}/unban', [UserController::class, 'unban'])->name('users.unban');
    Route::get('/documentations', [EventController::class, 'documentation'])->name('documentations');
});

// HANYA BUAT INPUT KEGIATAN SAJA (BACKEND/ADMIN)
Route::middleware(['auth'])->group(function () {
    Route::get('/kegiatan', [EventController::class, 'create'])->name('kegiatan'); // Langsung ke form create
    Route::post('/kegiatan', [EventController::class, 'store'])->name('kegiatan.store');
    Route::get('/kegiatan/{id}/edit', [EventController::class, 'edit'])->name('kegiatan.edit');
    Route::put('/kegiatan/{id}', [EventController::class, 'update'])->name('kegiatan.update');
    Route::delete('/kegiatan/{id}', [EventController::class, 'destroy'])->name('kegiatan.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/tasknotes', [TaskNoteController::class, 'index'])->name('tasknotes');
    Route::post('/tasknotes', [TaskNoteController::class, 'store'])->name('tasknotes.store');
    Route::put('/tasknotes/{id}', [TaskNoteController::class, 'update'])->name('tasknotes.update');
    Route::delete('/tasknotes/{id}', [TaskNoteController::class, 'destroy'])->name('tasknotes.destroy');
    // Using PATCH for status toggle, but update() can handle it if we pass status. 
    // Let's stick to update() for simplicity or add a specific route if needed.
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';