@extends('layouts.app')

@section('content')
  <section class="vh-100" style="background-color: #F0F2F5;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-7">
          <div class="card" style="border-radius: 25px; border: 2px solid #388087;">
            <div class="card-body p-md-1">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4" style="color: #388087;">Sign up</p>

                  <form id="register-form" action="{{ route('register.store') }}" method="POST" class="mx-1 mx-md-4">
                    @csrf

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c" style="color: #388087;">Username</label>
                        <input name="name" type="text" id="form3Example1c" class="form-control" />
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c" style="color: #388087;">Email</label>

                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" 
                        name="email" value="{{ old('email') }}" placeholder="" autocomplete="email">
                        
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c" style="color: #388087;">Password</label>
                        <input name="password" type="password" id="form3Example4c" class="form-control" />
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4cd" style="color: #388087;">Confirm password</label>
                        <input name="password_confirmation" type="password" id="form3Example4cd" class="form-control" />
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-2 mb-lg-4">
                      <button onclick="registerSubmit()" id="register-button" type="button" class="btn btn-lg text-white" style="background-color: #6fb3b8;">Register</button>
                    </div>
                  </form>
                    
                  <div class="form-check d-flex justify-content-center mb-5">
                    <label class="form-check-label" for="form2Example3" style="color: #388087;">
                      Already have an account? <a href="{{ route('login') }}" style="text-decoration: none; color: #6fb3b8">Login</a>  
                    </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
