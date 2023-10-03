<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class UserController extends Controller
{
    public function profile(): View
    {
        return view('user.profile');
    }
}
