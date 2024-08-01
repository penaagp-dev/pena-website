import registerCaService from "./registerca.service.js";

$(document).ready(function () {
    const registercaservice = new registerCaService()

    registercaservice.getAllData()
    
    function validation() {
        $('#formTambah').validate({
            rules: {
                name: {
                    required: true
                },
                date_of_birth: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                    required: true,
                    number: true
                },
                major: {
                    required: true
                },
                semester: {
                    required: true
                },
                reason_register: {
                    required: true
                },
                address:{
                    required: true
                },
                religion: {
                    required: true
                },
                photo: {
                    required: true,
                    fileExtension: true
                },
                gender: {
                    required: true
                },
                status: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: "Nama tidak boleh kosong"
                },
                date_of_birth: {
                    required: "Tanggal lahir tidak boleh kosong"
                },
                email: {
                    required: "Email tidak boleh kosong",
                    email: "Format email salah"
                },
                phone: {
                    required: "Phone tidak boleh kosong",
                    number: "Phone harus angka"
                },
                major: {
                    required: "Jurusan tidak boleh kosong"
                },
                semester: {
                    required: "Semester tidak boleh kosong"
                },
                reason_register: {
                    required: "Alasan mendaftar tidak boleh kosong"
                },
                address: {
                    required: "Alamat tidak boleh kosong"
                },
                religion: {
                    required: "Agama tidak boleh kosong"
                },
                photo: {
                    required: "Photo tidak boleh kosong",
                    fileExtension: "Format file harus jpg, jpeg, png"
                },
                gender: {
                    required: "Jenis kelamin tidak boleh kosong"
                },
                status: {
                    required: "Status tidak boleh kosong"
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
        })
    }
    validation()

    $('#name, #date_of_birth, #email, #phone,#reason_register, #address').on('input', function () {
        $(this).valid()
    })

    $('#photo, #major, #semester, #religion, #gender').on('change', function () {
        $(this).valid()
    })

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

    function checkingEdit() {   
        return $('#id').val() ? true : false
    }

    $('#formTambah').on('submit', function (e) {
        e.preventDefault()
        registercaservice.createData(e, checkingEdit)
    })

    $(document).on('click', '.edit-modal', function (e) {
        e.preventDefault()
        console.log('Edit modal clicked');
        generateFormStatus('container-status')
        const id = $(this).data('id')
        registercaservice.getDataById(id, checkingEdit)
    })

    $(document).on('click', '.delete-confirm', function (e) {
        e.preventDefault()
        const id = $(this).data('id')
        registercaservice.deleteData(id)
    })


    $('#export').on('click', function (e) {
        console.log('Export clicked');
        e.preventDefault()
        registercaservice.exportData()
    })

    $('#registerCaModal').on('hidden.bs.modal', function () {
        $('#id').val('')
        $('#name').val('')
        $('#date_of_birth').val('')
        $('#email').val('')
        $('#phone').val('')
        $('#major').val('')
        $('#semester').val('')
        $('#gender').val('')
        $('#religion').val('')
        $('#reason_register').val('')
        $('#address').val('')
        $('#status').val('')
        $('#photo').val('')
        $('#modal-title').text('Tambah Data');
        $('.form-control').removeClass('is-invalid').removeClass('is-valid')
        $('.error').remove();
        $('#preview').remove()
        $('#form-status').remove()
    })
});