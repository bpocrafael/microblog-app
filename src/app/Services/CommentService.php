<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Database\Eloquent\Collection;

class CommentService
{
    /**
     * Get the comment for post.
     */
    public function getCommentsForPost(Post $post): Collection
    {
        return $post->comments;
    }

    /**
     * Store the new created comment.
     */
    public function storeComment(CommentRequest $request, Post $post): Comment
    {
        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->content = $request->input('content');
        $comment->user_id = (int) auth()->id();
        $comment->save();

        return $comment;
    }

    /**
     * Update the comment.
     */
    public function updateComment(CommentRequest $request, Comment $comment): Comment
    {
        $comment->content = $request->input('content');
        $comment->save();

        return $comment;
    }
}
