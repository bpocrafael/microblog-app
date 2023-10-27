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
        $originalPost = Post::find((int)$request->input('original_post_id'));

        while ($originalPost && $originalPost->original_post_id) {
            $originalPost = Post::find($originalPost->original_post_id);
        }

        $post = new Post();
        $post->content = $request->input('content');
        $post->user_id = (int) auth()->id();

        if ($originalPost instanceof Post) {
            $post->original_post_id = $originalPost->id;
        } else {
            $post->original_post_id = null;
        }

        $post->save();
        return $post;
    }

    /**
     * View the post that will be shared.
     */
    public function getOriginalPost(Post $post): ?Post
    {
        if ($post->original_post_id) {
            $originalPost = Post::find($post->original_post_id);

            if ($originalPost) {
                return $originalPost;
            }
        }

        return null;
    }
}
