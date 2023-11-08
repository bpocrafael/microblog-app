<div class="container">
    @foreach ($posts as $post)
        <div class="card mt-2 col-md-7 mx-auto" style="background-color: #FAF9F6; border: 1px solid #388087;">
            <div class="card-header d-flex justify-content-end" style="border-bottom: 1px solid #388087;">
                @if($post->user_id === auth()->id())
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm" style="font-size: 20px; color: #388087;">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <button type="button" class="btn delete-button btn-sm" style="font-size: 20px; color: #388087;" data-id="{{ $post->id }}" data-type="post" data-bs-toggle="modal">
                        <i class="bi bi-trash"></i>
                    </button>
                @endif
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-sm" style="font-size: 20px; color: #388087;">
                    <i class="bi bi-eye"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/456/456283.png" alt="{{ $post->user->name }} Profile Picture" class="rounded-circle mb-3" width="35" height="35">
                    <div class="ms-3">
                        @if (auth()->check() && $post->user->id === auth()->user()->id)
                            <a class="card-title text-decoration-none h4" href="{{ route('profile.show') }}" style="color: #388087;">
                                {{ $post->user->full_name }}
                            </a>
                        @else
                            <a class="card-title text-decoration-none h4" href="{{ route('profile.index', $post->user) }}" style="color: #388087;">
                                {{ $post->user->full_name }}
                            </a>
                        @endif
                        <p class="text-secondary small text-xs opacity-75">
                            <i>{{ $post->updated_at->setTimezone('Asia/Manila')->format('j M Y \a\t g:ia') }}</i>
                        </p>
                    </div>
                </div>
                <p class="card-text" style="font-size: 18px; color: #388087;">{{ $post->content }}</p>
                @if ($post->image)
                    <img height="250px" width="150px" src="{{ asset('/storage/images/'.$post->image) }}" alt="Post Image" class="img-fluid">
                @endif
                @if ($post->original_post_id)
                    @if ($originalPost = $post->originalPost)
                    <div class="d-flex justify-content-center align-items-center border" style="background-color: #FFFFFF;">
                        <div class="card-body">
                        <h4 class="card-text" style="color: #388087;">{{ $originalPost->user->full_name }}</h4>
                        <p class="card-text" style="font-size: 18px; color: #388087;">{{ $originalPost->content }}</p>
                        @if ($originalPost->image)
                            <img height="250px" width="150px" src="{{ asset('/storage/images/'.$originalPost->image) }}" alt="Original Post Image" class="img-fluid">
                        @endif
                        </div>
                    </div>
                    @endif
                @endif
                <div class="d-flex justify-content-between align-items-center">    
                    <div>
                        <span class="like-count text-muted small" data-post-id="{{ $post->id }}">
                            {{ $post->likes->count() === 0 ? '' : $post->likes->count() . ' ' . ($post->likes->count() === 1 ? 'Like' : 'Likes') }}
                        </span>
                        <span class="comment-count text-muted small ms-1">
                            {{ $post->commentCount() === 0 ? '' : $post->commentCount() . ' ' . ($post->commentCount() === 1 ? 'Comment' : 'Comments') }}
                        </span>
                    </div>
                    <div>                
                        <span class="share-count text-muted small">
                        {{ $post->shareCount() === 0 ? '' : $post->shareCount() . ' ' . ($post->shareCount() === 1 ? 'Share' : 'Shares') }}
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center" style="border-top: 1px solid #388087;">
                <div class="interaction mt-1">
                    <button class="btn btn-sm like-button" data-post-id="{{ $post->id }}" data-initial-likes="{{ $post->likes->count() }}" style="background-color: #c2edce;">
                        @if ($post->isLikedBy(auth()->user()))
                            <i class="bi bi-hand-thumbs-down"></i> Unlike
                        @else
                            <i class="bi bi-hand-thumbs-up"></i> Like
                        @endif
                    </button>
                    <a href="{{ route('comments.index', $post->id) }}" class="btn btn-sm comment" style="background-color: #badfe7;">
                        <i class="bi bi-chat-dots"></i> Comment
                    </a>
                </div>
                <div>
                    <a href="{{ route('share.index', ['post' => $post]) }}" class="btn btn-sm share" style="background-color: #f48882;">
                        <i class="bi bi-arrow-90deg-right"></i> Share
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@include('modal.delete-confirmation')
