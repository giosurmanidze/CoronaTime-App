<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::view('register', 'sessions.sign-up');
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::view('login', 'sessions.login')->name("login");
    Route::get('confirm-account/{user}', [RegisterController::class, 'confirmEmail'])->name('confirm-account');
});

Route::view('confirmation-status', 'email.confirmation-message');
