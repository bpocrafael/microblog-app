$(document).ready(function() {
    $('.like-button').on('click', function() {
        const post_id = $(this).data('post-id');
        const button = $(this);
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        const isLiked = button.text() === 'Like';

        $.ajax({
            type: 'POST',
            url: `/posts/${post_id}/like`,
            data: {
                _token: csrfToken,
                post_id: post_id
            },
            success: function(response) {
                const buttonText = isLiked ? 'Unlike' : 'Like';
                button.text(buttonText);
            }
        });
    });
});
