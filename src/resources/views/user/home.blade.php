@extends('layouts.app')

@section('content')

    @include('layouts.navbar')
    @include('post.create')

    <div class="row mt-4">
        <div class="col-sm-10 mx-auto">
            @include('post.index')
            <div class="card-footer">
                <div class="d-flex mt-2 justify-content-center">
                    {{ $posts->links() }}
                </div>
            </div>                
        </div>
    </div>
</div>
@endsection
