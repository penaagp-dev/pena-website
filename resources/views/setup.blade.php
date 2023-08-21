@extends('layout.base')
@section('title')
    Setup
@endsection
@section('content')
    <div id="loading-overlay" class="loading-overlay" style="display: none;">
        <div id="loading" class="loading">
            <img src="{{ asset('loading.gif') }}" alt="Loading..." />
        </div>
    </div>
    <div class="card">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold ">Data</h6>
            <button type="button" class="btn btn-outline-primary ml-auto" data-toggle="modal"
                data-target="#SetupModel" id="#myBtn">
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
                            <th>Title</th>
                            <th>Deskripsi</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- modal updert data --}}
    <div class="modal fade" id="SetupModel" tabindex="-1" role="dialog" aria-labelledby="SetupModelLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="SetupModelLabel">Tambah Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="UpsertData" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row py-2">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <img src="" alt="" id="preview" class="mx-auto d-block pb-2"
                                            style="max-width: 200px; padding-top: 23px">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group fill">
                                        <input type="hidden" name="uuid" id="uuid" value="">
                                        <label>Title</label>
                                        <input id="title" name="title" type="text" class="form-control"
                                            placeholder="input here..." autocomplete="off">
                                    </div>
                                    <div class="form-group fill">
                                        <input type="hidden" name="uuid" id="uuid" value="">
                                        <label>Deskripsi</label>
                                      <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3"></textarea>
                                    </div>
                                   <div class="form-group">
                                        <label for="gambar">Gambar</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="gambar"
                                                name="gambar">
                                            <label class="custom-file-label" for="gambar"
                                                id="gambar-label">Upload gambar</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                        <button type="submit" form="UpsertData" class="btn btn-outline-primary">Submit Data</button>
                    </div>
                </div>
            </div>
    </div>

    <script>
        $(document).ready(function(){
            function getDataSetup() {
                    var dataTable = $("#dataTable").DataTable({
                        "responsive": true,
                        "lengthChange": false,
                        "autoWidth": false,
                    });
                    $.ajax({
                        url: `{{ url('api/v2/dd0af7cb-a745-4810-a12c-cefa8a4b24d8/setup') }}` ,
                        method: "GET",
                        dataType: "json",
                        success: function(response) {
                            console.log(response);
                            var tableBody = "";
                            $.each(response.data, function(index, item) {
                                tableBody += "<tr>";
                                tableBody += "<td>" + (index + 1) + "</td>";
                                tableBody += "<td>" + item.title + "</td>";
                                tableBody += "<td>" + item.deskripsi + "</td>";
                                tableBody += "<td>";
                                    if (item.gambar) {
                                        tableBody += "<img src='/uploads/setup/" + item.gambar + "' style='width:50px;height:50px;'>";
                                    } else {
                                        tableBody += "<i class='fa-solid fa-face-sad-tear fa-xl'></i> <span>Empty Image</span>";
                                    }
                                tableBody += "</td>";
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
                getDataSetup();

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
                    let isEditMode = false;

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
                        $('#SetupModel').modal('show');
                    }

                    // fungsi create and update
                    $('#UpsertData').submit(function(e) {
                        e.preventDefault();
                        let formData = new FormData(this);
                        if (isEditMode) {
                            let uuid = $('#uuid').val();
                            let file = $('#gambar')[0].files[0];
                            if (!file) {
                                formData.delete('gambar');
                            }
                            $('#loading-overlay').show();

                            $.ajax({
                                type: "POST",
                                url: `{{ url('api/v2/dd0af7cb-a745-4810-a12c-cefa8a4b24d8/setup/update') }}/` + uuid,
                                data: formData,
                                dataType: 'json',
                                contentType: false,
                                processData: false,
                                success: function(data) {
                                    console.log(data);
                                    $('#loading-overlay').hide();
                                    if (data.message === 'Check your validation') {
                                        let error = data.errors;
                                        let errorMessage = "";

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
                                            text: 'Update data successfully',
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
                            $('#loading-overlay').show();
                            $.ajax({
                                type: 'POST',
                                url: `{{ url('api/v2/dd0af7cb-a745-4810-a12c-cefa8a4b24d8/setup/create') }}`,
                                data: formData,
                                dataType: 'JSON',
                                contentType: false,
                                processData: false,
                                success: function(data) {
                                    $('#loading-overlay').hide();
                                    if (data.message === 'Check your validation') {
                                        let error = data.errors;
                                        let errorMessage = "";

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
                                            text: 'Create data successfully',
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
                        let uuid = $(this).data('uuid');
                        $(document).on('change', '#gambar', function() {
                            let fileName = $(this).val().split('\\').pop();
                            $('#gambar-label').text(fileName);
                        });

                        $.ajax({
                            url: `{{ url('api/v2/dd0af7cb-a745-4810-a12c-cefa8a4b24d8/setup/get') }}/` + uuid,
                            type: 'GET',
                            dataType: 'JSON',
                            success: function(data) {
                                console.log(data);
                                showModal(true);
                                $('#uuid').val(data.data.uuid);
                                $('#title').val(stripHtmlTags(data.data.title));
                                $('#deskripsi').val(stripHtmlTags(data.data.deskripsi));
                                $('#gambar').html(data.data.gambar);
                                $('#preview').attr('src',
                                    "{{ asset('uploads/setup') }}/" +
                                    data.data
                                    .gambar);
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
                        let div = document.createElement("div");
                        div.innerHTML = text;
                        return div.textContent || div.innerText || "";
                    }

                    function resetModal() {
                        $('#uuid').val('');
                        $('#title').val('');
                        $('#deskripsi').val('');
                        $('#gambar').val('');
                        $('#preview').attr('src', '').hide();
                        $('#gambar-label').text('Image');
                    }

                    // Fungsi reset modal
                    $('#SetupModel').on('hidden.bs.modal', function() {
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
                                url: `{{ url('api/v2/dd0af7cb-a745-4810-a12c-cefa8a4b24d8/setup/delete') }}/` +
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
        })
    </script>
@endsection
