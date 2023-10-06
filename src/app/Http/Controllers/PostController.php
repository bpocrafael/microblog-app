<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        
    }

    public function create(Request $request)
    {
        $incomingFields = $request->validate([
            'content' => 'required',
            'image' => 'image|mimes:jpeg,png,gig|max:2048'
        ]);

        $post = new Post();
        $post->content = $incomingFields['content'];
        $post->user_id = auth()->id();

        if($request->hasFile('image')) {
            $destination_path = 'public/images';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $image->storeAs($destination_path,$image_name);

            $input['image'] = $image_name;
            $post->image = $path;
        }

        $post->save();
        return redirect()->route('user.home');
    }
}
