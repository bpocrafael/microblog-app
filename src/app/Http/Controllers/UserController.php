<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
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
        return view('user.profile', $userData, ['userFollowService' => $this->userFollowService]);
    }

    public function home(Request $request): mixed
    {
        $offset = $request->input('offset', 0);
        $posts = $this->userService->getUserHomePosts($offset);
    
        if ($request->ajax()) {
            return response()->json($posts);
        }
    
        return view('user.home', compact('posts'));
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('login');
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
