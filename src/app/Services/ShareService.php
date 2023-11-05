<?php

namespace App\Services;

use App\Models\Post;
use App\Http\Requests\ShareRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ShareService
{
    /**
     * Store the new shared post.
     */
    public function storeSharePost(ShareRequest $request): Post
    {
        $originalPostId = $request->input('original_post_id');
        $originalPost = $this->getOriginalPost($originalPostId);

        while ($originalPost instanceof Post && $originalPost->original_post_id) {
            $originalPost = $this->getOriginalPost($originalPost->original_post_id);
        }
        $post = new Post();
        $post->content = $request->input('content');

        /**
         * @var int $userId
         */
        $userId = auth()->id();
        $post->user_id = $userId;
        $post->original_post_id = $originalPost instanceof Post ? $originalPost->id : null;

        $post->save();
        return $post;
    }

    /**
     * Retrieve the original post by ID.
     */
    public function getOriginalPost(?int $originalPostId): ?Post
    {
        try {
            return Post::findOrFail($originalPostId);
        } catch (ModelNotFoundException $e) {
            return null;
        }
    }
}
