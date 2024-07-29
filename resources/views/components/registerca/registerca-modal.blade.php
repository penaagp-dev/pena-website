    {{-- modal updert data --}}
    <div class="modal fade" id="registerCaModal" tabindex="-1" role="dialog" aria-labelledby="registerCaLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 800px; ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formTambah">
                    <div class="modal-body">
                        @csrf
                        <div class="row py-2">
                            <div class="col-md-12" id="form-preview">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group fill form-show-validation">
                                    <input type="hidden" name="id" id="id" value="">
                                    <label>Nama</label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Nama anda">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group fill form-show-validation">
                                    <label>Tanggal lahir</label>
                                    <input id="date_of_birth" name="date_of_birth" type="date" class="form-control"
                                        placeholder="Nama anda">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group fill form-show-validation">
                                    <label>Agama</label>
                                    <select name="religion" id="religion" class="form-control">
                                        <option value="" selected disabled hidden>Choose here</option>
                                        <option value="islam">Islam</option>
                                        <option value="kristen">Kristen</option>
                                        <option value="katolik">Katolik</option>
                                        <option value="hindu">Hindu</option>
                                        <option value="budha">Budha</option>
                                        <option value="konghucu">Konghucu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group fill form-show-validation">
                                    <label>Email</label>
                                    <input id="email" name="email" type="email" class="form-control"
                                        placeholder="Email@mail.com">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group fill form-show-validation">
                                    <label>Nomor Handphone</label>
                                    <input id="phone" name="phone" type="number" class="form-control"
                                        placeholder="0822222222">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group fill form-show-validation">
                                    <label>Jurusan</label>
                                    <select name="major" id="major" class="form-control">
                                        <option value="" selected disabled hidden>Choose here</option>
                                        <option value="Teknik informatika">Teknik Informatika</option>
                                        <option value="Sistem informasi">Sistem informasi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group fill form-show-validation">
                                    <label>Semester</label>
                                    <select name="semester" id="semester" class="form-control">
                                        <option value="" selected disabled hidden>Choose here</option>
                                        <option value="1">1</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group fill form-show-validation">
                                    <label>Jenis kelamin</label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="" selected disabled hidden>Choose here</option>
                                        <option value="male">Laki - Laki</option>
                                        <option value="female">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group form-show-validation">
                                    <label for="photo">Photo Pribadi</label>
                                    <input type="file" class="form-control " style="height: 44px !important"
                                        name="photo" id="photo">
                                </div>
                            </div>
                            <div class="col-md-12" id="form-status">
                            </div>
                            <div class="col-md-12">
                                <div class="form-group fill form-show-validation">
                                    <label>Alamat</label>
                                    <textarea name="address" id="address" class="form-control" cols="10" rows="4" placeholder="Jl.Palu"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group fill form-show-validation">
                                    <label>Alasan bergabung</label>
                                    <textarea name="reason_register" id="reason_register" class="form-control" cols="10" rows="4" placeholder="Jl.Palu"></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-outline-primary">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
