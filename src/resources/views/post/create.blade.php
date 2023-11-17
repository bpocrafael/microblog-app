<div class="container my-4">
    <div class="row">
      <div class="col-md-7 mx-auto">
        <div class="card shadow-sm">
            <div class="card-body" style="background-color: #f6f6f2">
                <form id="create-form" method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mt-2">
                        <textarea class="form-control" style="border: 1px solid #388087;" id="content" name="content" rows="5" maxlength="140" placeholder="What's on your mind today?"></textarea>
                    </div>
                    <p id="char-count-message" style="color: #f48882; display: none;">You've reached the limit.</p>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <input type="file" class="form-control-file me-2" id="image" name="image">
                        <button onclick="preventMultipleSubmissions('create-button')" id="create-button" type="submit" class="btn text-white justify-content-end" style="background-color: #388087; font-size: 12px">Add Post</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
</div>
