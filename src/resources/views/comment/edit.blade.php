@extends('layouts.app')

@section('content')

    @include('layouts.navbar')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card shadow">
                    <div class="card-body" style="background-color: #EAF2F8">
                        <form method="POST" action="{{ route('comments.update', $comment->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <textarea class="form-control" id="content" name="content" rows="5" maxlength="140">{{ $comment->content }}</textarea>
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-end mt-2">
                                <button type="submit" class="btn text-white" style="background-color: #023047">Update Comment</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
