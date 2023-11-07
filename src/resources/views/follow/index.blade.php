<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="flex-shrink-0 mt-4 text-center">
            @if (auth()->user()->profileInformation && auth()->user()->profileInformation->image)
                <img src="{{ asset('/storage/images/' . auth()->user()->profileInformation->image) }}" alt="Profile Picture" class="img-fluid rounded-circle mb-3" width="150" height="150">
            @else
                <img src="https://cdn-icons-png.flaticon.com/512/456/456283.png" alt="Profile Picture" class="img-fluid rounded-circle mb-3" width="150" height="150">
            @endif
        </div>
        <div class="flex-grow-1 mt-2">
            @auth
                @if (auth()->user()->profileInformation)
                    <div class="d-flex justify-content-center">
                        <h3 class="user-name text-center" style="color: #388087;">
                            {{ auth()->user()->full_name }}
                        </h3>
                        <a class="btn btn-sm" href="{{ route('profile-info.create') }}" style="font-size: 20px; color: #388087;">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </div>
                @else
                    <div class="d-flex justify-content-center">
                        <h3 class="text-center">{{ auth()->user()->name }}</h3>
                        <a class="btn mt-1" href="{{ route('profile-info.create') }}" style="font-size: 20px; color: #388087;">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </div>
                @endif
            @endauth
            <div>
                @auth
                @if (auth()->user()->profileInformation)
                    <p class="text-muted mb-3 text-center">{{ auth()->user()->profileInformation->about ? ' ' . auth()->user()->profileInformation->about : ''  }}</p>
                @else
                    <p class="text-muted mb-3">Bio not available.</p>
                @endif
            @endauth
            </div>
            <div class="d-flex pt-1 justify-content-center">
                <button type="button" class="btn me-1" data-bs-toggle="modal" data-bs-target="#followersModal" style="color: #388087; border-color: #388087;">Followers</button>
                <button type="button" class="btn me-1" data-bs-toggle="modal" data-bs-target="#followingModal" style="color: #388087; border-color: #388087;">Following</button>
            </div>
        </div>
    </div>
</div>
