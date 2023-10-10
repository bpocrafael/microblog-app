<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerificationController extends Controller
{
        /**
     * Display the email verification notice.
     *
     * @param  Request  $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        return view('auth.verify');
    }

    protected static $verify_redirect = '/';

    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(Request $request)
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

    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('user.home');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }
}
