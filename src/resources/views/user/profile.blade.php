@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    @include('follow.index')
    @include('post.create')

    <div class="col-sm-4">
        <div class="card border border-info shadow">
            <div class="card-header" style="background-color: #2190AE">
                <h5 class="my-2 text-white">ABOUT YOU</h5>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <p class="card-text">Sample text about the user</p>
                </div>
            </div>
        </div>
    </div>

    
    @include('follow.followers')
    @include('follow.followings')


    <div class="container my-4">
        <div class="card shadow" style="border: 2px solid #2190AE">
            <div class="card-header mb-2" style="background-color: #2190AE">
                <h3 class="my-2 text-white">Your Posts</h3>
            </div>
            @if ($posts->count() > 0)
                @include('post.index')
            @else
                <div class="card-body">
                    <p class="card-text">You have not made any posts yet.</p>
                </div>
            @endif
            <div class="card-footer" style="background-color: #2190AE;">
                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div> 
            </div>
        </div>
    </div>
@endsection
