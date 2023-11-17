<div class="modal fade" id="followingModal" tabindex="-1" aria-labelledby="followingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #f6f6f2; border-bottom: 5px solid #388087;">
                <h5 class="modal-title" id="followingModalLabel" style="color: #388087;">Following</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-color: #f6f6f2;">
                <ul class="list-group">
                    @foreach ($user->followings as $following)
                        @if (Auth::user() && $following->id !== Auth::user()->id)
                            <li class="list-group-item d-flex justify-content-between align-items-center" style="color: #388087;">
                                <div>
                                    <img src="{{ $following->profileInformation && $following->profileInformation->image ? asset('/storage/images/' . $following->profileInformation->image) : 'https://cdn-icons-png.flaticon.com/512/456/456283.png' }}" 
                                    alt="Profile Picture" 
                                    class="img-fluid rounded-circle" 
                                    width="35" height="35">
                                    <a href="{{ route('profile.index', ['user' => $following->id]) }}" class="text-decoration-none" style="color: #388087;">{{ $following->display_name }}</a>
                                </div>
                                <button class="toggle-button btn btn-{{ $userFollowService->isFollowingExist(Auth::user(), $following) ? 'danger' : 'primary' }} btn-sm mt-2" 
                                        data-user="{{ $following->id }}" 
                                        data-action="{{ $userFollowService->isFollowingExist(Auth::user(), $following) ? 'unfollow' : 'follow' }}">
                                    {{ $userFollowService->isFollowingExist(Auth::user(), $following) ? 'Unfollow' : 'Follow' }}
                                </button>
                            </li>
                        @else
                            <li class="list-group-item" style="color: #388087;">
                                <img src="{{ $following->profileInformation && $following->profileInformation->image ? asset('/storage/images/' . $following->profileInformation->image) : 'https://cdn-icons-png.flaticon.com/512/456/456283.png' }}" 
                                alt="Profile Picture" 
                                class="img-fluid rounded-circle" 
                                width="35" height="35">
                                <a href="{{ route('profile.show', ['user' => $following->id]) }}" class="text-decoration-none" style="color: #388087;">{{ $following->display_name }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
