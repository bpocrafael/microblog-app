@extends('layouts.app')

@section('content')

    @include('layouts.navbar')
    
    <div class="container mt-5">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100 border border-dark shadow">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar mb-3">
                                    <img src="https://cdn-icons-png.flaticon.com/512/456/456283.png" alt="Profile Picture" height="250px" width="250px">
                                </div>
                                <h5 class="user-name">Full Name</h5>
                                <h6 class="user-email">Email@email.com</h6>
                            </div>
                            <div class="about">
                                <h5 class="mb-2 text-primary">About</h5>
                                <p>Short bio about the user.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100 border border-dark shadow">
                    <div class="card-body">
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h6 class="mb-3 text-primary">Personal Details</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="fullName">First Name</label>
                                    <input type="text" class="form-control" id="firstname" placeholder="Enter your first name">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Middle Name</label>
                                    <input type="text" class="form-control" id="middlename" placeholder="Enter your middle name">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="phone">Surname</label>
                                    <input type="text" class="form-control" id="surname" placeholder="Enter your surname">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="eMail">Username</label>
                                    <input type="username" class="form-control" id="username" placeholder="Enter your username">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="website">About</label>
                                    <textarea class="form-control" id="about" placeholder="Enter anything about you" rows="3" maxlength="140"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-4">
                                <h6 class="mb-3 text-primary">Account Information</h6>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="Email">Email</label>
                                    <input type="name" class="form-control" id="email" placeholder="Enter your email">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label for="Password">Password</label>
                                    <input type="name" class="form-control" id="password" placeholder="Enter your password">
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                <label for="profile_pic">Profile Picture</label>
                                <input type="file" class="form-control" id="profile_pic" name="profile_pic">
                            </div>
                        </div>
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                                <div class="d-flex justify-content-end">
                                    <button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
                                    <button type="button" id="submit" name="submit" class="btn btn-primary" style="margin-left: 10px;">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
@endsection
