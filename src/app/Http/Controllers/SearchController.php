<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Services\SearchService;
use Illuminate\Contracts\View\View;

class SearchController extends Controller
{
    /**
     * Make an instance of SearchController.
     */
    private $searchService;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    /**
     * Search for user and posts using keywords.
     */
    public function search(SearchRequest $request): View
    {
        $query = $request->input('query');
        $results = $this->searchService->search($query);

        return view('search.results', $results);
    }
}
