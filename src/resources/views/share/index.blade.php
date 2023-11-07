@extends('layouts.app')

@section('content')
    @include('layouts.navbar')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow" style="background-color: #FAF9F6; border: 1px solid #388087;">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('path_to_user_image.jpg') }}" alt="User Image" height="35" width="35" class="img-fluid rounded-circle me-2">
                            <h4 class="card-title" style="color: #388087;">{{ auth()->user()->full_name }}</h4>
                        </div>
                        <form id="share-form" method="POST" action="{{ route('share.store') }}">
                            @csrf
                            <input type="hidden" name="original_post_id" value="{{ $post->id }}">
                            <div class="form-group">
                                <textarea name="content" style="background-color: #FAF9F6;" class="form-control border-0 outline-0" id="content" placeholder="Add your caption here" maxlength="140"></textarea>
                            </div>
                            <div class="d-flex justify-content-center align-items-center mb-3 mt-3 border" style="background-color: #FFFFFF;">
                                <div class="card-body">
                                    @if ($originalPost)
                                        <h4 class="card-title" style="color: #388087;">{{ $originalPost->user->full_name }}</h4>
                                        <p class="card-text" style="font-size: 20px; color: #388087;">{{ $originalPost->content }}</p>
                                        @if ($originalPost->image)
                                            <img src="{{ asset('/storage/images/'.$originalPost->image) }}" alt="Original Post Image" class="img-fluid">
                                        @endif
                                    @else
                                        <h4 class="card-title" style="color: #388087;">{{ $post->user->full_name }}</h4>
                                        <p class="card-text" style="font-size: 20px; color: #388087">{{ $post->content }}</p>
                                        @if ($post->image)
                                            <img src="{{ asset('/storage/images/'.$post->image) }}" alt="Post Image" class="img-fluid">
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <button id="share-button" type="submit" class="btn text-white w-100" style="background-color: #388087;">Share</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
