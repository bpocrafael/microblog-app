<?php

namespace App\Services;

use App\Models\User;
use App\Models\Post;

class UserService
{
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
    public function getUserHomePosts(): array
    {
        /** @var User $user */
        $user = User::with('followings')
            ->find(auth()->id());

        $posts = Post::with('user')
            ->whereIn('user_id', $user->followings->pluck('id')->push($user->id))
            ->latest()
            ->paginate(4);

        return ['posts' => $posts];
    }
}
