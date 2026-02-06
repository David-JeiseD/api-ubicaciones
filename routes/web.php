<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::middleware(['auth', 'verified'])->group(function () {
    // Ver el panel
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Acción de generar token
    Route::post('/dashboard/token', [DashboardController::class, 'generateToken'])->name('token.generate');
    Route::delete('/dashboard/token/{id}', [DashboardController::class, 'deleteToken'])->name('token.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
