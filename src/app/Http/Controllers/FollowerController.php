<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;

class FollowerController extends Controller
{
    /**
     * Follow user.
     */
    public function follow(User $user): RedirectResponse
    {
        /** @var User $user */
        $follower = auth()->user();

        if (!$follower) {
            return redirect()->route('login');
        }

        $follower->followings()->syncWithoutDetaching($user);

        return redirect()->route('search.result', $user->id);

    }

    /**
     * Unfollow user.
     */
    public function unfollow(User $user): RedirectResponse
    {
        /** @var User $user */
        $follower = auth()->user();

        if (!$follower) {
            return redirect()->route('login');
        }

        $follower->followings()->detach($user);

        return redirect()->route('search.result', $user->id);
    }
}
