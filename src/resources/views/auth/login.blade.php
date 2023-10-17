@extends('layouts.app')

@section('content')
  <section class="vh-100" style="background-color: #023047;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Login</p>

                  <!-- Display errors here -->
                  @if(session('error'))
                  <div class="alert alert-danger">
                    {{ session('error') }}
                  </div>
                  @endif

                  <form id="login-form" action="{{ route('login.auth') }}" method="POST" class="mx-1 mx-md-4">
                    @csrf
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c">Email</label>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="" autofocus>
                        <!-- Display email validation errors -->
                        @error('email')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c">Password</label>
                        <input name="password" type="password" id="form3Example4c" class="form-control" />
                        <!-- Display password validation errors -->
                        @error('password')
                          <div class="text-danger">{{ $message }}</div>
                        @enderror
                        <a href="{{ route('password.request') }}">Forgot Password</a>
                      </div>
                    </div>

                    <div class="form-check d-flex justify-content-center mb-5">
                      <label class="form-check-label" for="form2Example3">
                        Don't have an account? <a href="{{ route('register.create') }}">Sign Up</a>
                      </label>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-2 mb-lg-4">
                      <button onclick="preventMultipleSubmissions('login-button')" id="login-button" type="submit" class="btn btn-lg" style="background-color: #FFA903;">Login</button>
                    </div>

                  </form>
                </div>
                <div class="col-md-8 col-lg-3 col-xl-5 d-flex align-items-center justify-content-end order-1 order-lg-2">
                  <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid mr-20" alt="Microblog" style="width: 400px; height: auto;">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
