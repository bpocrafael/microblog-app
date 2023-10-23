<?php

namespace App\Services;

use App\Models\PostLike;

class LikeService
{
    public function like(int $user_id, int $post_id): bool
    {
        $like = PostLike::where('user_id', $user_id)
            ->where('post_id', $post_id)
            ->first();

        if ($like) {
            $like->delete();
        } else {
            PostLike::create([
                'user_id' => $user_id,
                'post_id' => $post_id,
            ]);
        }

        return !$like;
    }
}
