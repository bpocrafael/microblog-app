$(document).ready(function() {
    
    $('.like-button').on('click', function() {
        const post_id = $(this).data('post-id');
        const button = $(this);
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: `/posts/${post_id}/like`,
            data: {
                _token: csrfToken,
                post_id: post_id
            },
            success: function(response) {
                if (response.liked) {
                    button.text('Unlike');
                } else {
                    button.text('Like');
                }
            }
        });
    });
});
