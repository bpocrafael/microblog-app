<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\RedirectResponse;

class VerificationController extends Controller
{
     //Display the email verification notice.
    public function show(Request $request): View
    {
        return view('auth.verify');
    }

    protected static $verify_redirect = '/';

     //Mark the authenticated user's email address as verified.

    public function verify(Request $request): RedirectResponse
    {
        if (! $request->hasValidSignature()) {
            abort(403, 'Invalid verification link');
        }

        $user = $request->user();

        if (!$user) {
            return redirect()->route('view.login');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('user.home');
        }

        $user->markEmailAsVerified();
        event(new Verified($user));
        return redirect()->route('user.home');
    }

    public function resend(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('user.home');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }
}
