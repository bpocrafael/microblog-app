<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{
    const DESTINATION_PATH = 'public';

    public function store(PostRequest $request)
    {
        $post = new Post();
        $post->content = $request->input('content');
        $post->user_id = auth()->id();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $image->storeAs(self::DESTINATION_PATH, $image_name);

            $input['image'] = $image_name;
            $post->image = $path;
        }

        $post->save();
        return back()->withInput();
    }
}
