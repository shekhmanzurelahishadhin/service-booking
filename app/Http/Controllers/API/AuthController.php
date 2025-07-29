<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, AuthService $authService)
    {
        $result = $authService->register($request->validated());

        return response()->json([
            'user' => $result['user'],
            'token' => $result['token']
        ], 201);
    }

    public function login(LoginRequest $request, AuthService $authService)
    {
        $result = $authService->login($request->validated());

        return response()->json([
            'user' => $result['user'],
            'token' => $result['token']
        ]);
    }
}
