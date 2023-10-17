function handleFormSubmission(formId, buttonId) {
    $(document).ready(function () {
        $(buttonId).click(function (event) {
            event.preventDefault();
            $(this).prop('disabled', true);
            $(formId).trigger('submit');
        });
    });
}
