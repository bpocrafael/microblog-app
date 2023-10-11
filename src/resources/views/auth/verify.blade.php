@extends('layouts.app')

@section('content')
<section class="vh-100" style="background-color: #023047;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-6 col-lg-5">
                <div class="card text-white" style="border-radius: 25px; background-color: #34495E;">
                    <div class="card-header" style="border-radius: 20px; background: #FFA902;">{{ __('Verify Your Email Address') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="GET" action="{{ route('verification.resend') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email">{{ __('Enter your email') }}</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Resend Verification Email') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
