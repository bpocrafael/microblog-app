@extends('layouts.app')

@section('content')
    @include('layouts.navbar')

    <div class="row mt-4">
        <div class="col-sm-10 mx-auto">
            <div class="card shadow" style="border: 1px solid #388087">
                <div class="card-header" style="background-color: #f6f6f2; border-bottom: 1px solid #388087;">
                    <h2 class="my-2 text-center" style="color: #388087;">Search Results</h2>
                </div>
                <div class="card-body" style="background-color: #f6f6f2;">
                    @if (count($userResults) === 0 && count($postResults) === 0)
                        <p class="text-center">No results found.</p>
                    @else
                        @if (count($userResults) > 0)
                            <ul class="list-group">
                                @foreach ($userResults as $user)
                                    <li class="list-group-item {{ Auth::user() && Auth::user()->id != $user->id ? 'd-flex justify-content-between align-items-center' : 'mb-3' }}">
                                        <a href="{{ Auth::user() && Auth::user()->id != $user->id ? route('profile.index', ['user' => $user->id]) : route('profile.show') }}" 
                                        class="text-dark text-decoration-none">{{ $user->display_name }}
                                        </a>
                                        @if(Auth::user() && Auth::user()->id != $user->id)
                                            <button class="toggle-button btn btn-{{ $userFollowService->isFollowingExist(auth()->user(), $user) ? 'danger' : 'primary' }} btn-sm mt-2" 
                                                    data-user="{{ $user->id }}" 
                                                    data-action="{{ $userFollowService->isFollowingExist(auth()->user(), $user) ? 'unfollow' : 'follow' }}">
                                                {{ $userFollowService->isFollowingExist(auth()->user(), $user) ? 'Unfollow' : 'Follow' }}
                                            </button>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        @if (count($postResults) > 0)
                            @foreach ($postResults as $post)
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <a href="{{ route('posts.show', $post->id) }}" class="card-title h5" style="text-decoration: none">{{ $post->user->full_name }}</a>
                                        <p class="card-text">{{ $post->content }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endif
                    <div class="mt-4">
                        <h3 class="my-2 text-center" style="color: #388087;">People you may know</h3>
                        <ul class="list-group">
                            @foreach ($randomUsers as $randomUser)
                                <li class="list-group-item">
                                    <a href="{{ route('profile.index', ['user' => $randomUser->id]) }}" class="text-dark text-decoration-none">{{ $randomUser->display_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
