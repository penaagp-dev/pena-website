@extends('layout.base')
{{-- @section('title')
    Gallery
@endsection --}}
@section('content')
    <div class="card" id="changePassword">
        <form id="formTambah">
            <div class="modal-body">
                @csrf
                <div class="row py-2">
                    <div class="col-md-12" id="form-preview">
                    </div>
                    <div class="col-md-12">
                        <div class="form-group fill form-show-validation">
                            <label>Password lama</label>
                            <input id="passwordold" name="passwordold" type="text" class="form-control"
                                placeholder="Masukkan password lama anda" autocomplete="off">
                        </div>
                        <div class="form-group fill form-show-validation">
                            <label>Password baru</label>
                            <input id="password" name="password" type="text" class="form-control"
                                placeholder="masukan password baru anda" autocomplete="off">
                        </div>
                        <div class="form-group fill form-show-validation">
                            <label>Konfirmasi password</label>
                            <input id="password_confirmation" name="password_confirmation" type="text" class="form-control"
                                placeholder="konfirmasi password anda" autocomplete="off">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-primary">Simpan Data</button>
            </div>
        </form>
    </div>

    <script type="module" src="{{ asset('js/changepassword/changepassword.controller.js') }}"></script>
@endsection
