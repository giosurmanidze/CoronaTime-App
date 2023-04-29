<?php

use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CountryStatisticsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function () {
    Route::view('register', 'sessions.sign-up')->name('sign-up');
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::view('login', 'sessions.login')->name("login");
    Route::post('login', [LoginController::class, 'login'])->name("store-login");
    Route::view("forgot-password", 'components.reset-password')->name("forgot-password");
    Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::view("reset-link-status", "email.reset-link-status")->name("reset-status");
    Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
    Route::view('confirmation-status', 'email.confirmation-message');
    Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::get('confirm-account/{user}', [RegisterController::class, 'confirmEmail'])->name('confirm-account');
});

Route::post("/logout", [LoginController::class, 'logout'])->middleware('auth')->name("logout");


Route::middleware('emailVerified')->group(function () {
    Route::get("landing-worldwide", [DashboardController::class, 'getWorldwideStatistics'])->name("landing-worldwide");
    Route::get('statistics-by-country', [CountryStatisticsController::class, 'searchCountry'])->name('search-country');
    Route::post('statistics-by-country', [CountryStatisticsController::class, 'searchCountry'])->name('search-by-country');
});
