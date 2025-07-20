<?php

// Incluye otros archivos de rutas para la API

use Illuminate\Support\Facades\Route;

Route::prefix('user')->group(base_path('routes/user.php'));
