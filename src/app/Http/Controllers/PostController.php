<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostController extends Controller
{

    public function create(PostRequest $request)
    {
        $post = new Post();
        $post->content = $request->input('content');
        $post->user_id = auth()->id();

        if($request->hasFile('image')) {
            $destination_path = 'public/images';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $image->storeAs($destination_path, $image_name);

            $input['image'] = $image_name;
            $post->image = $path;
        }

        $post->save();
        $returnRoute = $request->input('return_route', 'user.home');
        return redirect()->route($returnRoute);
    }
}
