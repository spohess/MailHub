<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/', function (): JsonResponse {
    return response()->json(['message' => 'Server Ok']);
});

Route::prefix('auth')->group(__DIR__ . '/api/auth.php');
