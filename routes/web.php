<?php

use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [SessionsController::class, 'create']);
