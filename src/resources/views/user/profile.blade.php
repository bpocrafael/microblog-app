@extends('layouts.app')
@extends('layouts.navbar')

@section('content')

    @include('layout.navbar')
    @include('post.create')

    <div class="col-sm-4">
        <div class="card border border-info shadow">
            <div class="card-header" style="background-color: #2190AE">
                <h5 class="my-2 text-white">ABOUT YOU</h5>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                  <p class="card-text">Sample text about user</p>
                </div>
              </div>        
        </div>
    </div>

    <div class="container my-4">
        <div class="card shadow">
            <div class="card-header mb-2" style="background-color: #2190AE">
                <h3 class="my-2 text-white">Your Posts</h3>
            </div>
            @include('post.show')
            <div class="card-footer" style="background-color: #2190AE;">
                <div class="d-flex justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div> 
            </div>
        </div>
    </div>
@endsection
