@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    
    <div class="container mb-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col col-md-9 col-lg-7 col-xl-6 mt-3 mb-2">
                <div class="card" style="border-radius: 15px; border: 2px solid #2190AE">
                    <div class="card-body p-4">
                        <div class="d-flex text-black">
                            <div class="flex-shrink-0">
                                <img src="https://cdn-icons-png.flaticon.com/512/456/456283.png"
                                    alt="Generic placeholder image" class="img-fluid"
                                    style="width: 180px; border-radius: 10px;">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <div class="d-flex align-items-center">
                                    <h4 style="margin-right: 10px">{{ $user->full_name }} </h4>
                                    <div>
                                        @if (auth()->check() && auth()->user()->id !== $user->id)
                                            @if ($userFollowService->isFollowingExist(auth()->user(), $user))
                                                <form method="POST" action="{{ route('users.unfollow', $user->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm mt-2">Unfollow</button>
                                                </form>
                                            @else
                                                <form method="POST" action="{{ route('users.follow', $user->id) }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-primary btn-sm mt-2">Follow</button>
                                                </form>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <p class="small mb-2 pb-1 text-secondary">{{ $user->email }}</p>
                                <p class="text-muted mb-3">
                                    {{ $user->profileInformation ? $user->profileInformation->about : 'Bio not available' }}
                                </p>
                                <div class="d-flex pt-1">
                                    <button type="button" class="btn btn-outline-dark me-1 flex-grow-1" data-bs-toggle="modal" data-bs-target="#followersModal">Followers</button>
                                    <button type="button" class="btn btn-outline-dark me-1 flex-grow-1" data-bs-toggle="modal" data-bs-target="#followingModal">Following</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @include('follow.followers')
    @include('follow.followings')

    <div>
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
    </div>
@endsection
