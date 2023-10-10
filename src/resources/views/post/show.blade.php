<ul class="list-group">
    @foreach ($posts as $post)
        <li class="list-group-item" style="background-color: #FFFFF0">
            <h5 class="card-title">{{ $post->user->name }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            <img src="{{ asset(''.$post->image) }}" alt="Post Image" class="img-fluid">
            <div class="interaction mt-4">
                <a href="#" class="btn btn-sm btn-primary like">Like</a>
                <a href="#" class="btn btn-sm btn-success comment">Comment</a>
                <a href="#" class="btn btn-sm btn-danger share">Share</a>
            </div>
        </li>
    @endforeach
</ul>
