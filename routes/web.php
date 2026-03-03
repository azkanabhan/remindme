<?php

use App\Http\Controllers\FcmTestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Endpoint sederhana untuk menguji FCM
Route::post('/fcm/test', [FcmTestController::class, 'send'])
    ->middleware('auth')
    ->name('fcm.test');

// Protected routes (requires authentication)
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
