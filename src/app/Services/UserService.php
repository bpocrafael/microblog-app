<?php

namespace App\Services;

use App\Models\User;
use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService
{
    /**
     * @var UserFollowService
     */
    private $userFollowService;

    public function __construct(UserFollowService $userFollowService)
    {
        $this->userFollowService = $userFollowService;
    }

    /**
     * Get the user and posts.
     *
     * @return array<string, mixed>
     */
    public function getUserProfile(): array
    {
        /** @var User $user */
        $user = auth()->user();
        $posts = $user->userPosts()->latest()->paginate(4);

        return [
            'user' => $user,
            'posts' => $posts,
        ];
    }

    /**
     * Get the user and posts.
     *
     * @return array<string, mixed>
     */
    public function getUserHomePosts(): LengthAwarePaginator
    {
        /** @var User $user */
        $user = User::with('followings')
            ->find(auth()->id());
    
        $posts = Post::with('originalPost', 'user')
            ->whereIn('user_id', $user->followings->pluck('id')->push($user->id))
            ->latest()
            ->paginate(4);
    
        return $posts;
    }

    /**
     * Get the profile of the clicked user.
     *
     * @return array<string, mixed>
     */
    public function getProfile(User $user): array
    {
        $posts = $user->userPosts()->latest()->paginate(4);
        return [
            'user' => $user,
            'name' => $user->name,
            'email' => $user->email,
            'posts' => $posts,
            'userFollowService' => $this->userFollowService,
        ];
    }
}
