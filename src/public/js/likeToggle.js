    document.addEventListener('DOMContentLoaded', function () {
    const likeForms = document.querySelectorAll('.like-form');
    const unlikeForms = document.querySelectorAll('.unlike-form');

    likeForms.forEach(function (likeForm) {
        likeForm.addEventListener('submit', function (e) {
            e.preventDefault(); // Prevent the default form submission
            likeForm.querySelector('.like').classList.add('d-none');
            likeForm.nextElementSibling.querySelector('.unlike').classList.remove('d-none');

            fetch(likeForm.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': likeForm.querySelector('input[name="_token"]').value,
                },
            });
        });
    });

    unlikeForms.forEach(function (unlikeForm) {
        unlikeForm.addEventListener('submit', function (e) {
            e.preventDefault(); 
            unlikeForm.querySelector('.unlike').classList.add('d-none');
            unlikeForm.previousElementSibling.querySelector('.like').classList.remove('d-none');

            fetch(unlikeForm.action, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': unlikeForm.querySelector('input[name="_token"]').value,
                },
            });
        });
    });
});
