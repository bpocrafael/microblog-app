@extends('layouts.app')

@section('content')
    @include('layouts.navbar')

    <div class="row mt-4">
        <div class="col-sm-10 mx-auto">
            <div class="card shadow-lg" style="border: 2px solid #2190AE">
                <div class="card-header mb-2" style="background-color: #2190AE">
                    <h2 class="my-2 text-white text-center">Search Results</h2>
                </div>
                <div class="card-body">
                    @if (count($userResults) === 0 && count($postResults) === 0)
                        <p class="text-center">No results found.</p>
                    @else
                        @if (count($userResults) > 0)
                            <ul class="list-group">
                                @foreach ($userResults as $user)
                                    @if(Auth::user() != $user)
                                        @if ($userFollowService->isFollowingExist(auth()->user(), $user))
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <a href="{{ route('profile.index', ['user' => $user->id]) }}" class="text-dark text-decoration-none">{{ $user->name }}</a>
                                                <button class="toggle-button btn btn-danger btn-sm mt-2" data-user="{{ $user->id }}" data-action="unfollow">Unfollow</button>
                                            </li>
                                        @else
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <a href="{{ route('profile.index', ['user' => $user->id]) }}" class="text-dark text-decoration-none">{{ $user->name }}</a>
                                                <button class="toggle-button btn btn-primary btn-sm mt-2" data-user="{{ $user->id }}" data-action="follow">Follow</button>
                                            </li>
                                        @endif
                                    @else
                                        <li class="list-group-item mb-3">
                                            <a href="{{ route('profile.show') }}" class="text-dark text-decoration-none">{{ $user->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                        @if (count($postResults) > 0)
                            @foreach ($postResults as $post)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $post->user->name }}</h5>
                                        <p class="card-text">{{ $post->content }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
