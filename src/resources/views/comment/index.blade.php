@extends('layouts.app')

@section('content')

    @include('layouts.navbar')
    
    <div class="container-sm mt-3">
        <div class="card shadow" style="background-color: #FAF9F6; width: 50rem;">
            <div class="card-body">
                <h3 class="card-title">{{ $post->user->name }}</h3>
                <p class="text-secondary small text-xs opacity-75">
                    <i>{{ $post->updated_at->setTimezone('Asia/Manila')->format('j M Y \a\t g:ia') }}</i>
                </p>
                <p class="card-text" style="font-size: 20px;">{{ $post->content }}</p>
                @if ($post->image)
                    <img height="250px" width="150px" src="{{ asset('/storage/images/'.$post->image) }}" alt="Post Image" class="img-fluid">
                @endif
            </div>
            <div class="card-footer align-items-center">
                <form action="{{ route('comments.store',$post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="mb-2" style="width: 48rem;">
                    <textarea name="content" class="fs-6 form-control" rows="1"></textarea>
                </div>
                <div>
                    <button href="#" type="submit" class="btn btn-sm btn-secondary">Post Comment</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        @foreach($post->comments as $comment)
        <div class="card shadow-sm mb-2" style="width: 50rem; margin-left:30px">
            <div class="card-body d-flex justify-content-between">
                <div>
                    <h4 class="card-title">{{ $comment->user->name }}</h4>
                    <p class="text-secondary small text-xs opacity-75">
                        <i>{{ $comment->updated_at->setTimezone('Asia/Manila')->format('j M Y \a\t g:ia') }}</i>
                    </p>
                    <p class="card-text" style="font-size: 17px;">{{ $comment->content }}</p>
                </div>
                <div>
                    @if(Auth::check() && $comment->user_id === Auth::user()->id)
                        <a class="btn btn-sm btn-secondary" href="{{ route('comments.edit', $comment->id) }}">Edit</a>
                        <button type="button" class="btn btn-sm btn-secondary delete-button" data-id="{{ $comment->id }}" data-type="comment">Delete</button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
