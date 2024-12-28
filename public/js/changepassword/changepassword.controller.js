import changePasswordService from "./changepassword.service.js";

$(document).ready(function () {
    const changepasswordservice = new changePasswordService()

    function validation() {
        $('#formTambah').validate({
            rules: {
                password: {
                    password: true
                },
                passwordold: {
                    required: true,
                    // passwordold: true
                },
                password: {
                    required: true
                },
                password_confirmation: {
                    password_confirmation: true,
                }
            },
            messages: {
                password: {
                    password: "password tidak boleh kosong"
                },
                passwordold: {
                    required: "password lama tidak boleh kosong",
                    // passwordold: "password lama tidak cocok"
                },
                password: {
                    required: "password tidak boleh kosong"
                },
                password_confirmation: {
                    password_confirmation: "Password harus sama",
                },
            },
            highlight: function (element) {
                $(element).closest('.form-control').removeClass('is-valid').addClass('is-invalid');
            },
            success: function (label, element) {
                $(label).closest('.form-control').removeClass('is-invalid').addClass('is-valid');
                $(element).removeClass('is-invalid').addClass('is-valid');
            },
            errorPlacement: function (error, element) {
                error.addClass('text-danger');

                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else {
                    error.insertAfter(element);
                }
            }
        });
    }

    validation()

    $('#passwordold').on('input', function () {
            console.log($('#passwordold').length);
        $(this).valid()
    })

    $('#password_confirmation, #password').on('change', function () {
        $(this).valid()
    })

    $("#formTambah").submit(function (e) {
        e.preventDefault();
        changepasswordservice.createData(e)
    })
});
