<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use App\Services\ShareService;
use App\Http\Requests\ShareRequest;
use Illuminate\Http\RedirectResponse;

class ShareController extends Controller
{
    /**
     * @var ShareService
     */
    protected $shareService;

    public function __construct(ShareService $shareService)
    {
        $this->shareService = $shareService;
    }

    /**
     * View the post that will be shared.
     */
    public function index(Post $post): View
    {
        $originalPost = $this->shareService->getOriginalPost($post->original_post_id);
        return view('share.index', compact('post', 'originalPost'));
    }

    /**
     * Store a newly created shared post.
     */
    public function store(ShareRequest $request, Post $post): RedirectResponse
    {
        $this->shareService->storeSharePost($request);
        return redirect()->route('share.store', ['post' => $post])->withInput();
    }
}
