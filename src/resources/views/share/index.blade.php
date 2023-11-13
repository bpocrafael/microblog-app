@extends('layouts.app')

@section('content')
    @include('layouts.navbar')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow" style="background-color: #FAF9F6; border: 1px solid #388087;">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ auth()->user()->profileInformation && auth()->user()->profileInformation->image ? 
                            asset('/storage/images/' . auth()->user()->profileInformation->image) : 'https://cdn-icons-png.flaticon.com/512/456/456283.png' }}" 
                            alt "Profile Picture" 
                            class="img-fluid rounded-circle" 
                            width="35" height="35">
                            <h4 class="card-title ms-2" style="color: #388087;">{{ auth()->user()->full_name }}</h4>
                        </div>
                        <form id="share-form" method="POST" action="{{ route('share.store') }}">
                            @csrf
                            <input type="hidden" name="original_post_id" value="{{ $post->id }}">
                            <div class="form-group">
                                <textarea name="content" style="background-color: #FAF9F6;" class="form-control border-0 outline-0" id="content" placeholder="Add your caption here" maxlength="140"></textarea>
                            </div>
                            <div class="d-flex justify-content-center align-items-center mb-3 mt-3 border" style="background-color: #FFFFFF;">
                                <div class="card-body">
                                    <div class="d-flex align-items-center mb-3">
                                        <img src="{{ $post->original_post_id && $originalPost && $originalPost->user->profileInformation && $originalPost->user->profileInformation->image ? 
                                        asset('/storage/images/' . $originalPost->user->profileInformation->image) : ($post->user->profileInformation && $post->user->profileInformation->image ? 
                                        asset('/storage/images/' . $post->user->profileInformation->image) : 'https://cdn-icons-png.flaticon.com/512/456/456283.png') }}" 
                                        alt="Profile Picture" 
                                        class="img-fluid rounded-circle" 
                                        width="35" 
                                        height="35">
                                        <div class="ms-2">
                                            <h4 class="card-title" style="color: #388087;">
                                                {{ $post->original_post_id && $originalPost ? $originalPost->user->full_name : $post->user->full_name }}
                                            </h4>
                                        </div>
                                    </div>
                                    <p class="card-text" style="font-size: 20px; color: #388087;">
                                        {{ $post->original_post_id && $originalPost ? $originalPost->content : ($post->original_post_id ? 'Post is unavailable' : $post->content) }}
                                    </p>                                    
                                    @if ($post->original_post_id && $originalPost && $originalPost->image)
                                        <img src="{{ asset('/storage/images/'.$originalPost->image) }}" alt="Original Post Image" width="80" height="80">
                                    @endif
                                    </div>   
                                </div>
                                @if (!$post->original_post_id || $post->originalPost)
                                    <button id="share-button" type="submit" class="btn text-white w-100" style="background-color: #388087;">
                                        Share
                                    </button>
                                @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
