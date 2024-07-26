@extends('layout.base')
@section('title')
@section('content')
<section class="content">
  <div class="container-fluid">

    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3 id="galeryCount"></h3>
            <p>Galery</p>
          </div>
          <div class="icon">
            <i class="fa-regular fa-images"></i>
          </div>
          <a href="/cms/gallery" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3 id="newsCount"></h3>
            <p>News</p>
          </div>
          <div class="icon">
            <i class="fa-solid fa-newspaper"></i>
          </div>
          <a href="/cms/news" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3 id="setupCount"></h3>
            <p>Setup</p>
          </div>
          <div class="icon">
            <i class="fa-solid fa-gear"></i>
          </div>
          <a href="/cms/setup" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3 id="pendaftaranCount"></h3>
            <p>Pendaftaran</p>
          </div>
          <div class="icon">
            <i class="fa-solid fa-user-plus"></i>
          </div>
          <a href="/cms/pendaftaran" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <div class="row">
    <div class="col-lg-12 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Selamat Datang Di Dashboard 🎉</h5>

                        @auth
                                <p class="mb-4">{{ auth()->user()->name }}</p>
                        @endauth

                        <i class="fa-sharp fa-solid fa-face-smile text-warning"></i>
                        <a href="javascript:;" class="">Enjoy your work !!!</a>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img
                            src="https://demos.themeselection.com/sneat-bootstrap-html-admin-template-free/assets/img/illustrations/man-with-laptop-light.png"
                            height="350"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</section>
{{-- <script>
$(document).ready(function() {
    $.ajax({
        url: `{{ url('/27fb9214-0f07-4240-b684-6009fd37a385/dashboard/count') }}`,
        method: "GET",
        dataType: "json",
        success: function(response) {
          const data = response.data
          $("#galeryCount").text(data.galery)
          $("#newsCount").text(data.news)
          $("#setupCount").text(data.setup)
          $("#pendaftaranCount").text(data.pendaftaran)
        },
        error: function() {
            console.log("Failed to get data from server");
        }
    });
});
</script> --}}
@endsection



