@extends('layouts.app')

@section('content')

    @include('layouts.navbar')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow" style="border: 1px solid #388087;">
                    <div class="card-header" style="background-color: #f6f6f2; border-bottom: 1px solid #388087;">
                        <h5 class="my-2 text-center text-uppercase" style="color: #388087;">
                            Edit Comment
                        </h5>
                    </div>
                    <div class="card-body" style="background-color: #f6f6f2">
                        <form method="POST" action="{{ route('comments.update', $comment->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <textarea class="form-control" id="content" name="content" rows="3" maxlength="140" style="border: 1px solid #388087;">{{ $comment->content }}</textarea>
                            </div>
                            <p id="char-count-message" style="color: #f48882; display: none;">You've reached the limit.</p>
                            <div class="d-grid gap-2 d-md-flex justify-content-end mt-2">
                                <button type="submit" class="btn text-white" style="background-color: #388087; font-size: 15px">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
