@include('layout.head')

<div class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
          <div class="card-header text-center">
            <img src="{{ asset('assets/dist/img/pena.png')}}" class="w-25" alt=""> <br>
            <span class="h1"><b>PENA</b></span>
          </div>
          <div class="card-body">

            <form method="post" id="loginForm">
              @csrf
              <div class="input-group mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row d-flex justify-content-center">
                <!-- /.col -->
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                </div>
                <!-- /.col -->
              </div>
            </form>


          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

</div>

<script>
const apiUrl = 'a31eae80-3df7-4676-84bf-8bec57a7ae0e/user/login'

$(document).ready(function() {
  var formTambah = $('#loginForm');
  formTambah.on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    
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
      url: `{{ url('${apiUrl}') }}`,
      data: formData,
      dataType: 'JSON',
      contentType: false,
      processData: false,
      success: function(data) {
        loadingSwal.close();
        Swal.fire({
          title: 'Success',
          text: 'Login Successfully',
          icon: 'success',
          showCancelButton: false,
          confirmButtonText: 'OK'
        }).then(function() {
          window.location.href = '/cms/dashboard';
        });
      },
      error: function(data) {
        loadingSwal.close();
        Swal.fire({
          title: 'Error',
          html: 'Login Failed',
          icon: 'error',
          timer: 5000,
          showConfirmButton: true
        });
      }
    });
  });
});
</script>

@include('layout.script')
