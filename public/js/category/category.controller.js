import categoryService from "./category.service.js";

$(document).ready(function () {
    const categoryservice = new categoryService()
    categoryservice.getAllData();

    function validation() {
        $('#formTambah').validate({
            rules: {
                name_categoty: {
                    required: true
                }
            },
            messages: {
                name_categoty: {
                    required: "Kategori tidak boleh kosong"
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

    $('#name_category').on('input', function () {
        $(this).valid()
    })

    function checkingEdit() {   
        return $('#id').val() ? true : false
    }

    $('#formTambah').submit(function (e) {
        e.preventDefault();
        categoryservice.createData(e, checkingEdit)
    })

    $(document).on('click', '.edit-modal', function () {
        const id = $(this).data('id')
        categoryservice.getDataById(id, checkingEdit)
    })

    $(document).on('click', '.delete-confirm', function () {
        const id = $(this).data('id')
        categoryservice.deleteData(id)
    })

    $('#inventarisModal').on('hidden.bs.modal', function () {
        $('#id').val('')
        $('#name_category').val('')
        $('#modal-title').text('Tambah Data');
        $('.form-control').removeClass('is-invalid').removeClass('is-valid')
        $('.error').remove();
        $('#preview').remove()
    })
});