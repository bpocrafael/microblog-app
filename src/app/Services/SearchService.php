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
    public function search(string $query)
    {
        $userResults = User::where('name', 'like', "%$query%")->get();
        $searchWords = explode(' ', $query);
        $postResults = [];

        foreach ($searchWords as $word) {
            $posts = Post::where('content', 'like', "% $word %")
                         ->orWhere('content', 'like', "$word %")
                         ->orWhere('content', 'like', "% $word")
                         ->orWhere('content', 'like', $word)
                         ->get();

            $postResults = array_merge($postResults, $posts->all());
        }

        return compact('userResults', 'postResults');
    }
}
