<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::view('register', 'sessions.sign-up')->name('sign-up');
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::view('login', 'sessions.login')->name("login");
    Route::post('login', [LoginController::class, 'login'])->name("store-login");
    Route::get('confirm-account/{user}', [RegisterController::class, 'confirmEmail'])->name('confirm-account');
});

Route::get('confirm-account/{user}', [RegisterController::class, 'confirmEmail'])->name('confirm-account');
Route::view('confirmation-status', 'email.confirmation-message');
