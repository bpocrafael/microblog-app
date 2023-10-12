@extends('layouts.app')

@section('content')

    @include('layouts.navbar')

    <div class="container mt-4">
        <div class="card" style="background-color: #FAF9F6; border: 2px solid #FFA903;">
            <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #FFA903">
                <div class="text-muted small">
                    Created at: {{ $post->created_at->setTimezone('Asia/Manila')->format('j M Y \a\t g:ia') }}
                </div>
                <div class="text-muted small">
                    Updated at: {{ $post->updated_at->setTimezone('Asia/Manila')->format('j M Y \a\t g:ia') }}
                </div>
            </div>
            <div class="card-body">
                <h3 class="card-title">{{ $post->user->name }}</h3>
                <p class="card-text" style="font-size: 20px;">{{ $post->content }}</p>
                @if ($post->image)
                    <img height="250px" width="150px" src="{{ asset('/storage/images/'.$post->image) }}" alt="Post Image" class="img-fluid">
                @endif
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <div class="interaction mt-1">
                    <a href="#" class="btn btn-sm btn-primary like">Like</a>
                    <a href="#" class="btn btn-sm btn-success comment">Comment</a>
                </div>
                <div>
                    <a href="#" class="btn btn-sm btn-danger share">Share</a>
                </div>
            </div>
        </div>
    </div>
@endsection
