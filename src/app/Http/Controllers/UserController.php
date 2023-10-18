<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;
use App\Services\UserFollowService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    protected UserFollowService $userFollowService;

    public function __construct(UserFollowService $userFollowService)
    {
        $this->userFollowService = $userFollowService;
    }

    public function show(): View
    {
        /** @var User $user */
        $user = auth()->user();

        $posts = $user->userPosts()->latest()->paginate(4);

        return view('user.profile', ['user' => $user, 'posts' => $posts, 'userFollowService' => $this->userFollowService,]);
    }

    public function home(): View
    {
        /** @var User $user */
        $user = auth()->user();

        $userIds = $user->followings
            ->pluck('id')
            ->push(Auth::id());

        $posts = Post::whereIn('user_id', $userIds)
            ->latest()
            ->paginate(4);

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
