@include('layout.head')
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <div class="loader">
      <div class="justify-content-center jimu-primary-loading"></div>
    </div>
  </div>

  @include('layout.navbar')

  @include('layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('title')</h1>
            @include('sweetalert::alert')
          </div>
        </div>
      </div>
    </div>

    <section class="content">
      {{-- ============= CONTENT HERE ============= --}}
      @yield('content')

    </section>
    
  </div>
 

</div>
<!-- ./wrapper -->
@include('layout.script')