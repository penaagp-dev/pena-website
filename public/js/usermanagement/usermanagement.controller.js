import UsermanagementService from "./usermanagement.service.js";

$(document).ready(function () {
    const Usermanagementservice = new UsermanagementService()
    Usermanagementservice.getAllData();

    function validation() {
        $('#formTambah').validate({
            rules: {
                email: {
                    required: true
                },
                role: {
                    required: true
                },
            },
            messages: {
                email: {
                    required: "Email Tidak Boleh Kosong"
                },
                role: {
                    required: "Role tidak boleh kosong"
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
                error.addClass('text-sm')
                error.insertAfter(element);
            }
        });
    }

    validation()


    $('#email').on('input', function () {
        $(this).valid()
    })
    $('#role').on('input', function () {
        $(this).valid()
    })


    function checkingEdit() {
        return $('#id').val() ? true : false
    }

    $('#formTambah').submit(function (e) {
        e.preventDefault();
        Usermanagementservice.createData(e, checkingEdit)
    })

    $(document).on('click', '.edit-modal', function () {
        const id = $(this).data('id')
        Usermanagementservice.getDataById(id, checkingEdit)
    })

    $(document).on('click', '.delete-confirm', function () {
        const id = $(this).data('id')
        Usermanagementservice.deleteData(id)
    })

    $('#userManagementModal').on('hidden.bs.modal', function () {
        $('#id').val('')
        $('#email').val('')
        $('#role').val('')
        $('#modal-title').text('Tambah Data');
        $('.form-control').removeClass('is-invalid').removeClass('is-valid')
        $('.error').remove();
        $('#preview').remove()
    })
});
