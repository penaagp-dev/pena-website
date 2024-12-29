import changePasswordService from "./changepassword.service.js";

$(document).ready(function () {
    const changepasswordservice = new changePasswordService()

    function validation() {
        $('#formTambah').validate({
            rules: {
                password: {
                    required: true
                },
                passwordold: {
                    required: true,
                    // passwordold: true
                },
                password_confirmation: {
                    required: true,
                }
            },
            messages: {
                password: {
                    required: "password tidak boleh kosong"
                },
                passwordold: {
                    required: "password lama tidak boleh kosong",
                    // passwordold: "password lama tidak cocok"
                },
                password_confirmation: {
                    required: "Password harus sama",
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

    // $('#passwordold').on('input', function () {
    //         console.log($('#passwordold').length);
    //     $(this).valid()
    // })

    $(document).on('input', '#password_confirmation, #password, #passwordold', function () {
        $(this).valid()
    })

    $('#password_confirmation, #password').on('change', function () {
        $(this).valid()
    })

    $("#formTambah").submit(function (e) {
        e.preventDefault();
        changepasswordservice.createData(e)
    })

    $('#formTambah').on('reset', function () {
        $('#password_confirmation').removeClass('is-valid').removeClass('is-invalid ')
        $('#password').removeClass('is-valid').removeClass('is-invalid ')
        $('#passwordold').removeClass('is-valid').removeClass('is-invalid ')
    })
});
