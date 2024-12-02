import borrowService from "./brrow.service.js";

$(document).ready(function () {
    const borrowservice = new borrowService()
    borrowservice.getdropdowninventaris();
    borrowservice.getAllData();


    function validation() {
        $('#formTambah').validate({
            rules: {
                id_inventaris: {
                    required: true
                },
                name_borrow: {
                    required: true
                },
                quantity: {
                    required: true
                },
                description: {
                    required: true
                },

            },
            messages: {
                id_inventaris: {
                    required: "Barang tidak boleh kosong"
                },
                name_borrow:{
                    required: "Nama peminjam tidak boleh kosong"
                },
                quantity:{
                    required: "Jumlah tidak boleh kosong"
                },
                description:{
                    required: "Deskripsi tidak boleh kosong"
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

    $('#id_inventaris').on('input', function () {
        $(this).valid()
    })

    $('#name_borrow').on('input', function () {
        $(this).valid()
    })

    $('#quantity').on('input', function () {
        $(this).valid()
    })

    $('#description').on('input', function () {
        $(this).valid()
    })

    function checkingEdit() {
        return $('#id').val() ? true : false
    }

    $('#formTambah').submit(function (e) {
        e.preventDefault();
        borrowservice.createData(e, checkingEdit)
    })

    $(document).on('click', '.edit-modal', function () {
        const id = $(this).data('id')
        borrowservice.getDataById(id, checkingEdit)
    })

    $(document).on('click', '.return-confirm', function () {
        const id = $(this).data('id')
        borrowservice.returnBorrow(id)
    })

    $('#borrowModal').on('hidden.bs.modal', function () {
        $('#id').val('')
        $('#id_inventaris').val('')
        $('#name_borrow').val('')
        $('#quantity').val('')
        $('#description').val('')
        $('#modal-title').text('Tambah Data');
        $('.form-control').removeClass('is-invalid').removeClass('is-valid')
        $('.error').remove();
        $('#preview').remove()
    })
});
