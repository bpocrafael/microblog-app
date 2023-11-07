@extends('layouts.app')

@section('content')

    @include('layouts.navbar')
    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="card h-100 shadow-sm" style="border: 1px solid #388087;">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar mb-3 text-center">
                                    @if (auth()->user()->profileInformation && auth()->user()->profileInformation->image)
                                        <img src="{{ asset('/storage/images/' . auth()->user()->profileInformation->image) }}" alt="Profile Picture" height="250px" width="250px">
                                        <button type="button" class="btn btn-sm btn-outline-dark me-1 mt-2 col-12" data-bs-toggle="modal" data-bs-target="#deleteProfileModal">Remove Profile Picture</button>
                                    @else
                                        <img src="https://cdn-icons-png.flaticon.com/512/456/456283.png" alt="Profile Picture" height="280px" width="250px">
                                    @endif
                                </div>
                                @auth
                                    @if (auth()->user()->profileInformation)
                                        <h5 class="user-name" style="color: #388087;">
                                            {{ auth()->user()->full_name }}
                                        </h5>
                                    @else
                                        <p>No profile information available.</p>
                                    @endif
                                @endauth
                                <h6 class="user-email text-muted">{{ auth()->user()->email }}</h6>
                            </div>
                            <div class="about">
                                <h5 class="mt-4 text-muted">About</h5>
                                @auth
                                    @if (auth()->user()->profileInformation)
                                        <p>{{ auth()->user()->profileInformation->about ? ' ' . auth()->user()->profileInformation->about : ''  }}</p>
                                    @else
                                        <p>Bio not available.</p>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-6 col-lg-6 col-md-8 col-sm-6 col-12">
                <div class="card h-100 border-0">
                    <div class="card-body">
                        <h5 class="mb-3" style="color: #388087;">Personal Details</h5>
                        <form method="POST" action="{{ route('profile-info.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="firstname" style="color: #388087;">First Name</label>
                                        <input type="text" class="form-control" name="firstname" placeholder="Enter your first name" value="{{ !empty(auth()->user()->profileInformation->firstname) ? auth()->user()->profileInformation->firstname : '' }}">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="middlename" style="color: #388087;">Middle Name</label>
                                        <input type="text" class="form-control" name="middlename" placeholder="Enter your middle name" value="{{ !empty(auth()->user()->profileInformation->middlename) ? auth()->user()->profileInformation->middlename : '' }}">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="surname" style="color: #388087;">Surname</label>
                                        <input type="text" class="form-control" name="surname" placeholder="Enter your surname" value="{{ !empty(auth()->user()->profileInformation->surname) ? auth()->user()->profileInformation->surname : '' }}">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="profile_pic" style="color: #388087;">Profile Picture</label>
                                        <input type="file" class="form-control" id="profile_pic" name="profile_pic">
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="form-group">
                                        <label for="about" style="color: #388087;">About</label>
                                        <textarea class="form-control" name="about" placeholder="Enter anything about you" rows="3" maxlength="140">{{ $profileInformation->about }}</textarea>
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn text-white" style="background-color: #8d8c8a">Cancel</button>
                                        <button type="submit" class="btn text-white" style="margin-left: 10px; background-color: #44abf8;">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@include('modal.delete-profile')
