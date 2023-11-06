<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/formSubmission.js') }}"></script>
<script src="{{ asset('js/likeToggle.js') }}"></script>
<script src="{{ asset('js/post-deleteButton.js') }}"></script>

<script>
    handleFormSubmission('#login-form', '#login-button');
    handleFormSubmission('#register-form', '#register-button');
    handleFormSubmission('#create-form', '#create-button');
    handleFormSubmission('#comment-form', '#comment-button');
</script>
