<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('auth/login');
    }

    public function auth(LoginRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
    
        if (auth()->attempt([
            'email' => $validatedData['email'],
            'password' => $validatedData['password']
        ])) {
            $request->session()->regenerate();
            return redirect()->route('profile.show');
        }
    
        return redirect()->route('view.login');
    }

}
