<div class="modal fade" id="deleteProfileModal" tabindex="-1" role="dialog" aria-labelledby="deleteProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #f6f6f2; border-bottom: 5px solid #388087;">
                <h5 class="modal-title" id="deleteProfileModalLabel" style="color: #388087;">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="color: #388087;">
                <p>Are you sure you want to delete your profile picture? This action cannot be undone.</p>
                <div class="text-end">
                   <form method="POST" action="{{ route('profile.delete') }}">
                       @csrf
                       @method('DELETE')
                       <button type="button" class="btn" data-bs-dismiss="modal" style="color: #388087;">Cancel</button>
                       <button type="submit" class="btn" style="background-color: #388087; color: #fff;">Delete</button>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
