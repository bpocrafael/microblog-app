<?php

namespace App\Services;

use App\Models\PostLike;

class LikeService
{
    /**
     * Toggle the like status for a user on a post.
     */
    public function like(int $user_id, int $post_id): bool
    {
        $like = PostLike::firstOrNew(['user_id' => $user_id, 'post_id' => $post_id]);

        if ($like->exists) {
            $like->delete();
            return false;
        }
    
        $like->save();
    
        return true;
    }
}
