@extends('layouts.app')

@section('content')

    @include('layouts.navbar')

    <div class="container mt-5">
        <div class="row justify-content-center">
        <div class="col-md-7">
        <div class="card " style="background-color: #F6f6f2; border: 1px solid #388087;">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #6fb3b8; border-bottom: 1px solid #388087;">
                <div class="text-white small">
                    Created at: {{ $post->created_at->setTimezone('Asia/Manila')->format('j M Y \a\t g:ia') }}
                </div>
                <div class="text-white small">
                    Updated at: {{ $post->updated_at->setTimezone('Asia/Manila')->format('j M Y \a\t g:ia') }}
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <img src="https://cdn-icons-png.flaticon.com/512/456/456283.png" alt="{{ $post->user->name }} Profile Picture" class="rounded-circle" width="35" height="35">
                    <div class="ms-3">
                        <a class="card-title text-decoration-none h4" href="{{ $post->ownPost() ? 
                        route('profile.show') : route('profile.index', $post->user) }}" style="color: #388087;">
                            {{ $post->user->display_name}}
                        </a>
                    </div>
                </div>
                <p class="card-text" style="font-size: 20px; color: #388087;">{{ $post->content }}</p>
                @if ($post->image)
                    <img height="250px" width="150px" src="{{ asset('/storage/images/'.$post->image) }}" alt="Post Image" class="img-fluid">
                @endif
                <span class="like-count text-muted small" data-post-id="{{ $post->id }}">
                    {{ $post->likes->count() === 0 ? '' : $post->likes->count() . ' ' . ($post->likes->count() === 1 ? 'Like' : 'Likes') }}
                </span>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center" style="border-top: 1px solid #388087;">
                <div class="interaction mt-1">
                    <button class="btn btn-sm like-button" data-post-id="{{ $post->id }}" data-initial-likes="{{ $post->likes->count() }}" style="background-color: #c2edce;">
                        {{ $post->isLikedBy(auth()->user()) ? 'Unlike' : 'Like' }}
                    </button>                   
                    <a href="{{ route('comments.index', $post->id) }}" class="btn btn-sm comment" style="background-color: #badfe7;">
                        <i class="bi bi-chat-dots"></i> Comment
                    </a>
                </div>
                <div>
                    <a href="#" class="btn btn-sm share" style="background-color: #f48882;">
                        <i class="bi bi-arrow-90deg-right"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
