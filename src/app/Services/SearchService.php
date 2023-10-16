<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;

class SearchService
{
    /**
     * Search for users and posts based on the given query.
     *
     * @return array<string, mixed>
     */
    public function search(string $query): array
    {
        $userResults = User::where('name', 'like', "%$query%")->get();
        $postResults = Post::where('content', 'like', "%$query%")->get();

        return compact('userResults', 'postResults');
    }
}
