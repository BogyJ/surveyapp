(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })

    let password = document.querySelector(".password");
    let confirmPassword = document.querySelector(".confirm-password");

    function validatePassword(){
        if(password.value != confirmPassword.value) {
            confirmPassword.setCustomValidity("Proveri lozinke.");
        } else {
            confirmPassword.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirmPassword.onkeyup = validatePassword;
})();
