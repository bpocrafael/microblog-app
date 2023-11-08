@extends('layouts.app')

@section('content')
<section class="vh-100" style="background-color: #388087;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-6 col-lg-5">
                <div class="card text-white" style="border-radius: 15px; background-color: #f6f6f2;">
                    <div class="card-header text-center text-uppercase" style="color: #388087; border-bottom: 3px solid #388087">{{ __('Verify Your Email Address') }}</div>

                    <div class="card-body" style="color: #388087;">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},

                        @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                        @enderror

                        <form class="d-inline" method="GET" action="{{ route('verification.resend') }}">
                            @csrf
                            <div class="form-group mt-3">
                                <label for="email">{{ __('Enter your email') }}</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="text-center">
                            <button type="submit" class="btn text-white mt-3 col-12" style="background-color: #388087;">{{ __('Resend Verification Email') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
