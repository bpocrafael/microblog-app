<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function view(){
        return view('auth/register');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
    
    public function register(RegisterRequest $request)
    {
        $incomingFields = $request->validated();
    
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/');
    }
}
