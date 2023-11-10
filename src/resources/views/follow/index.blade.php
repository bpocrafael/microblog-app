<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="flex-shrink-0 mt-4 text-center">
            <img src="{{ auth()->user()->profileInformation && auth()->user()->profileInformation->image ? asset('/storage/images/' . auth()->user()->profileInformation->image) : 'https://cdn-icons-png.flaticon.com/512/456/456283.png' }}" 
            alt="Profile Picture" 
            class="img-fluid rounded-circle mb-3" 
            width="150" height="150">
        </div>
        <div class="flex-grow-1 mt-2">
            @auth
            <div class="d-flex justify-content-center">
                <h3 class="user-name text-center" style="color: #388087;">
                    {{ auth()->user()->profileInformation ? auth()->user()->full_name : auth()->user()->name }}
                </h3>
                <a class="btn btn-sm mt-{{ auth()->user()->profileInformation ? '0' : '1' }}" href="{{ route('profile-info.create') }}" style="font-size: 20px; color: #388087;">
                    <i class="bi bi-pencil-square"></i>
                </a>
            </div>
            <div>
                <p class="text-muted mb-3 text-center {{ auth()->user()->profileInformation ? 'text-center' : '' }}">
                    {{ auth()->user()->profileInformation ? (auth()->user()->profileInformation->about ? ' ' . auth()->user()->profileInformation->about : '') : 'Bio not available.' }}
                </p>
                               
            @endauth
            </div>
            <div class="d-flex pt-1 justify-content-center">
                <button type="button" class="btn me-1" data-bs-toggle="modal" data-bs-target="#followersModal" style="color: #388087; border-color: #388087;">Followers</button>
                <button type="button" class="btn me-1" data-bs-toggle="modal" data-bs-target="#followingModal" style="color: #388087; border-color: #388087;">Following</button>
            </div>
        </div>
    </div>
</div>
