<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    public function show(): View
    {
        return view('user/profile');
    }

    public function home(): View
    {
        return view('user/home');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('view.login');
    }

}
