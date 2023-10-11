<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    const DESTINATION_PATH = '/public/images';

    public function store(PostRequest $request)
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

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(PostRequest $request, Post $post)
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
