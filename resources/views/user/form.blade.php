<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/css/form.css')}}" />
    <link rel="stylesheet" href="{{ asset('assets/css/loader.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" />
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <title>PENA</title>
    <link rel="icon" href="{{ asset('assets/img/pena.png')}}" />
  </head>
  <body>
    <div class="bg-light w-100" style="height: 100vh; position: fixed; z-index: 50;" id="loaderPage">
      <div id="loader"></div>
    </div>
    <div class="form-wrap" style="background: url({{('assets/img/bg.jpg')}});">
        <div class="wrap-form">
          <form class="form">
            <p class="heading fs-1 fw-bold text-center p-4">Form Pendaftaran</p>
            <div class="mb-3">
              <label class="form-label">Nama Lengkap</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nama Lengkap" name="nama" required>
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput2" class="form-label">Tanggal Lahir</label>
              <input type="date" class="form-control" id="formGroupExampleInput2" placeholder="Tanggal lahir" name="tanggal_lahir" required>
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">Agama</label>
              <select class="form-select" aria-label="Default select example" name="agama" required>
                <option selected>Agama</option>
                <option value="1">Islam</option>
                <option value="2">Kristen</option>
                <option value="3">Hindu</option>
                <option value="3">Budha</option>
                <option value="3">Atheis</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">Email</label>
              <input type="email" class="form-control" id="formGroupExampleInput" placeholder="Email@gmail.com" name="email" required>
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">Alamat</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Alamat" name="alamat" required>
            </div>
            <div class="mb-3">
              <label for="formGroupExampleInput" class="form-label">Nomor Whatsapp</label>
              <input type="number" class="form-control" id="formGroupExampleInput" placeholder="Nomor Whatsapp" name="no_hp" required>
            </div>
            <label for="formGroupExampleInput" class="form-label">Foto selfie</label>
            <div class="input-group mb-3">
              <input type="file" class="form-control" id="inputGroupFile02" name="gambar" required>
            </div>
            <table>
              <tbody class="Semester">
                <td class="pb-3">Jenis Kelamin</td>
                <tr>
                  <td>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="pria" required>
                      <label class="form-check-label" for="inlineRadio1">Pria</label>
                    </div>
                  </td>
                  <td>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="wanita" required>
                      <label class="form-check-label" for="inlineRadio2">Wanita</label>
                    </div>
                  </td>
                </tr>
                <td class="pb-3 pt-3">Semester</td>
                <tr>
                  <td>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="semester" id="inlineRadio1" value="semester 1" required>
                      <label class="form-check-label" for="inlineRadio1">Semester 1</label>
                    </div>
                  </td>
                  <td>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="semester" id="inlineRadio2" value="semester 3" required>
                      <label class="form-check-label" for="inlineRadio2">Semester 3</label>
                    </div>
                  </td>
                </tr>
                <td class="pb-3 pt-3">Jurusan</td>
                <tr>
                  <td>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="jurusan" id="inlineRadio3" value="teknik informatika" required>
                      <label class="form-check-label" for="inlineRadio3">Teknik Informatika</label>
                    </div>
                  </td>
                  <td>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jurusan" id="inlineRadio4" value="sistem informasi" required>
                    <label class="form-check-label" for="inlineRadio4">Sistem Informasi</label>
                  </div> 
                  </td>
              </tr>
            </tbody>            
          </table>
            <div class="mb-3 mt-4">
              <label for="formGroupExampleInput" class="form-label">Alasan Bergabung</label>
              <textarea class="form-control" cols="20" rows="10" required placeholder="Alasan Bergabung" style="resize: none;" name="alasan_masuk"></textarea>
            </div>
              <div class="d-flex justify-content-between pt-5 pb-4">
                <a class="btn btn-secondary" href="index.html" role="button"><i class="fa-solid fa-angle-left me-2"></i>back</a>
                <button class="btn btn-primary">Submit <i class="fa-solid fa-paper-plane ms-2"></i></button>
              </div>
            </div>
          </form>
        </div>
    </div>
    <script src="{{ asset('assets/js/loader.js')}}"></script>
  </body>
  </html>
