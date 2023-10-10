<div class="container">
    @foreach ($posts as $post)
        <div class="card mb-3" style="background-color:#FAF9F6">
            <div class="card-body">
                <h4 class="card-title">{{ $post->user->name }}</h4>
                <p class="card-text">{{ $post->content }}</p>
                @if ($post->image)
                    <img height="250px" width="150px" src="{{ asset('/storage/images/'.$post->image) }}" alt="Post Image" class="img-fluid">
                @endif
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center">
                <div class="interaction mt-1">
                    <a href="#" class="btn btn-sm btn-primary like">Like</a>
                    <a href="#" class="btn btn-sm btn-success comment">Comment</a>
                </div>
                <div>
                    <a href="#" class="btn btn-sm btn-danger share">Share</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
