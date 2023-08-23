<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/css/form.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/loader.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" />
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>PENA</title>
    <link rel="icon" href="{{ asset('assets/img/pena.png') }}" />
</head>

<body>
    <div class="bg-light w-100" style="height: 100vh; position: fixed; z-index: 50;" id="loaderPage">
        <div id="loader"></div>
    </div>
    <div class="form-wrap" style="background: url({{ 'assets/img/bg.jpg' }});">
        <div class="wrap-form">
            <form class="form" id="formTambah" method="post">
                @csrf
                <p class="heading fs-1 fw-bold text-center p-4">Form Pendaftaran</p>
                <input type="hidden" name="uuid" id="uuid">
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="nama">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" placeholder="Tanggal lahir"
                        name="tanggal_lahir">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Nomor Whatsapp</label>
                    <input type="number" class="form-control" id="no_hp" placeholder="Nomor Whatsapp"
                        name="no_hp">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email@gmail.com"
                        name="email">
                </div>
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Agama</label>
                    <select class="form-select" aria-label="Default select example" name="agama">
                        <option selected>Agama</option>
                        <option value="islam">Islam</option>
                        <option value="kristen">Kristen</option>
                        <option value="hindu">Hindu</option>
                        <option value="buddha">Budha</option>
                        <option value="khonghucu">Khonghucu</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat">
                </div>
                <label for="formGroupExampleInput" class="form-label">Foto selfie</label>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="gambar" name="gambar">
                </div>
                <table>
                    <tbody class="Semester">
                        <td class="pb-3">Jenis Kelamin</td>
                        <tr>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin"
                                        id="jenis_kelamin" value="L">
                                    <label class="form-check-label" for="inlineRadio1">Pria</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin"
                                        id="jenis_kelamin" value="P">
                                    <label class="form-check-label" for="inlineRadio2">Wanita</label>
                                </div>
                            </td>
                        </tr>
                        <td class="pb-3 pt-3">Semester</td>
                        <tr>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="semester" id="semester"
                                        value="1">
                                    <label class="form-check-label" for="inlineRadio1">Semester 1</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="semester" id="semester"
                                        value="3">
                                    <label class="form-check-label" for="inlineRadio2">Semester 3</label>
                                </div>
                            </td>
                        </tr>
                        <td class="pb-3 pt-3">Jurusan</td>
                        <tr>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jurusan" id="jurusan"
                                        value="TI">
                                    <label class="form-check-label" for="inlineRadio3">Teknik Informatika</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jurusan" id="jurusan"
                                        value="SI">
                                    <label class="form-check-label" for="inlineRadio4">Sistem Informasi</label>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="mb-3 mt-4">
                    <label for="formGroupExampleInput" class="form-label">Alasan Bergabung</label>
                    <textarea class="form-control" cols="20" rows="10" placeholder="Alasan Bergabung" style="resize: none;"
                        name="alasan_masuk"></textarea>
                </div>
                <div class="d-flex justify-content-between pt-5 pb-4">
                    <a class="btn btn-secondary" href="index.html" role="button"><i
                            class="fa-solid fa-angle-left me-2"></i>back</a>
                    <button class="btn btn-primary">Submit <i class="fa-solid fa-paper-plane ms-2"></i></button>
                </div>
        </div>
        </form>
    </div>
    </div>
    <script src="{{ asset('assets/js/loader.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        $(document).ready(function() {
            // fungsi create and update
            $('#formTambah').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                var selectedDate = moment($('#tanggal_lahir').val(), 'YYYY-MM-DD').format(
                    'DD MMMM YYYY');
                formData.set('tanggal_lahir', selectedDate);
                $('#loading-overlay').show();
                var loadingSwal = Swal.fire({
                    title: 'Loading...',
                    html: 'Please wait while processing...',
                    allowOutsideClick: false,
                    showCancelButton: false,
                    showConfirmButton: false,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{ url('v1/febba411-89e8-4fb3-9f55-85c56dcff41d/pendaftaran') }}',
                    data: formData,
                    dataType: 'JSON',
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data)
                        loadingSwal.close();
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
                                window.location.href = "/"
                            });
                        }
                    },
                    error: function(data) {
                        loadingSwal.close();
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
            });
        });
    </script>
</body>

</html>
