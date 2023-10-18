<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;
use App\Services\UserFollowService;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    protected UserFollowService $userFollowService;

    public function __construct(UserFollowService $userFollowService)
    {
        $this->userFollowService = $userFollowService;
    }

    public function show(): View
    {
        $user = User::find(auth()->id());

        if (!$user) {
            return view('user.profile', ['posts' => collect()]);
        }
        $posts = $user->userPosts()->latest()->paginate(4);

        return view('user.profile', ['user' => $user, 'posts' => $posts, 'userFollowService' => $this->userFollowService,]);
    }

    public function home(): View
    {
        $posts = Post::latest()->paginate(4);
        return view('user.home', ['posts' => $posts]);
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function settings(): View
    {
        return view('user.settings');
    }

}
