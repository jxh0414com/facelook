<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\ForgotPasswordRequest;
use App\Http\Requests\auth\ResetPasswordRequest;
use App\Mail\auth\ForgotPassword;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

use App\Temp;
use App\User;

class ForgotController extends Controller
{
    /**
     * Forgot (func)
     * @param ForgotPasswordRequest $request
     * Mail to user with Token
     */
    public function forgot(ForgotPasswordRequest $request) {
        $temp = Temp::_create($request);
        $linkToReset = 'http://facelook.go/reset' . $temp->token;
        Mail::to($temp->email)->send(new ForgotPassword($linkToReset));
    }

    /**
     * Verify (func)
     * @param $token
     * @return JsonResponse email
     */
    public function verify($token) {
        return response()->json(['email' => Temp::whereToken($token)->firstOrFail()->email ]);
    }

    /**
     * Reset (func)
     * @param ResetPasswordRequest $request
     */
    public function reset(ResetPasswordRequest $request) {
        User::_update(User::whereEmail($request['email'])->firstOrFail(), $request);
        Temp::whereEmail($request['email'])->first()->delete();
    }
}
