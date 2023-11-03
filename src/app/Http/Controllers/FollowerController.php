<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;

class FollowerController extends Controller
{
    /**
     * Handle follow users
     */
    public function follow(User $user): JsonResponse
    {
        $follower = auth()->user();

        if ($follower) {
            $follower->followings()->attach($user);
            return response()->json(['message' => 'You are now following ' . $user->name]);
        }

        return response()->json(['error' => 'User is not authenticated'], 401);
    }

    /**
     * Handle unfollow users
    */
    public function unfollow(User $user): JsonResponse
    {
        $follower = auth()->user();

        if ($follower) {
            $follower->followings()->detach($user);
            return response()->json(['message' => 'You have unfollowed ' . $user->name]);
        }

        return response()->json(['error' => 'User is not authenticated'], 401);
    }

}
