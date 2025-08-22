import coremanagementService from "./coremanagement.service.js";

$(document).ready(function () {
    const coremanagementservice = new coremanagementService()
    coremanagementservice.getAllData();

    function validation() {
        $('#formTambah').validate({
            rules: {
                name: {
                    required: true
                },
                jabatan: {
                    required: true
                },
                photo: {
                    required: true,
                    fileExtension: true
                },
                link: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Nama tidak boleh kosong"
                },
                jabatan: {
                    required: "Jabatan tidak boleh kosong"
                },
                photo: {
                    required: "Photo tidak boleh kosong",
                    fileExtension: "Format file harus jpg, jpeg, png"
                },
                link: {
                    required: "Link tidak boleh kosong"
                }
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

    $('#photo').on('change', function () {
        let file = this.files[0]
        let reader = new FileReader()
        reader.onload = function (e) {
            generatePreviewImg('form-preview')
            $('#preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(file)
        $(this).valid()
    })

    $('#name').on('input', function () {
        $(this).valid()
    })

    $('#photo, #jabatan').on('change', function () {
        $(this).valid()
    })
    function checkingEdit() {   
        return $('#id').val() ? true : false
    }

    $('#formTambah').submit(function (e) {
        e.preventDefault();
        coremanagementservice.createData(e, checkingEdit)
    })

    $(document).on('click', '.edit-modal', function () {
        const id = $(this).data('id')
        coremanagementservice.getDataById(id, checkingEdit)
    })

    $(document).on('click', '.delete-confirm', function () {
        const id = $(this).data('id')
        coremanagementservice.deleteData(id)
    })

    $('#coreManagementModal').on('hidden.bs.modal', function () {
        $('#id').val('')
        $('#name').val('')
        $('#jabatan').val('')
        $('#photo').val('')
        $('#link').val('')
        $('#modal-title').text('Tambah Data');
        $('.form-control').removeClass('is-invalid').removeClass('is-valid')
        $('.error').remove();
        $('#preview').remove()
    })
});