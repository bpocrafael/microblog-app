@extends('layouts.app')

@section('content')
    @include('layouts.navbar')

    <div class="container-sm mt-5">
        <div class="card shadow mx-auto" style="background-color: #FAF9F6; width: 40rem;">
            <div class="card-body">
                <h4 class="card-title">{{ auth()->user()->name }}</h4>
                <form method="POST" action="{{ route('share.store') }}">
                    @csrf
                    <input type="hidden" name="original_post_id" value="{{ $post->id }}">
                    <div class="form-group">
                        <textarea name="content" style="background-color: #FAF9F6;" class="form-control border-0 outline-0" id="content" placeholder="Add your caption here" maxlength="140"></textarea>
                    </div>
                    <div class="d-flex justify-content-center align-items-center mb-3 mt-3 border" style="background-color: #FFFFFF;">
                        <div class="card-body">
                            @if ($originalPost)
                                <h4 class="card-title">{{ $originalPost->user->name }}</h4>
                                <p class="card-text" style="font-size: 20px;">{{ $originalPost->content }}</p>
                                @if ($originalPost->image)
                                    <img height="250px" width="150px" src="{{ asset('/storage/images/'.$originalPost->image) }}" alt="Original Post Image" class="img-fluid">
                                @endif
                            @else
                                <h4 class="card-title">{{ $post->user->name }}</h4>
                                <p class="card-text" style="font-size: 20px;">{{ $post->content }}</p>
                                @if ($post->image)
                                    <img height="250px" width="150px" src="{{ asset('/storage/images/'.$post->image) }}" alt="Post Image" class="img-fluid">
                                @endif
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Share</button>
                </form>
            </div>
        </div>
    </div>
@endsection
