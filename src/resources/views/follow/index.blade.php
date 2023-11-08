<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col col-md-9 col-lg-7 col-xl-5 mt-2 mb-2">
            <div class="card" style="border-radius: 15px; background-color: #2190AE;">
                <div class="card-body p-4">
                    <div class="d-flex text-black">
                        <div class="flex-shrink-0">
                            @if (auth()->user()->profileInformation && auth()->user()->profileInformation->image)
                                <img src="{{ asset('/storage/images/' . auth()->user()->profileInformation->image) }}" alt="Profile Picture" class="img-fluid" style="width: 180px; border-radius: 10px;">
                            @else
                                <img src="https://cdn-icons-png.flaticon.com/512/456/456283.png" alt="Profile Picture" class="img-fluid" style="width: 180px; border-radius: 10px;">
                            @endif
                        </div>
                        <div class="flex-grow-1 ms-3">
                            @auth
                                @if (auth()->user()->profileInformation)
                                    <h5 class="user-name">
                                        {{ auth()->user()->full_name }}
                                    </h5>
                                @else
                                    <h5>{{ auth()->user()->name }}</h5>
                                @endif
                            @endauth
                            <p class="small user-email mb-2 pb-1" style="color: #2b2a2a;">{{ auth()->user()->email }}</p>
                            <div>
                                @auth
                                @if (auth()->user()->profileInformation)
                                    <p class="text-muted mb-3">{{ auth()->user()->profileInformation->about ? ' ' . auth()->user()->profileInformation->about : ''  }}</p>
                                @else
                                    <p class="text-muted mb-3">Bio not available.</p>
                                @endif
                            @endauth
                            </div>
                            <div class="d-flex pt-1">
                                <button type="button" class="btn btn-outline-light me-1 flex-grow-1" data-bs-toggle="modal" data-bs-target="#followersModal">Followers</button>
                                <button type="button" class="btn btn-outline-light me-1 flex-grow-1" data-bs-toggle="modal" data-bs-target="#followingModal">Following</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
