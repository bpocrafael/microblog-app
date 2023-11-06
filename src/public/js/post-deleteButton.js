$(document).ready(function () {
    let deleteId = null;
    let deleteType = null;

    $('.delete-button').click(function (e) {
        e.preventDefault();
    
        const deleteButton = $(this);
        deleteId = deleteButton.data('id');
        deleteType = deleteButton.data('type');
    
        $('#dModal').modal('show');
    });
    

    $('.confirm-delete').click(function () {
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/' + deleteType + 's/' + deleteId,
            type: 'POST',
            data: {
                '_method': 'DELETE',
                _token: csrfToken,
            },
            success: function () {
                // Remove the card after successful deletion.
                $('.delete-button[data-id="' + deleteId + '"]').closest('.card').remove();
                $('#dModal').modal('hide');
            },
            error: function () {
                $('#dModal').modal('hide');
            },
        });
    });

    // Clear the deleteId and deleteType variables when the modal is hidden.
    $('#dModal').on('hidden.bs.modal', function () {
        deleteId = null;
        deleteType = null;
    });
});
