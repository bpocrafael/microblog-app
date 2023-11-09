$(document).ready(function () {
    $('.delete-button').click(function (e) {
        e.preventDefault();
        const deleteButton = $(this);
        const deleteId = deleteButton.data('id');
        const deleteType = deleteButton.data('type');
        const modalId = `dModal-${deleteId}`;
        const modal = $('#dModal').clone().attr('id', modalId);

        modal.find('.confirm-delete').data('id', deleteId);
        modal.find('.confirm-delete').data('type', deleteType);

        modal.modal('show');

        modal.find('.confirm-delete').click(function () {
            const csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: `/${deleteType}s/${deleteId}`,
                type: 'POST',
                data: {
                    '_method': 'DELETE',
                    _token: csrfToken,
                },
                success: function () {
                    $(`.delete-button[data-id="${deleteId}"]`).closest('.card').remove();
                    modal.modal('hide').remove();
                    
                    if (['/comments/', '/home', '/profile/show'].some(path => window.location.pathname.includes(path))) {
                        window.location.reload();
                    }
                                    
                },
                error: function () {
                    modal.modal('hide').remove();
                },
            });
        });
    });
});
