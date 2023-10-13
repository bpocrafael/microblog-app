<div class="container my-4">
    <div class="row">
        <div class="col-sm-8">
            <div class="card border border-secondary shadow-lg">
                <div class="card-header" style="background-color: #023047">
                    <h5 class="my-2 text-light">Add your post</h5>
                </div>
                <div class="card-body" style="background-color: #EAF2F8">
                    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-2">
                            <textarea class="form-control" id="content" name="content" rows="5" maxlength="140"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                        @if(session('image-preview'))
                        <div class="form-group">
                            <label>Image Preview:</label>
                            <img src="{{ session('image-preview') }}" alt="Image Preview" class="img-thumbnail" width="200">
                        </div>
                        @endif
                        <div class="d-grid gap-2 d-md-flex justify-content-end mt-2">
                            <button type="submit" class="btn text-white" style="background-color: #023047">Create Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
