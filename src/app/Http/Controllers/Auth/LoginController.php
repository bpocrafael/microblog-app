<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /**
     * Show the login form
     */
    public function index(): View
    {
        return view('auth/login');
    }

    /**
     * Authenticate user login
     */
    public function auth(LoginRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        $credentials = [
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
        ];
    
        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('profile.show');
        }
    
        return redirect()->route('login')->with('error', 'Incorrect email or password. Please try again.');
    }
}
