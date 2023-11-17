@extends('layouts.app')

@section('content')

    @include('layouts.navbar')

    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow" style="border: 1px solid #388087;">
                    <div class="card-header" style="background-color: #f6f6f2; border-bottom: 1px solid #388087;">
                        <h5 class="my-2 text-center text-uppercase" style="color: #388087;">
                            Edit Post
                        </h5>
                    </div>
                    <div class="card-body" style="background-color: #f6f6f2">
                        <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <textarea class="form-control" style="border: 1px solid #388087;"  id="content" name="content" rows="4" maxlength="140">{{ $post->content }}</textarea>
                            </div>
                            <p id="char-count-message" style="color: #f48882; display: none;">You've reached the limit.</p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <input type="file" class="form-control-file" id="image" name="image">
                                @if ($post->image)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="delete_image" id="delete_image">
                                        <label class="form-check-label" for="delete_image">
                                            Delete Image
                                        </label>
                                    </div>
                                @endif
                                <button type="submit" class="btn text-white" style="background-color: #388087; font-size: 15px">
                                    Update
                                </button>
                            </div>
                            @if ($post->image)
                                <p class="mt-3" style="color: #388087;">Current Image:</p>
                                <img src="{{ asset('/storage/images/' . $post->image) }}" alt="Current Image" class="img-thumbnail" width="150">
                            @endif
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
