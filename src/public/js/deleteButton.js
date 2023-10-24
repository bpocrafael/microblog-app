$(document).ready(function() {
    $('.delete-button').click(function(e) {
        e.preventDefault();

        var deleteButton = $(this);
        var postID = deleteButton.data('post-id');
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        if (confirm('Are you sure you want to delete this post?')) {
            $.ajax({
                url: '/posts/' + postID,
                type: 'POST',
                data: {
                    '_method': 'DELETE',
                    _token: csrfToken,
                },
                success: function() {
                    deleteButton.closest('.card').remove();
                },
                error: function() {
                    alert('An error occurred while deleting the post.');
                }
            });
        }
    });
});
