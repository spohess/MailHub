<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request): JsonResponse
    {
        if (!auth()->attempt($request->only('email', 'password'))) {
            return response()->json(['message' => 'Authentication Failed'], 400);
        }

        if (!auth()->user()->active) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        $token = auth()->user()->createToken(config('app.name') . '_' . date('YmdHis'));

        return response()->json(['token' => $token->plainTextToken], 201);
    }
}
