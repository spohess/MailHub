<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Middleware\AdministradorMiddleware;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Route;

Route::get('/', function (): JsonResponse {
    return response()->json(['message' => 'Server Ok']);
});

Route::prefix('auth')->group(__DIR__ . '/api/auth.php');

Route::middleware([
    'auth:sanctum',
    AdministradorMiddleware::class,
])->group(function () {
    Route::apiResource('user', UserController::class);
});
