$('.toggle-button').click(function() {
    const userId = $(this).data('user');
    const button = $(this);
    const csrfToken = $('meta[name="csrf-token"]').attr('content');
    const isUserFollowed = button.hasClass('btn-danger');

    const action = isUserFollowed ? 'unfollow' : 'follow';
    const url = `/users/${userId}/${action}`;

    $.ajax({
        type: 'POST',
        url: url,
        data: {
            _token: csrfToken,
        },
        success: function() {
            button.text(isUserFollowed ? 'Follow' : 'Unfollow');
            button.toggleClass('btn-primary btn-danger');

            if (window.location.pathname === `/profile/${userId}`) {
                window.location.reload();
            }
        }
    });
});
