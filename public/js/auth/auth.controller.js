import authService from "./auth.service.js";


$(document).ready(function () {
    const authservice = new authService()

    function validation() {
        $('#loginForm').validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Email tidak boleh kosong",
                    email: "Format email tidak valid"
                },
                password: {
                    required: "Password tidak boleh kosong"
                }
            },
            highlight: function (element) {
                $(element).closest('.input-group').find('.form-control').removeClass('is-valid').addClass('is-invalid');
                $(element).closest('.input-group').removeClass('mb-4')
            },
            success: function (label, element) {
                $(element).closest('.input-group').find('.form-control').removeClass('is-invalid').addClass('is-valid');
                $(element).closest('.input-group').removeClass('mb-4')
            },
            errorPlacement: function (error, element) {
                error.addClass('text-danger text-sm');
                
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });
    }

    validation()

    $('#email, #password').on('input', function () {
        $(this).valid()
    })

    $("#loginForm").submit(function (e) {
        e.preventDefault();
        authservice.login(e)
    })
});