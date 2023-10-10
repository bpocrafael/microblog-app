<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Http\Requests\ResetPasswordRequest;

class ResetPasswordController extends Controller
{
     // Show the password reset form
     public function showResetForm(Request $request, $token)
     {
         return view('auth.passwords.reset', ['token' => $token, 'email' => $request->email]);
     }
 
     // Reset the user's password
     public function reset(ResetPasswordRequest $request)
     {
         $response = Password::reset($request->only(
             'email', 'password', 'password_confirmation', 'token'
         ), function ($user, $password) {
             $user->forceFill([
                 'password' => Hash::make($password),
                 'remember_token' => str()->random(60),
             ])->save();
         });
 
         return $response == Password::PASSWORD_RESET
             ? redirect()->route('view.login')->with('status', trans($response))
             : back()->withErrors(['email' => trans($response)]);
     }
}
