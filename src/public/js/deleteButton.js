$(document).ready(function() {
    $('.delete-button').click(function(e) {
        e.preventDefault();

        const deleteButton = $(this);
        const id = deleteButton.data('id');
        const type = deleteButton.data('type');
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        if (confirm('Are you sure you want to delete this ' + type + '?')) {
            $.ajax({
                url: '/' + type + 's/' + id,
                type: 'POST',
                data: {
                    '_method': 'DELETE',
                    _token: csrfToken,
                },
                success: function() {
                    deleteButton.closest('.card').remove();
                },
                error: function() {
                    alert('An error occurred while deleting the ' + type + '.');
                }
            });
        }
    });
});
