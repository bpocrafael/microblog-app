@extends('layouts.app')

@section('content')
  <section class="vh-100" style="background-color: #023047;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-7">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-2">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                  <form action="{{ route('register.store') }}" method="POST" class="mx-1 mx-md-4">
                    @csrf

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example1c">Username</label>
                        <input name="name" type="text" id="form3Example1c" class="form-control" />
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c">Email</label>

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
                        <label class="form-label" for="form3Example4c">Password</label>
                        <input name="password" type="password" id="form3Example4c" class="form-control" />
                        @error('password')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4cd">Confirm password</label>
                        <input name="password_confirmation" type="password" id="form3Example4cd" class="form-control" />
                        @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-2 mb-lg-4">
                      <button type="submit" class="btn btn-lg" style="background: #FFA902">Register</button>
                    </div>
                  </form>
                    
                  <div class="form-check d-flex justify-content-center mb-5">
                    <label class="form-check-label" for="form2Example3">
                      Already have an account? <a href="{{ route('login') }}">Login</a>  
                      Need to verify account? <a href="{{ route('verification.notice') }}">Resend</a>
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