<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LikeService;
use Illuminate\Http\JsonResponse;

class LikeController extends Controller
{
    protected LikeService $likeService;

    public function __construct(LikeService $likeService)
    {
        $this->likeService = $likeService;
    }

    public function like(Request $request): JsonResponse
    {
        $user = auth()->user();

        if (!$user) {
            return response()->json(['error' => 'User is not authenticated'], 401);
        }

        $user_id = $user->id;
        $post_id = $request->post_id;

        $liked = $this->likeService->like($user_id, $post_id);

        return response()->json(['liked' => $liked]);
    }
}
