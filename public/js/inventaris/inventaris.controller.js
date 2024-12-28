import inventarisService from "./inventaris.service.js";

$(document).ready(function () {
    const inventarisservice = new inventarisService();
    inventarisservice.getAllData();

    function validation() {
        $('#formTambah').validate({
            rules: {
                name_inventaris: {
                    required: true
                },
                stock: {
                    required: true
                },
                location_item: {
                    required: true
                },
                id_category: {
                    required: true
                },
                is_condition: {
                    required: true
                },
                description: {
                    required: true
                },
                img_inventaris: {
                    required: true,
                    fileExtension: true                
                }
            },
            messages: {
                name_inventaris: {
                    required: "Nama barang tidak boleh kosong"
                },
                stock: {
                    required: "Jumlah tidak boleh kosong"
                },
                location_item: {
                    required: "Photo tidak boleh kosong",
                },
                id_category: {
                    required: "Kategori tidak boleh kosong"
                },
                is_condition: {
                    required: "Kondisi tidak boleh kosong"
                },
                description: {
                    required: "Deskripsi tidak boleh kosong"
                },
                img_inventaris: {
                    required: "Gambar tidak boleh kosong",
                    fileExtension: "Format file harus jpg, jpeg, png",
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

    $('#img_inventaris').on('change', function () {
        let file = this.files[0]
        let reader = new FileReader()
        reader.onload = function (e) {
            generatePreviewImg('form-preview')
            $('#preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(file)
        $(this).valid()
    })

    $('#name_inventaris').on('input', function () {
        $(this).valid()
    })

    $('#stock').on('input', function () {
        $(this).valid()
    })

    $('#location_item').on('input', function () {
        $(this).valid()
    })

    $('#id_category').on('input', function () {
        $(this).valid()
    })

    $('#is_condition').on('input', function () {
        $(this).valid()
    })

    $('#description').on('input', function () {
        $(this).valid()
    })

    $('#img_inventaris').on('change', function () {
        $(this).valid()
    })

    function checkingEdit() {
        return $('#id').val() ? true : false
    }

    $('#formTambah').submit(function (e) {
        e.preventDefault();
        inventarisservice.createData(e, checkingEdit)
    })

    $(document).on('click', '.edit-modal', function () {
        const id = $(this).data('id')
        inventarisservice.getDataById(id, checkingEdit)
    })

    $(document).on('click', '.delete-confirm', function () {
        const id = $(this).data('id')
        inventarisservice.deleteData(id)
    })

    $('#inventarisModal').on('hidden.bs.modal', function () {
        $('#id').val('')
        $('#name_inventaris').val('')
        $('#stock').val('')
        $('#location_item').val('')
        $('#id_category').val('')
        $('#status').val('')
        $('#is_condition').val('')
        $('#description').val('')
        $('#img_inventaris').val('')
        $('#modal-title').text('Tambah Data');
        $('.form-control').removeClass('is-invalid').removeClass('is-valid')
        $('.error').remove();
        $('#preview').remove()
    })
});