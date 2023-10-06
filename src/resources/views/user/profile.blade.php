@extends('layout.app')

@section('content')

    @include('layout.navbar')
    @include('post.create')

    <div class="col-sm-4">
        <div class="card border border-info shadow">
            <div class="card-header" style="background-color: #2190AE">
                <h5 class="my-2 text-white">ABOUT YOU</h5>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                  <p class="card-text">Sample text about user</p>
                </div>
              </div>        
        </div>
    </div>

    <div class="container my-4">
        <div class="card shadow">
            <div class="card-header" style="background-color: #2190AE">
                <h3 class="my-2 text-white">Your Posts</h3>
            </div>
            <ul class="list-group">
                <li class="list-group-item" style="background-color: #FFFFF0">
                    <h5 class="card-title">User Name</h5>
                    <p class="card-text"></p>
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
@endsection
