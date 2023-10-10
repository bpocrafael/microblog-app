<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ResetLinkRequest;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    // Show the forgot password form
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    // Send a password reset link to the user
    public function sendResetLinkEmail(ResetLinkRequest $request)
    {
        $response = Password::sendResetLink($request->only('email'));

        return $response === Password::RESET_LINK_SENT
            ? back()->with('status', trans($response))
            : back()->withErrors(['email' => trans($response)]);
    }
}
