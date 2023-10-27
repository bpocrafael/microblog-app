$(document).ready(function () {
    $('.like-button').on('click', function () {
        const post_id = $(this).data('post-id');
        const button = $(this);
        const likeCountElement = $(`.like-count[data-post-id="${post_id}"]`);
        const initialLikes = parseInt(button.data('initial-likes'));
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            url: `/posts/${post_id}/like`,
            data: {
                _token: csrfToken,
                post_id: post_id
            },
            success: function (response) {
                button.text(response.liked ? 'Unlike' : 'Like');
                button.data('liked', response.liked);

                const updatedLikes = response.liked ? initialLikes + 1 : initialLikes - 1;
                button.data('initial-likes', updatedLikes);

                const likeText = updatedLikes === 1 ? ' Like' : ' Likes';
                likeCountElement.text(updatedLikes + likeText).toggle(updatedLikes > 0);
            }
        });
    });
});
