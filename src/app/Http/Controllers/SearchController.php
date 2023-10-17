<?php

namespace App\Http\Controllers;

use App\Services\SearchService;
use App\Services\UserFollowService;
use Illuminate\Contracts\View\View;
use App\Http\Requests\SearchRequest;

class SearchController extends Controller
{
    /**
     * @var SearchService
     */
    private $searchService;

    /**
     * @var UserFollowService
     */
    protected $userFollowService;

    public function __construct(SearchService $searchService, UserFollowService $userFollowService)
    {
        $this->searchService = $searchService;
        $this->userFollowService = $userFollowService;
    }

    /**
     * Search for user and posts using keywords.
     */
    public function search(SearchRequest $request): View
    {
        $query = $request->input('query');
        $results = $this->searchService->search($query);

        return view('search.results', $results, ['userFollowService' => $this->userFollowService,]);
    }
}
