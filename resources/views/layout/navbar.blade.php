<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="fa-solid fa-right-from-bracket"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="cursor: pointer">
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" id="logoutButton">
          <i class="fa-solid fa-right-from-bracket ms-2"></i> Logout
        </a>
        <div class="dropdown-divider"></div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>

  </ul>
</nav>

<script>
const urlLogout = 'v1/logout'
$(document).ready(function() {
  $('#logoutButton').click(function(e) {
    Swal.fire({
      title: 'Yakin ingin Logout?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Yes',
      cancelButtonText: 'Cancel',
      resolveButton: true
    }).then((result) => {
      if (result.isConfirmed) {
        e.preventDefault();
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
          url: `{{ url('${urlLogout}') }}`,
          method: 'POST',
          dataType: 'json',
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          success: function(response) {
            loadingSwal.close();
            window.location.href = '/cms/admin/login';
          },
          error: function(xhr, status, error) {
            loadingSwal.close();
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Failed to logout. Please try again.',
            })
          }
        });
      }
    });
  });
});
</script>
