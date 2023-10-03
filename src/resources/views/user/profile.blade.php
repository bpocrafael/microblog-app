@extends('layout.app')
@extends('layout.navbar')

@section('content')

    <div class="container my-4">
        <div class="card">
            <div class="card-header" style="background-color: #2190AE">
                <h5 class="my-2 text-light">Create your Post</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-2">
                        <textarea class="form-control" id="post_content" name="post_content" rows="3" columns="3" maxlength="140"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control-file" id="post_image" name="post_image">
                    </div>
                    @if(session('image-preview'))
                    <div class="form-group">
                        <label>Image Preview:</label>
                        <img src="{{ session('image-preview') }}" alt="Image Preview" class="img-thumbnail" width="200">
                    </div>
                    @endif
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn text-white" style="background-color: #023047">Create Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="card">
            <div class="card-header" style="background-color: #FFA903">
                <h3 class="my-2 text-white">Your Posts</h3>
            </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <h5 class="card-title">User Name</h5>
                        <p class="card-text">Sample1 post of the User</p>
                        <img src="" alt="Post Image" class="img-fluid">
                        <div class="interaction mt-4">
                            <a href="#" class="btn btn-sm btn-primary like">Like</a>
                            <a href="#" class="btn btn-sm btn-secondary comment">Comment</a>
                            <a href="#" class="btn btn-sm btn-info share">Share</a>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <h5 class="card-title">User Name</h5>
                        <p class="card-text">Sample2 post of the User</p>
                        <img src="" alt="Post Image" class="img-fluid">
                        <div class="interaction mt-4">
                            <a href="#" class="btn btn-sm btn-primary like">Like</a>
                            <a href="#" class="btn btn-sm btn-secondary comment">Comment</a>
                            <a href="#" class="btn btn-sm btn-info share">Share</a>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <h5 class="card-title">User Name</h5>
                        <p class="card-text">Sample3 post of the User</p>
                        <img src="" alt="Post Image" class="img-fluid">
                        <div class="interaction mt-4">
                            <a href="#" class="btn btn-sm btn-primary like">Like</a>
                            <a href="#" class="btn btn-sm btn-secondary comment">Comment</a>
                            <a href="#" class="btn btn-sm btn-info share">Share</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
