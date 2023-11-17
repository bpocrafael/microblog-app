@extends('layouts.app')

@section('content')

    @include('layouts.navbar')
    @include('post.create')

    <div class="row mt-4" id="app" data-endpoint="{{ route('user.home') }}">
        <div class="col-sm-10 mx-auto" id="data-wrapper">
            @include('post.index')
            <div class="card-footer">
                <div class="d-flex mt-2 justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>                
        </div>
        {{-- <div class="loader text-center mt-2" style="color: #6fb3b8;">
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection
