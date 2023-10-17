<?php

namespace App\Services;

use App\Models\User;

class UserFollowService
{
    public function isFollowingExist(User $follower, User $target): bool
    {
        return $follower->followings()->wherePivot('user_id', $target->id)->exists();
    }
}
