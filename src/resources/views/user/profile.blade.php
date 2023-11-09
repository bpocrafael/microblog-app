@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    @include('follow.index')
    @include('post.create')

    
    @include('follow.followers')
    @include('follow.followings')


    <div class="container my-4">
        @if ($posts->count() > 0)
            @include('post.index')
        @else
            <div class="card-body">
                <p class="card-text text-center text-muted">You have not made any posts yet.</p>
            </div>
        @endif
        <div class="d-flex mt-2 justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
