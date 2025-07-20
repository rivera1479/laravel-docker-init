<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/auth', [LoginController::class, 'login'])->name('auth.login');