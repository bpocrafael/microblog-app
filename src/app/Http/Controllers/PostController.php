<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use App\Http\Requests\PostRequest;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public const DESTINATION_PATH = 'public/images';

    /**
     * Store a newly created post.
     */
    public function store(PostRequest $request): RedirectResponse
    {
        $post = new Post();
        $post->content = $request->input('content');
        $post->user_id = (int) auth()->id();

        $input = $request->all();
        if ($request->hasFile('image')) {
            $images = $request->file('image');

            if (is_array($images)) {
                // Handle multiple uploaded files if needed
                foreach ($images as $image) {
                    $image_name = $image->getClientOriginalName();
                    $image->storeAs(self::DESTINATION_PATH, $image_name);
                }
            } elseif ($images instanceof \Illuminate\Http\UploadedFile) {
                // Handle a single uploaded file
                $image_name = $images->getClientOriginalName();
                $images->storeAs(self::DESTINATION_PATH, $image_name);
            }

            if (isset($image_name)) {
                $input['image'] = $image_name;
            }
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
        $post->content = $request->input('content');
    
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => ['required', 'image'],
            ]);
    
            if ($post->image) {
                unlink(public_path('storage/images/' . $post->image));
            }
    
            $newImage = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/images'), $newImage);
            $post->image = $newImage;
        } elseif ($request->has('delete_image')) {
            // Delete the existing image
            unlink(public_path('storage/images/' . $post->image));
            $post->image = null;
        }
    
        $post->save();
    
        return redirect()->route('posts.show', $post->id);
    }
    
    /**
     * Remove/delete post.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect()->back();
    }
}
