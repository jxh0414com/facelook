<?php

namespace App\Http\Controllers\auth;

use App\Http\Requests\auth\RegisterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

use App\User;

class UserController extends Controller
{
    /**
     * Register (func)
     * @param RegisterRequest $request
     * @return JsonResponse user and token
     */
    public function register(RegisterRequest $request) {
        $user = User::_create($request);
        return response()->json(['user' => $user, 'token' => auth()->login($user)]);
    }

    /**
     * Register (func)
     * @param $identifier
     * @return JsonResponse user
     */
    public function getUserByIdentifier($identifier) {
        return response()->json(['user' => User::where('identifier', $identifier)->first() ]);
    }
}
