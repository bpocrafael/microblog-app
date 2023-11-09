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
        $userResultsByFullName = User::whereHas('profileInformation', function ($queryBuilder) use ($query) {
            $queryBuilder->whereRaw("CONCAT_WS(' ', firstname, middlename, surname) REGEXP ?", [$query]);
        })->get();


        $userResultsByUsername = User::where('name', 'like', "%$query%")->get();
        $userResults = $userResultsByFullName->concat($userResultsByUsername);
        $userResults = $userResults->map(function ($user) {
            $user->display_name = $user->full_name ?? $user->name;
            return $user;
        });

        $postResults = Post::whereRaw("content REGEXP '[[:<:]]" . $query . "[[:>:]]'")->get();

        return compact('userResults', 'postResults');
    }
}
