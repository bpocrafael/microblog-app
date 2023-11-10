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
        $words = explode(' ', $query);

        $userResults = User::whereHas('profileInformation', function ($queryBuilder) use ($words) {
            $queryBuilder->where(function ($query) use ($words) {
                foreach ($words as $word) {
                    $query->orWhere('firstname', 'LIKE', "%$word%")
                          ->orWhere('middlename', 'LIKE', "%$word%")
                          ->orWhere('surname', 'LIKE', "%$word%");
                }
            });
        })->orWhere(function ($query) use ($words) {
            foreach ($words as $word) {
                $query->orWhere('name', 'LIKE', "%$word%");
            }
        })->get();

        $userResults = $userResults->map(function ($user) {
            $user->display_name = $user->full_name ?? $user->name;
            return $user;
        });

        $postResults = Post::where(function ($query) use ($words) {
            foreach ($words as $word) {
                $escapedWord = preg_replace('/(\[|\]|\(|\))/', '\\\\$1', preg_quote($word, '/'));
                $query->orWhereRaw("content REGEXP '[[:<:]]" . $escapedWord . "[[:>:]]'");
            }
        })->get();

        return compact('userResults', 'postResults');
    }
}
