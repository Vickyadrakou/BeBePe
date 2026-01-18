<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactsController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/resources', [App\Http\Controllers\ResourceController::class, 'index'])->name('resources.index');
Route::post('/contacts', [ContactsController::class, 'store'])->name('contacts.store');
Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');
Route::get('/cgu', function () {
    return view('cgu');
})->name('cgu');

// Auth Routes
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Report Routes (Authenticated)
Route::middleware('auth')->group(function () {
Route::get('/report', [App\Http\Controllers\ReportController::class, 'index'])->name('report');
    Route::post('/report', [App\Http\Controllers\ReportController::class, 'store'])->name('report.store');
});

// Admin Routes (Authenticated)
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/reports', [App\Http\Controllers\AdminController::class, 'reports'])->name('admin.reports.index');
    Route::get('/reports/{id}', [App\Http\Controllers\AdminController::class, 'show'])->name('admin.reports.show');
    Route::post('/reports/{id}/status', [App\Http\Controllers\AdminController::class, 'updateStatus'])->name('admin.reports.updateStatus');
    Route::get('/users', [App\Http\Controllers\AdminController::class, 'users'])->name('admin.users.index');
    Route::get('/users/{id}/edit', [App\Http\Controllers\AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/users/{id}', [App\Http\Controllers\AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/users/{id}', [App\Http\Controllers\AdminController::class, 'destroyUser'])->name('admin.users.destroy');

    Route::get('/resources', [App\Http\Controllers\AdminController::class, 'resources'])->name('admin.resources.index');
    Route::get('/resources/create', [App\Http\Controllers\AdminController::class, 'createResource'])->name('admin.resources.create');
    Route::post('/resources', [App\Http\Controllers\AdminController::class, 'storeResource'])->name('admin.resources.store');
    Route::get('/resources/{id}/edit', [App\Http\Controllers\AdminController::class, 'editResource'])->name('admin.resources.edit');
    Route::put('/resources/{id}', [App\Http\Controllers\AdminController::class, 'updateResource'])->name('admin.resources.update');
    Route::delete('/resources/{id}', [App\Http\Controllers\AdminController::class, 'destroyResource'])->name('admin.resources.destroy');
});
