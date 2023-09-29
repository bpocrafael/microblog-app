@extends('layout.app')
@extends('layout.navbar')

@section('content')
<div class="container my-4">
    <div class="row">
        <div class="col-sm-8">
            <div class="card border border-secondary shadow-lg">
                <div class="card-header" style="background-color: #023047">
                    <h5 class="my-2 text-light">Add your post</h5>
                </div>
                <div class="card-body" style="background-color: #EAF2F8">
                    <form method="POST" action="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-2">
                            <textarea class="form-control" id="post_content" name="post_content" rows="5" maxlength="140"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <input type="file" class="form-control-file" id="post_image" name="post_image">
                        </div>
                        @if(session('image-preview'))
                        <div class="form-group">
                            <label>Image Preview:</label>
                            <img src="{{ session('image-preview') }}" alt="Image Preview" class="img-thumbnail" width="200">
                        </div>
                        @endif
                        <div class="d-grid gap-2 d-md-flex justify-content-end mt-2">
                            <button type="submit" class="btn text-white" style="background-color: #023047">Create Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card border border-info shadow">
                <div class="card-header" style="background-color: #2190AE">
                    <h5 class="my-2 text-white">Users you may know</h5>
                </div>
                <li class="list-group-item my-2" style="background-color: #EBF5FB">
                    <div class="row align-items-center" style="padding-left: 10px;">
                        <div class="col-auto">
                            <img src="profile.jpg" alt="Profile Picture" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col">
                            <span class="text-black">Username 1</span>
                        </div>
                        <div class="col-auto" style="padding-right: 25px;">
                            <a href="#" class="btn btn-sm btn-primary like float-right">Follow</a>
                        </div>
                    </div>
                </li>
                <li class="list-group-item my-2" style="background-color: #EBF5FB">
                    <div class="row align-items-center" style="padding-left: 10px;">
                        <div class="col-auto">
                            <img src="profile.jpg" alt="Profile Picture" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col">
                            <span class="text-black">Username 2</span>
                        </div>
                        <div class="col-auto" style="padding-right: 25px;">
                            <a href="#" class="btn btn-sm btn-primary like float-right">Follow</a>
                        </div>
                    </div>
                </li>
                <li class="list-group-item my-2" style="background-color: #EBF5FB">
                    <div class="row align-items-center" style="padding-left: 10px;">
                        <div class="col-auto">
                            <img src="profile.jpg" alt="Profile Picture" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col">
                            <span class="text-black">Username 3</span>
                        </div>
                        <div class="col-auto" style="padding-right: 25px;">
                            <a href="#" class="btn btn-sm btn-primary like float-right">Follow</a>
                        </div>
                    </div>
                </li>
                <li class="list-group-item my-2" style="background-color: #EBF5FB">
                    <div class="row align-items-center" style="padding-left: 10px;">
                        <div class="col-auto">
                            <img src="profile.jpg" alt="Profile Picture" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col">
                            <span class="text-black">Username 4</span>
                        </div>
                        <div class="col-auto" style="padding-right: 25px;">
                            <a href="#" class="btn btn-sm btn-primary like float-right">Follow</a>
                        </div>
                    </div>
                </li>
                <li class="list-group-item my-2" style="background-color: #EBF5FB">
                    <div class="row align-items-center" style="padding-left: 10px;">
                        <div class="col-auto">
                            <img src="profile.jpg" alt="Profile Picture" width="40" height="40" class="rounded-circle">
                        </div>
                        <div class="col">
                            <span class="text-black">Username 5</span>
                        </div>
                        <div class="col-auto" style="padding-right: 25px;">
                            <a href="#" class="btn btn-sm btn-primary like float-right">Follow</a>
                        </div>
                    </div>
                </li>                
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-sm-10 mx-auto">
            <div class="card border border-warning shadow-lg">
                <div class="card-header" style="background-color: #FFA903">
                    <h2 class="my-2 text-white text-center">Microblog Newsfeed</h2>
                </div>
                <ul class="list-group">
                    <li class="list-group-item" style="background-color: #FFFFF0">
                        <h5 class="card-title">User Name</h5>
                        <p class="card-text">Sample1 post of the User</p>
                        <img src="" alt="Post Image" class="img-fluid">
                        <div class="interaction mt-4">
                            <a href="#" class="btn btn-sm btn-primary like">Like</a>
                            <a href="#" class="btn btn-sm btn-success comment">Comment</a>
                            <a href="#" class="btn btn-sm btn-danger share">Share</a>
                        </div>
                    </li>
                    <li class="list-group-item" style="background-color: #FFFFF0">
                        <h5 class="card-title">User Name</h5>
                        <p class="card-text">Sample2 post of the User</p>
                        <img src="" alt="Post Image" class="img-fluid">
                        <div class="interaction mt-4">
                            <a href="#" class="btn btn-sm btn-primary like">Like</a>
                            <a href="#" class="btn btn-sm btn-success comment">Comment</a>
                            <a href="#" class="btn btn-sm btn-danger share">Share</a>
                        </div>
                    </li>
                    <li class="list-group-item" style="background-color: #FFFFF0">
                        <h5 class="card-title">User Name</h5>
                        <p class="card-text">Sample3 post of the User</p>
                        <img src="" alt="Post Image" class="img-fluid">
                        <div class="interaction mt-4">
                            <a href="#" class="btn btn-sm btn-primary like">Like</a>
                            <a href="#" class="btn btn-sm btn-success comment">Comment</a>
                            <a href="#" class="btn btn-sm btn-danger share">Share</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
