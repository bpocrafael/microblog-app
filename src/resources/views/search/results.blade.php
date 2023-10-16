@extends('layouts.app')

@section('content')
    @include('layouts.navbar')

    <div class="row mt-4">
        <div class="col-sm-10 mx-auto">
            <div class="card shadow-lg" style="border: 2px solid #2190AE">
                <div class="card-header mb-2" style="background-color: #2190AE">
                    <h2 class="my-2 text-white text-center">Search Results</h2>
                </div>

                <div class="card-body">
                    @if ($userResults->count() > 0 || $postResults->count() > 0)
                        @if ($userResults->count() > 0)
                            <h3>Users</h3>
                            <ul class="list-group">
                                @foreach ($userResults as $user)
                                    <li class="list-group-item">{{ $user->name }}</li>
                                @endforeach
                            </ul>
                        @endif

                        @if ($postResults->count() > 0)
                            <h3>Posts</h3>
                            @foreach ($postResults as $post)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">Post by {{ $post->user->name }}</h5>
                                        <p class="card-text">{{ $post->content }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @else
                        <p>No results found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
