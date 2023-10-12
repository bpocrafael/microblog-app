<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResendVerificationRequest;
use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function show(): View
    {
        return view('auth.verify');
    }

    /**
     * The path to redirect to after successful email verification.
     *
     * @var string
     */
    protected static $verify_redirect = '/';

    /**
     * Mark the authenticated user's email address as verified.
     */
    public function verify(Request $request): RedirectResponse
    {
        if (! $request->hasValidSignature()) {
            abort(403, 'Invalid verification link');
        }

        $user = $request->user();

        if (!$user) {
            return redirect()->route('login');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect()->route('user.home');
        }

        $user->markEmailAsVerified();
        event(new Verified($user));
        return redirect()->route('user.home');
    }

    /**
     * Resend email; verification.
     */
    public function resend(ResendVerificationRequest $request): RedirectResponse
    {
        $user = $request->user();

        if ($user && !$user->hasVerifiedEmail()) {
            $user->sendEmailVerificationNotification();
            return back()->with('resent', true);
        }

        return redirect()->route('user.home');
    }
}
