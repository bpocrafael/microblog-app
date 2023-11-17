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
                                <div>
                                    <img src="{{ $follower->profileInformation && $follower->profileInformation->image ? asset('/storage/images/' . $follower->profileInformation->image) : 'https://cdn-icons-png.flaticon.com/512/456/456283.png' }}" 
                                    alt="Profile Picture" 
                                    class="img-fluid rounded-circle" 
                                    width="35" height="35">
                                    <a href="{{ route('profile.index', ['user' => $follower->id]) }}" class="text-decoration-none" style="color: #388087;">{{ $follower->display_name }}</a>
                                </div>
                                <button class="toggle-button btn btn-{{ $userFollowService->isFollowingExist(Auth::user(), $follower) ? 'danger' : 'primary' }} btn-sm mt-2" 
                                        data-user="{{ $follower->id }}" 
                                        data-action="{{ $userFollowService->isFollowingExist(Auth::user(), $follower) ? 'unfollow' : 'follow' }}">
                                    {{ $userFollowService->isFollowingExist(Auth::user(), $follower) ? 'Unfollow' : 'Follow' }}
                                </button>
                            </li>
                        @else
                            <li class="list-group-item" style="color: #388087;">
                                <img src="{{ $follower->profileInformation && $follower->profileInformation->image ? asset('/storage/images/' . $follower->profileInformation->image) : 'https://cdn-icons-png.flaticon.com/512/456/456283.png' }}" 
                                alt="Profile Picture" 
                                class="img-fluid rounded-circle" 
                                width="35" height="35">
                                <a href="{{ route('profile.show', ['user' => $follower->id]) }}" class="text-decoration-none" style="color: #388087;">{{ $follower->display_name }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
