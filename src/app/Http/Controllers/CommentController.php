<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
}
