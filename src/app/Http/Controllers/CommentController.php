<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\View\View;
use App\Services\CommentService;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    /**
     * @var CommentService
     */
    protected $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    /**
     * Display the comments.
     */
    public function index(Post $post): View
    {
        $comments = $this->commentService->getCommentsForPost($post);
        return view('comment.index', ['post' => $post, 'comments' => $comments]);
    }

    /**
     * Store a newly created comment.
     */
    public function store(CommentRequest $request, Post $post): RedirectResponse
    {
        $this->commentService->storeComment($request, $post);
        return back()->withInput();
    }

    /**
     * Show the form for editing the comment.
     */
    public function edit(Comment $comment): View
    {
        return view('comment.edit', ['comment' => $comment]);
    }

    /**
     * Update the comment.
     */
    public function update(CommentRequest $request, Comment $comment): RedirectResponse
    {
        $comment = $this->commentService->updateComment($request, $comment);
        return redirect()->route('comments.index', ['post' => $comment->post]);
    }

    /**
     * Remove/delete comment.
     */
    public function destroy(Comment $comment): RedirectResponse
    {
        $comment->delete();
        return redirect()->back();
    }
}
