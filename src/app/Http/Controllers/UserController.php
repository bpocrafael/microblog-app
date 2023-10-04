<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class UserController extends Controller
{
    public function profile(): View
    {
        return view('user.profile');
    }

    public function home(): View
    {
        return view('user.home');
    }
}
