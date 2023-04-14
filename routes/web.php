<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::view('register', 'sessions.sign-up')->middleware('guest');
Route::post('register', [RegisterController::class, 'register'])->name('register');

Route::get('confirm-account/{user}', [RegisterController::class, 'confirmEmail'])->name('confirm-account');

Route::view('login', 'sessions.login')->middleware('guest');


Route::view('confirmation-status', 'email.confirmation-message');
