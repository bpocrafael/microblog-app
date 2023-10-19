<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostLike;
use Illuminate\Http\JsonResponse;

class LikeController extends Controller
{
    public function like(Post $post): JsonResponse
    {
        $user = auth()->user();

        if ($user) {
            if (!$user->likes->contains('post_id', $post->id)) {
                $like = new PostLike(['user_id' => $user->id, 'post_id' => $post->id]);
                $like->save();
            }
        }

        return response()->json();
    }

    public function unlike(Post $post): JsonResponse
    {
        $user = auth()->user();

        if ($user) {
            $like = $user->likes()->where('post_id', $post->id)->first();

            if ($like) {
                $like->delete();
            }
        }

        return response()->json();
    }

}
