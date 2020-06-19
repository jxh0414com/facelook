<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\LoginRequest;

use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['login']);
    }

    /**
     * Login (func)
     * @param LoginRequest $request
     * @return JsonResponse user and token
     */
    public function login(LoginRequest $request) {
        if (! $token = auth()->attempt($request->only(['email', 'password']))) {
            return response()->json(['errors' => ['error' => ['Invalid credentials']]], 401);
        }
        return response()->json(['token' => $token, 'user' => auth()->user()]);
    }

    /**
     * me (func)
     * @return JsonResponse user
     */
    public function me() {
        return response()->json(['user' => auth()->user()]);
    }

    /**
     * logout (func)
     * Invalidate token to identify current user
     */
    public function logout() {
        auth()->logout();
    }

}
