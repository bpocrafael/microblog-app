<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\View\View;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    public function index(Post $post): View
    {
        return view('comment.index', ['post' => $post]);
    }

    public function store(CommentRequest $request, Post $post): RedirectResponse
    {
        $comment = new Comment();
        $comment->post_id = $post->id;
        $comment->content = $request->input('content');
        $comment->user_id = (int) auth()->id();

        $post->comments()->save($comment);

        return back()->withInput();
    }
}
