@include('layout.head')

<div class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img src="{{ asset('assets/dist/img/pena.png') }}" class="w-25" alt=""> <br>
                <span class="h1"><b>PENA</b></span>
            </div>
            <div class="card-body">
                <form id="loginForm">
                    @csrf
                    <div class="input-group mb-4">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <!-- /.col -->
                        <div class="col-12">
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

<script type="module" src="{{ asset('js/auth/auth.controller.js') }}"></script>
@include('layout.script')
