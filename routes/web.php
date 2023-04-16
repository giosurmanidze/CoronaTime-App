<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::view('register', 'sessions.sign-up');
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::view('login', 'sessions.login')->name("login");
    Route::post('login', [LoginController::class, 'login']);
    Route::get('confirm-account/{user}', [RegisterController::class, 'confirmEmail'])->name('confirm-account');
    
});

Route::view('confirmation-status', 'email.confirmation-message');

Route::view("landing-worldwide", "components.landing-worldwide");
