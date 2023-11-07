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
        $validated = $request->safe()->all();
        $originalPost = $this->getOriginalPost($validated['original_post_id']);

        while ($originalPost && $originalPost->original_post_id) {
            $originalPost = $this->getOriginalPost($originalPost->original_post_id);
        }

        $post = Post::create([
            'content' => $validated['content'],
            'user_id' => auth()->id(),
            'original_post_id' => $originalPost->id ?? null,
        ]);

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
