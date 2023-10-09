<?php

namespace App\Http\Controllers\Auth;

use Illuminate\View\View;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
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
