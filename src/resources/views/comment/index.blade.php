@extends('layouts.app')

@section('content')

    @include('layouts.navbar')

    <div class="container-sm mt-5">
        <div class="card shadow" style="background-color: #FAF9F6; border: 1px solid #388087; max-width: 50rem; margin: 0 auto;">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    @if ($post->user->profileInformation && $post->user->profileInformation->image)
                        <img src="{{ asset('/storage/images/' . $post->user->profileInformation->image) }}" alt="Profile Picture" class="img-fluid rounded-circle mb-3" width="35" height="35">
                    @else
                        <img src="https://cdn-icons-png.flaticon.com/512/456/456283.png" alt="Profile Picture" class="img-fluid rounded-circle mb-3" width="35" height="35">
                    @endif
                    <div class="ms-3">
                        <a class="card-title text-decoration-none h4" 
                            href="{{ auth()->check() && $post->user->id === auth()->user()->id ? route('profile.show') : route('profile.index', $post->user) }}" 
                            style="color: #388087;">
                            {{ $post->user->display_name }}
                        </a>
                        <p class="text-secondary small text-xs opacity-75">
                            <i>{{ $post->updated_at->setTimezone('Asia/Manila')->format('j M Y \a\t g:ia') }}</i>
                        </p>
                    </div>
                </div>
                <p class="card-text" style="font-size: 20px;">{{ $post->content }}</p>
                @if ($post->image)
                    <img src="{{ asset('/storage/images/'.$post->image) }}" alt="Post Image" class="img-fluid" style="max-width: 100%; height: auto;">
                @endif
                <span class="comment-count">
                    {{ $post->commentCount() === 0 ? '' : $post->commentCount() . ' ' . ($post->commentCount() === 1 ? 'Comment' : 'Comments') }}
                </span>
            </div>
            <div class="card-footer align-items-center justify-content-between" style="border-top: 1px solid #388087; background-color: #f6f6f2;">
                <form id="comment-form" action="{{ route('comments.store',$post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex mt-2">
                        <textarea name="content" class="fs-6 form-control" rows="1" maxlength="140" placeholder="Add your comment"></textarea>
                        <button onclick="preventMultipleSubmissions('comment-button')" id="comment-button" type="submit" class="btn" style="font-size: 20px; color: #388087;">
                            <i class="bi bi-send"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        @foreach($post->comments as $comment)
        <div class="card shadow-sm mb-2" style="max-width: 45rem; margin: 0 auto; border: 1px solid #388087">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <div class="d-flex align-items-center">
                        <img src="{{ $comment->user->profileInformation && $comment->user->profileInformation->image ? 
                        asset('/storage/images/' . $comment->user->profileInformation->image) : 'https://cdn-icons-png.flaticon.com/512/456/456283.png' }}" 
                        alt="Profile Picture" 
                        class="img-fluid rounded-circle mb-3" 
                        width="35" height="35">
                    <div class="ms-3">
                        <a class="card-title text-decoration-none h4" 
                            href="{{ auth()->check() && $comment->user->id === auth()->user()->id ? route('profile.show') : route('profile.index', $comment->user) }}" 
                            style="color: #388087;">
                            {{ $comment->user->full_name }}
                        </a>
                        <p class="text-secondary small text-xs opacity-75">
                            <i>{{ $comment->updated_at->setTimezone('Asia/Manila')->format('j M Y \a\t g:ia') }}</i>
                        </p>
                    </div>
                </div>
                    <p class="card-text" style="font-size: 17px;">{{ $comment->content }}</p>
                </div>
                <div>
                    @if(Auth::check() && $comment->user_id === Auth::user()->id)
                        <a class="btn btn-sm" href="{{ route('comments.edit', $comment->id) }}" style="font-size: 20px; color: #388087;">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <button type="button" class="btn btn-sm delete-button" data-id="{{ $comment->id }}" data-type="comment" style="font-size: 20px; color: #388087;">
                            <i class="bi bi-trash"></i>
                        </button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

@include('modal.delete-confirmation')
