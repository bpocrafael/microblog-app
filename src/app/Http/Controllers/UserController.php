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

    /**
     * Display the user's posts.
     */
    public function show(): View
    {
        $userData = $this->userService->getUserProfile();
        return view('user.profile', $userData, ['userFollowService' => $this->userFollowService,]);
    }

    /**
     * View followed users posts.
     */
    public function home(): View
    {
        $postData = $this->userService->getUserHomePosts();
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

    /**
     * View the profile of the specific user.
     */
    public function viewProfile(User $user): View
    {
        $userData = $this->userService->getProfile($user);
        return view('profile.index', $userData);
    }
}
