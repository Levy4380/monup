<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'landing');

Route::post('/contacto', [ContactoController::class, 'store'])
    ->middleware('throttle:10,1')
    ->name('contact.store');

Route::middleware('guest')->group(function (): void {
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])
        ->middleware('throttle:5,1');
});

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

Route::middleware('auth')->group(function (): void {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/contactos/{contacto}', [DashboardController::class, 'show'])->name('dashboard.contactos.show');
});
