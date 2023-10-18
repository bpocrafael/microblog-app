<div class="modal fade" id="followingModal" tabindex="-1" aria-labelledby="followingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="followingModalLabel">Following</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    @foreach ($user->followings as $following)
                        @if (Auth::user() && $following->id !== Auth::user()->id)
                            <form method="POST" action="{{ $userFollowService->isFollowingExist(Auth::user(), $following) ? route('users.unfollow', $following->id) : route('users.follow', $following->id) }}">
                                @csrf
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $following->name }}</span>
                                    <button type="submit" class="btn btn-{{ $userFollowService->isFollowingExist(Auth::user(), $following) ? 'danger' : 'primary' }}">
                                        {{ $userFollowService->isFollowingExist(Auth::user(), $following) ? 'Unfollow' : 'Follow' }}
                                    </button>
                                </li>
                            </form>
                        @else
                            <li class="list-group-item mb-3">
                                <span>{{ $following->name }}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
