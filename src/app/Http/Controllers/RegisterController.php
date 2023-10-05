<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Contracts\View\View;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    public function create(): View
    {
        return view('auth/register');
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        $incomingFields = $request->validated();
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect()->route('profile.show');
    }
}
