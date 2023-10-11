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
            'password' => $validatedData['password']
        ];
    
        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('profile.show');

        } else {
            $user = User::where('email', $validatedData['email'])->first();
            
            if ($user && $user->email_verified_at) {
                return redirect()->route('login')->with('error', 'Incorrect password. Please try again.');
                
            } else {
                return redirect()->route('login')->with('error', 'Email is not verified or does not exist.');
            }
        }
    
        return redirect()->route('login');
    }
}
