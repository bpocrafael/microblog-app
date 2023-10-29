<?php

namespace App\Services;

use App\Http\Requests\ShareRequest;
use App\Models\Post;

class ShareService
{
    /**
     * Store the new shared post.
     */
    public function storeSharePost(ShareRequest $request): Post
    {
        $originalPost = $this->getOriginalPostById((int) $request->input('original_post_id'));

        while ($originalPost && $originalPost->original_post_id) {
            $originalPost = Post::find($originalPost->original_post_id);
        }

        $post = new Post();
        $post->content = $request->input('content');
        $post->user_id = (int) auth()->id();

        if (!$originalPost instanceof Post) {
            $post->original_post_id = null;
        } else {
            $post->original_post_id = $originalPost->id;
        }

        $post->save();
        return $post;
    }

    /**
     * View the post that will be shared.
     */
    public function getOriginalPost(Post $post): ?Post
    {
        if (!$post->original_post_id) {
            return null;
        }

        return $this->getOriginalPostById($post->original_post_id);
    }

    /**
     * Retrieve the original post by ID.
     */
    private function getOriginalPostById(int $originalPostId): ?Post
    {
        return Post::find($originalPostId);
    }
}
