<?php

namespace App\Http\Controllers\Auth;


use App\Models\User;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Show the register form
     */    
    public function create(): View
    {
        return view('auth/register');
    }

    /**
     * Create/register a new user
     */ 
    public function store(RegisterRequest $request): RedirectResponse
    {
        $incomingFields = $request->validated();
        $incomingFields['password'] = Hash::make($incomingFields['password']);
        $user = User::create($incomingFields);
        event(new Registered($user));
        auth()->login($user);
        return redirect()->route('profile.show');
    }
}
