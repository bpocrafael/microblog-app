@extends('layout.app')

@section('content')

    @include('layout.navbar')

    <div class="container my-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header" style="background-color: #023047">
                        <h5 class="my-2 text-light">Edit Post</h5>
                    </div>
                    <div class="card-body" style="background-color: #EAF2F8">
                        <form method="POST" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <textarea class="form-control" id="content" name="content" rows="5" maxlength="140">{{ $post->content }}</textarea>
                            </div>
                            <div class="form-group mt-3">
                                <input type="file" class="form-control-file" id="image" name="image">
                                @if ($post->image)
                                    <p class="mt-3">Current Image:</p>
                                    <img src="{{ asset('/storage/images/' . $post->image) }}" alt="Current Image" class="img-thumbnail" width="200">
                                @endif
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-end mt-2">
                                <button type="submit" class="btn text-white" style="background-color: #023047">Update Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
