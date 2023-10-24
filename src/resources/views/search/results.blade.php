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
                    @if (!empty($userResults) || !empty($postResults))
                        @if (!empty($userResults))
                            <h3>Users</h3>
                            <ul class="list-group">
                                @foreach ($userResults as $user)
                                    @if(Auth::user() != $user)
                                        @if($userFollowService->isFollowingExist(Auth::user(), $user))
                                            <form method="POST" action="{{ route('users.unfollow', $user->id) }}">
                                                @csrf
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <a href="{{ route('profile.index', ['user' => $user->id]) }}" class="text-dark text-decoration-none">{{ $user->name }}</a>
                                                    <button type="submit" class="btn btn-danger">Unfollow</button>
                                                </li>
                                            </form>
                                        @else
                                            <form method="POST" action="{{ route('users.follow', $user->id) }}">
                                                @csrf
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <a href="{{ route('profile.index', ['user' => $user->id]) }}" class="text-dark text-decoration-none">{{ $user->name }}</a>
                                                    <button type="submit" class="btn btn-primary">Follow</button>
                                                </li>
                                            </form>
                                        @endif
                                    @else
                                        <li class="list-group-item mb-3">
                                            <a href="{{ route('profile.show') }}" class="text-dark text-decoration-none">{{ $user->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif

                        @if (!empty($postResults))
                            <h3>Posts</h3>
                            @foreach ($postResults as $post)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Post by {{ $post->user->name }}</h5>
                                        <p class="card-text">{{ $post->content }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @else
                        <p>No results found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
