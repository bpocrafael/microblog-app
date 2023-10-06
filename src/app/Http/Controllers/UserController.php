<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function show(): View
    {
        return view('user/profile');
    }

    public function home(): View
    {
        $posts = Post::all();
        return view('user.home', ['posts' => $posts]);
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('view.login');
    }

}
