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
                <div class="d-flex align-items-center">
                    <img src="{{ $post->user->profileInformation && $post->user->profileInformation->image ? 
                    asset('/storage/images/' . $post->user->profileInformation->image) : 'https://cdn-icons-png.flaticon.com/512/456/456283.png' }}" 
                    alt="Profile Picture" 
                    class="img-fluid rounded-circle mb-3" 
                    width="35" height="35">
                    <div class="ms-3">
                        <a class="card-title text-decoration-none h3" style="color: #388087;" href="{{ $post->ownPost() ? 
                        route('profile.show') : route('profile.index', $post->user) }}">
                            {{ $post->user->display_name }}
                        </a>                        
                        <p class="text-secondary small text-xs opacity-75">
                            <i>{{ $post->updated_at->setTimezone('Asia/Manila')->format('j M Y \a\t g:ia') }}</i>
                        </p>
                    </div>
                </div>
                <p class="card-text" style="font-size: 18px; color: #388087;">{{ $post->content }}</p>
                @if ($post->image)
                    <img height="150px" width="150px" src="{{ asset('/storage/images/'.$post->image) }}" alt="Post Image" class="img-fluid">
                @endif
                @if ($post->original_post_id)
                    <div class="d-flex justify-content-center align-items-center border" style="background-color: #FFFFFF;">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <img src="{{ ($post->originalPostData && $post->originalPostData->user->profileInformation && $post->originalPostData->user->profileInformation->image) ? 
                                asset('/storage/images/' . $post->originalPostData->user->profileInformation->image) : 'https://cdn-icons-png.flaticon.com/512/456/456283.png' }}" 
                                alt="Profile Picture" class="img-fluid rounded-circle" width="35" height="35">
                                <div class="ms-2">
                                    <a class="card-text text-decoration-none h4" style="font-size: 20px; color: #388087;" href="{{ (auth()->check() && $post->originalPostData ? 
                                    $post->originalPostData->user->id === auth()->user()->id : $post->user->id === auth()->user()->id) ? route('profile.show') : route('profile.index', $post->originalPostData ? 
                                    $post->originalPostData->user : $post->user) }}">
                                        {{ $post->originalPostData ? $post->originalPostData->user->full_name : $post->user->full_name }}
                                    </a>
                                </div>
                            </div>
                            <p class="card-text" style="font-size: 18px; color: #388087;">
                                {{ $post->originalPostData ? $post->originalPostData->content : 'Post is no longer available' }}
                            </p>
                            @if ($post->originalPostData && $post->originalPostData->image)
                                <img height="150px" width="150px" src="{{ asset('/storage/images/' . $post->originalPostData->image) }}" alt="Original Post Image" class="img-fluid">
                            @endif
                        </div>
                    </div>
                @endif
                <div class="d-flex justify-content-between align-items-center">    
                    <div>
                        <span class="like-count text-muted small" data-post-id="{{ $post->id }}">
                            {{ $post->likes->count() === 0 ? '' : $post->likes->count() . ' ' . ($post->likes->count() === 1 ? 'Like' : 'Likes') }}
                        </span>
                        <span class="comment-count text-muted small ms-1">
                            {{ $post->commentCount() === 0 ? '' : $post->commentCount() . ' ' . ($post->commentCount() === 1 ? 'Comment' : 'Comments') }}
                        </span>
                    </div>
                    <div>                
                        <span class="share-count text-muted small">
                        {{ $post->shareCount() === 0 ? '' : $post->shareCount() . ' ' . ($post->shareCount() === 1 ? 'Share' : 'Shares') }}
                        </span>
                    </div>
                </div>
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
