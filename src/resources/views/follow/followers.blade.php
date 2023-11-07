<div class="modal fade" id="followersModal" tabindex="-1" aria-labelledby="followersModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #f6f6f2; border-bottom: 5px solid #388087;">
                <h5 class="modal-title" id="followersModalLabel" style="color: #388087;">Followers</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-color: #f6f6f2;">
                <ul class="list-group">
                    @foreach ($user->followers as $follower)
                        @if (Auth::user() && $follower->id !== Auth::user()->id)
                            <li class="list-group-item d-flex justify-content-between align-items-center" style="color: #388087;">
                                <span>{{ $follower->name }}</span>
                                @if ($userFollowService->isFollowingExist(Auth::user(), $follower))
                                    <button class="toggle-button btn btn-danger btn-sm mt-2" data-user="{{ $follower->id }}" data-action="unfollow">Unfollow</button>
                                @else
                                    <button class="toggle-button btn btn-primary btn-sm mt-2" data-user="{{ $follower->id }}" data-action="follow">Follow</button>
                                @endif
                            </li>
                        @else
                            <li class="list-group-item" style="color: #388087;">
                                <span>{{ $follower->name }}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            
        </div>
    </div>
</div>
