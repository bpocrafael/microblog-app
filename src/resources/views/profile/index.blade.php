@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="flex-shrink-0 mt-4 text-center">
                @if ($user->profileInformation && $user->profileInformation->image)
                    <img src="{{ asset('/storage/images/' . $user->profileInformation->image) }}" alt="Profile Picture" class="img-fluid rounded-circle mb-3" width="150" height="150">
                @else
                    <img src="https://cdn-icons-png.flaticon.com/512/456/456283.png" alt="Profile Picture" class="img-fluid rounded-circle mb-3" width="150" height="150">
                @endif
            </div>
            <div class="flex-grow-1 ms-3 mt-2">
                <div class="d-flex align-items-center justify-content-center">
                @if (auth()->check() && auth()->user()->id !== $user->id)
                    @if ($userFollowService->isFollowingExist(auth()->user(), $user))
                        <h3 style="margin-right: 10px; color: #388087;">{{ $user->full_name }} </h3>
                        <button class="toggle-button btn btn-danger btn-sm text-center" data-user="{{ $user->id }}" data-action="unfollow">Unfollow</button>
                    @else
                        <h3 style="margin-right: 10px; color: #388087;">{{ $user->full_name }} </h3>
                        <button class="toggle-button btn btn-primary btn-sm text-center" data-user="{{ $user->id }}" data-action="follow">Follow</button>
                    @endif
                @endif
            </div>
            </div>
            <div>
                @if ($user->profileInformation)
                    <p class="text-muted mb-3 text-center">{{ $user->profileInformation->about ? ' ' . $user->profileInformation->about : ''  }}</p>
                @else
                    <p class="text-muted mb-3">Bio not available.</p>
                @endif
            </div>
                <div class="d-flex pt-1 justify-content-center mb-5">
                    <button type="button" class="btn me-1" data-bs-toggle="modal" data-bs-target="#followersModal" style="color: #388087; border-color: #388087;">Followers</button>
                    <button type="button" class="btn me-1" data-bs-toggle="modal" data-bs-target="#followingModal" style="color: #388087; border-color: #388087;">Following</button>
                </div>
            </div>
        </div>
    </div>
    
    @include('follow.followers')
    @include('follow.followings')

    
    <div id="userPosts">
        @if ($userFollowService->isFollowingExist(auth()->user(), $user))
            @if ($posts && $posts->count() > 0)
                @include('post.index')
            @else
                <div class="card-body">
                    <p class="card-text text-center">No posts made yet.</p>
                </div>
            @endif
            <div class="d-flex justify-content-center">
                @if ($posts)
                    {{ $posts->links() }}
                @endif
            </div>
        @else
            <div class="card-body">
                <p class="card-text text-center text-muted">You are not following this user. Follow them to see their posts.</p>
            </div>
        @endif

    </div>
@endsection
