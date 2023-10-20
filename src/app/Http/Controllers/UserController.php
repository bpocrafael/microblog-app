<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use App\Services\UserService;
use App\Services\UserFollowService;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * @var UserFollowService
     */
    protected $userFollowService;

    public function __construct(UserService $userService, UserFollowService $userFollowService)
    {
        $this->userService = $userService;
        $this->userFollowService = $userFollowService;
    }

    public function show(User $user): View
    {
        $userData = $this->userService->getUserProfile($user);
        return view('user.profile', $userData, ['userFollowService' => $this->userFollowService,]);
    }

    public function home(User $user): View
    {
        $postData = $this->userService->getUserHomePosts($user);
        return view('user.home', $postData);
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
