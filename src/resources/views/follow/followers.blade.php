<div class="modal fade" id="followersModal" tabindex="-1" aria-labelledby="followersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="followersModalLabel">Followers</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    @foreach ($user->followers as $follower)
                        @if (Auth::user() && $follower->id !== Auth::user()->id)
                            <form method="POST" action="{{ $userFollowService->isFollowingExist(Auth::user(), $follower) ? route('users.unfollow', $follower->id) : route('users.follow', $follower->id) }}">
                                @csrf
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span>{{ $follower->name }}</span>
                                    <button type="submit" class="btn btn-{{ $userFollowService->isFollowingExist(Auth::user(), $follower) ? 'danger' : 'primary' }}">
                                        {{ $userFollowService->isFollowingExist(Auth::user(), $follower) ? 'Unfollow' : 'Follow' }}
                                    </button>
                                </li>
                            </form>
                        @else
                            <li class="list-group-item mb-3">
                                <span>{{ $follower->name }}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
