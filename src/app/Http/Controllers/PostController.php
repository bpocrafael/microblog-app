<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use App\Http\Requests\PostRequest;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    const DESTINATION_PATH = '/public/images';

    /**
     * Store a newly created post.
     */
    public function store(PostRequest $request): RedirectResponse
    {
        $post = new Post();
        $post->content = $request->input('content');
        $post->user_id = auth()->id();

        $input = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $image->storeAs(self::DESTINATION_PATH, $image_name);

            $input['image'] = $image_name;
        }

        $post->fill($input);
        $post->save();

        return back()->withInput();
    }

    /**
     * Display the posts.
     */
    public function show(Post $post): View
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the post.
     */
    public function edit(Post $post): View
    {
        return view('post.edit', compact('post'));
    }

    /**
     * Update the post.
     */
    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        $update = Post::find($post->id);
        $update->content = $request->content;

        if($request->image) {
            $request->validate([
                'image' => ['required','image']
            ]);
            unlink(public_path('storage/images/'.$post->image));
            $newImage = time().'.'.$request->image->extension();
            $request->image->move(public_path('storage/images'),$newImage);
            $update->image = $newImage;
        }

        $update->update();

        return redirect()->route('post.show', $post->id);
    }
}
