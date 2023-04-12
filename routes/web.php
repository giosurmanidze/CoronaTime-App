<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::view('register', 'sessions.sign-up')->middleware('guest');

Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
