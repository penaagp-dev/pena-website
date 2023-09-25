@extends('layout.base')
@section('title')
    Pendaftaran
@endsection
@section('content')
    <div id="loading-overlay" class="loading-overlay" style="display: none;">
        <div id="loading" class="loading">
            <img src="{{ asset('loading.gif') }}" alt="Loading..." />
        </div>
    </div>
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold ">Data Divisi</h6>
            <button type="button" class="btn btn-outline-primary ml-auto" data-toggle="modal"
                data-target="#PendaftaranModal" id="#myBtn">
                Tambah Data
            </button>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table id="dataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Agama</th>
                            <th>Jenis Kelamin</th>
                            <th>Jurusan</th>
                            <th>No HP</th>
                            <th>Tanggal Lahir</th>
                            <th>Semester</th>
                            <th>Alamat</th>
                            <th>Alasan Masuk</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="modal fade" id="PendaftaranModal" tabindex="-1" role="dialog" aria-labelledby="PendaftaranModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="PendaftaranModalLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formTambah" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row py-4">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <img src="" alt="" id="preview" class="mx-auto d-block pb-2"
                                            style="max-width: 200px; padding-top: 23px">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group fill">
                                        <input type="hidden" name="uuid" id="uuid" value="">
                                        <label>Nama</label>
                                        <input id="nama" name="nama" type="text" class="form-control"
                                            placeholder="input here..." autocomplete="off">
                                    </div>
                                    <div class="form-group fill">
                                        <input type="hidden" name="uuid" id="uuid" value="">
                                        <label>Tanggal lahir</label>
                                        <input id="tanggal_lahir" name="tanggal_lahir" type="date" class="form-control"
                                            placeholder="input here..." autocomplete="off">
                                    </div>
                                    <div class="form-group fill">
                                        <label>Telepon</label>
                                        <input id="no_hp" name="no_hp" type="number" class="form-control"
                                            placeholder="input here..." autocomplete="off">
                                    </div>
                                    <div class="form-group fill">
                                        <label>Email</label>
                                        <input id="email" name="email" type="email" class="form-control"
                                            placeholder="input here..." autocomplete="off">
                                    </div>
                                    <div class="form-group fill">
                                        <label>Semester</label>
                                        <select class="form-control" id="semester" name="semester">
                                            <option selected="" disabled="">-Pilih-</option>
                                            <option value="1">Semester 1</option>
                                            <option value="3">Semester 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group fill">
                                        <label>Agama</label>
                                        <select class="form-control" id="agama" name="agama">
                                            <option selected="" disabled="">-Pilih-</option>
                                            <option value="islam">Islam</option>
                                            <option value="kristen">Kristen</option>
                                            <option value="hindu">Hindu</option>
                                            <option value="buddha">Budha</option>
                                            <option value="khonghucu">Khonghucu</option>
                                        </select>
                                    </div>
                                    <div class="form-group fill">
                                        <label>Jenis Kelamin</label>
                                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                            <option selected="" disabled="">-Pilih-</option>
                                            <option value="L">Laki Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="form-group fill">
                                        <label>Prodi</label>
                                        <select class="form-control" id="jurusan" name="jurusan">
                                            <option selected="" disabled="">-Pilih-</option>
                                            <option value="TI">Teknik Informatika</option>
                                            <option value="SI">Sistem Informasi</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="gambar">Gambar</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambar"
                                                name="gambar">
                                            <label class="custom-file-label" for="gambar"
                                                id="gambar-label">Image</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group fill">
                                        <label>Alamat</label>
                                        <textarea id="alamat" name="alamat" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group fill">
                                        <label>Alasan Masuk</label>
                                        <textarea id="alasan_masuk" name="alasan_masuk" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <button type="submit" form="formTambah" class="btn btn-outline-primary">Submit Data</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                function getDataMahasiswa() {
                    var dataTable = $("#dataTable").DataTable({
                        "responsive": true,
                        "lengthChange": false,
                        "autoWidth": false,
                    });
                    $.ajax({
                        url: "{{ url('v1/febba411-89e8-4fb3-9f55-85c56dcff41d/pendaftaran') }}",
                        method: "GET",
                        dataType: "json",
                        success: function(response) {
                            console.log(response);
                            var tableBody = "";
                            $.each(response.data, function(index, item) {
                                tableBody += "<tr>";
                                tableBody += "<td>" + (index + 1) + "</td>";
                                tableBody += "<td>" + item.nama + "</td>";
                                tableBody += "<td>" + item.email + "</td>";
                                tableBody += "<td>" + item.agama + "</td>";
                                tableBody += "<td>" + item.jenis_kelamin + "</td>";
                                tableBody += "<td>" + item.jurusan + "</td>";
                                tableBody += "<td>" + item.no_hp + "</td>";
                                tableBody += "<td>" + item.tanggal_lahir + "</td>";
                                tableBody += "<td>" + item.semester + "</td>";
                                tableBody += "<td>" + item.alamat + "</td>";
                                tableBody += "<td>" + item.alasan_masuk + "</td>";
                                tableBody += "<td>" +
                                    "<button type='button' class='btn btn-primary edit-modal' data-toggle='modal' data-target='#EditModal' " +
                                    "data-uuid='" + item.uuid + "'>" +
                                    "<i class='fa fa-edit'></i></button>" +
                                    "<button type='button' class='btn btn-danger delete-confirm' data-uuid='" +
                                    item.uuid + "'><i class='fa fa-trash'></i></button>" +
                                    "</td>";
                                tableBody += "</tr>";
                            });
                            var table = $("#dataTable").DataTable();
                            table.clear().draw();
                            table.rows.add($(tableBody)).draw();
                        },
                        error: function() {
                            console.log("Failed to get data from server");
                        }
                    });
                }
                getDataMahasiswa();


                $(document).ready(function() {
                    $(document).on('change', '#gambar', function() {
                        var fileName = $(this).val().split('\\').pop();
                        $('#gambar-label').text(fileName);
                    });
                });


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document).ready(function() {
                    var isEditMode = false;

                    function showModal(editMode = false, uuid = '') {
                        isEditMode = editMode;
                        if (isEditMode) {
                            $('.modal-title').text('Edit Data');
                            $('.modal-footer button[type="submit"]').text('Update');
                            $('#preview').show();
                        } else {
                            $('.modal-title').text('Tambah Data');
                            $('.modal-footer button[type="submit"]').text('Submit');
                            $('#preview').hide();
                        }
                        $('#PendaftaranModal').modal('show');
                    }

                    // fungsi create and update
                    $('#formTambah').submit(function(e) {
                        e.preventDefault();
                        var formData = new FormData(this);
                        if (isEditMode) {
                            var uuid = $('#uuid').val();
                            var file = $('#gambar')[0].files[0];
                            if (!file) {
                                formData.delete('gambar');
                            }
                            $('#loading-overlay').show();
                            var selectedDate = moment($('#tanggal_lahir').val(), 'YYYY-MM-DD').format(
                                'DD MMMM YYYY');
                            formData.set('tanggal_lahir', selectedDate);
                            $.ajax({
                                type: "POST",
                                url: "{{ url('v1/4a3f479a-eb2e-498f-aa7b-e7d6e3f0c5f3/pendaftaran/update/') }}/" +
                                    uuid,
                                data: formData,
                                dataType: 'json',
                                contentType: false,
                                processData: false,
                                success: function(data) {
                                    console.log(data);
                                    $('#loading-overlay').hide();
                                    if (data.message === 'check your validation') {
                                        var error = data.errors;
                                        var errorMessage = "";

                                        $.each(error, function(key, value) {
                                            errorMessage += value[0] + "<br>";
                                        });

                                        Swal.fire({
                                            title: 'Error',
                                            html: errorMessage,
                                            icon: 'error',
                                            timer: 5000,
                                            showConfirmButton: true
                                        });
                                    } else {
                                        console.log(data);
                                        $('#loading-overlay').hide();
                                        Swal.fire({
                                            title: 'Success',
                                            text: 'Data Success Update',
                                            icon: 'success',
                                            showCancelButton: false,
                                            confirmButtonText: 'OK'
                                        }).then(function() {
                                            location.reload();
                                        });
                                    }
                                },
                                error: function(data) {
                                    $('#loading-overlay').hide();
                                    var errors = data.responseJSON.errors;
                                    var errorMessage = "";

                                    $.each(errors, function(key, value) {
                                        errorMessage += value + "<br>";
                                    });

                                    Swal.fire({
                                        title: "Error",
                                        html: errorMessage,
                                        icon: "error",
                                        timer: 5000,
                                        showConfirmButton: true
                                    });
                                }
                            });
                        } else {
                            var selectedDate = moment($('#tanggal_lahir').val(), 'YYYY-MM-DD').format(
                                'DD MMMM YYYY');
                            formData.set('tanggal_lahir', selectedDate);
                            $('#loading-overlay').show();
                            $.ajax({
                                type: 'POST',
                                url: '{{ url('v1/febba411-89e8-4fb3-9f55-85c56dcff41d/pendaftaran') }}',
                                data: formData,
                                dataType: 'JSON',
                                contentType: false,
                                processData: false,
                                success: function(data) {
                                    $('#loading-overlay').hide();
                                    if (data.message === 'check your validation') {
                                        var error = data.errors;
                                        var errorMessage = "";

                                        $.each(error, function(key, value) {
                                            errorMessage += value[0] + "<br>";
                                        });

                                        Swal.fire({
                                            title: 'Error',
                                            html: errorMessage,
                                            icon: 'error',
                                            timer: 5000,
                                            showConfirmButton: true
                                        });
                                    } else {
                                        console.log(data);
                                        $('#loading-overlay').hide();
                                        Swal.fire({
                                            title: 'Success',
                                            text: 'Data Success Create',
                                            icon: 'success',
                                            showCancelButton: false,
                                            confirmButtonText: 'OK'
                                        }).then(function() {
                                            location.reload();
                                        });
                                    }
                                },
                                error: function(data) {
                                    $('#loading-overlay').hide();

                                    var error = data.responseJSON.errors;
                                    var errorMessage = "";

                                    $.each(error, function(key, value) {
                                        errorMessage += value[0] + "<br>";
                                    });

                                    Swal.fire({
                                        title: 'Error',
                                        html: errorMessage,
                                        icon: 'error',
                                        timer: 5000,
                                        showConfirmButton: true
                                    });
                                }
                            });
                        }
                    });

                    // Edit Data
                    $(document).on('click', '.edit-modal', function() {
                        var uuid = $(this).data('uuid');
                        $(document).on('change', '#gambar', function() {
                            var fileName = $(this).val().split('\\').pop();
                            $('#gambar-label').text(fileName);
                        });

                        $.ajax({
                            url: "{{ url('v1/9d97457b-1922-4f4a-b3fa-fcba980633a2/pendaftaran/get/') }}/" +
                                uuid,
                            type: 'GET',
                            dataType: 'JSON',
                            success: function(data) {
                                console.log(data);
                                showModal(true);
                                $('#uuid').val(data.data.uuid);
                                $('#nama').val(stripHtmlTags(data.data.nama));
                                $('#email').val(data.data.email);
                                $('#agama').val(stripHtmlTags(data.data.agama));
                                $('#jenis_kelamin').val(stripHtmlTags(data.data.jenis_kelamin));
                                $('#jurusan').val(stripHtmlTags(data.data.jurusan));
                                $('#no_hp').val(stripHtmlTags(data.data.no_hp));
                                $('#tanggal_lahir').val(data.data.tanggal_lahir);
                                $('#semester').val(stripHtmlTags(data.data.semester));
                                $('#alamat').val(stripHtmlTags(data.data.alamat));
                                $('#alasan_masuk').val(stripHtmlTags(data.data
                                    .alasan_masuk));
                                $('#gambar').html(data.data.gambar);
                                $('#preview').attr('src',
                                    "{{ asset('uploads/ProfileCA') }}/" +
                                    data.data
                                    .gambar);
                                $('#title').val(stripHtmlTags(data.data.title));
                                $('#description').val(stripHtmlTags(data.data.description));
                                $('#link').val(stripHtmlTags(data.data.link));
                                // Tampilkan nama file gambar pada label
                                var fileName = data.data.gambar.split('/').pop();
                                $('#gambar-label').text(fileName);

                            },
                            error: function() {
                                alert("error");
                            }
                        });
                    });

                    // Fungsi untuk menghapus tag HTML dari teks
                    function stripHtmlTags(text) {
                        var div = document.createElement("div");
                        div.innerHTML = text;
                        return div.textContent || div.innerText || "";
                    }

                    function resetModal() {
                        $('#uuid').val('');
                        $('#nama').val('');
                        $('#tanggal_lahir').val('');
                        $('#gambar').val('');
                        $('#preview').attr('src', '').hide();
                        $('#gambar-label').text('Image');
                        $('#title').val('');
                        $('#description').val('');
                        $('#link').val('');
                    }

                    // Fungsi reset modal
                    $('#PendaftaranModal').on('hidden.bs.modal', function() {
                        isEditMode = false;
                        resetModal();
                        $('.modal-title').text('Tambah Data');
                        $('.modal-footer button[type="submit"]').text('Submit');
                    });
                });

                //delete
                $(document).on('click', '.delete-confirm', function(e) {
                    e.preventDefault();
                    var uuid = $(this).data('uuid');
                    Swal.fire({
                        title: 'Anda yakin ingin menghapus data ini?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Delete',
                        cancelButtonText: 'Cancel',
                        resolveButton: true
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ url('v1/83df59b0-7c1a-4944-8fbb-2c06670dfa01/pendaftaran/delete/') }}/" +
                                    uuid,
                                type: 'DELETE',
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    "uuid": uuid
                                },
                                success: function(response) {
                                    console.log(response);
                                    if (response.code === 200) {
                                        Swal.fire({
                                            title: 'Data berhasil dihapus',
                                            icon: 'success',
                                            timer: 5000,
                                            showConfirmButton: true
                                        }).then((result) => {
                                            location.reload();
                                        });
                                    } else {
                                        Swal.fire({
                                            title: 'Gagal menghapus data',
                                            text: response.message,
                                            icon: 'error',
                                            timer: 5000,
                                            showConfirmButton: true
                                        });
                                    }
                                },
                                error: function() {
                                    Swal.fire({
                                        title: 'Terjadi kesalahan',
                                        text: 'Gagal menghapus data',
                                        icon: 'error',
                                        timer: 5000,
                                        showConfirmButton: true
                                    });
                                }
                            });
                        }
                    });
                });
            });
        </script>
    @endsection
