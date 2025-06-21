    {{-- modal updert data --}}
    <div class="modal fade" id="coreManagementModal" tabindex="-1" role="dialog" aria-labelledby="coreManagementLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
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
                            <div class="col-md-12">
                                <div class="form-group fill form-show-validation">
                                    <input type="hidden" name="id" id="id" value="">
                                    <label>Nama</label>
                                    <input id="name" name="name" type="text" class="form-control"
                                        placeholder="Nama anda" autocomplete="off">
                                </div>
                                <div class="form-group fill form-show-validation">
                                    <label>Jabatan</label>
                                    <select name="jabatan" id="jabatan" class="form-control">
                                        <option value="" selected disabled hidden>Choose here</option>
                                        <option value="ketua umum">Ketua Umum</option>
                                        <option value="pembina">Pembina</option>
                                        <option value="bendahara">Bendahara</option>
                                        <option value="sekretaris">Seketaris</option>
                                        <option value="wakil ketua umum">Wakil Ketua Umum</option>
                                        <option value="learning">Learning</option>
                                        <option value="entrepreneur">Entrepreneur</option>
                                    </select>
                                </div>
                                <div class="form-group form-show-validation">
                                    <label for="photo">Gambar</label>
                                    <input type="file" class="form-control " style="height: 44px !important" name="photo" id="photo">
                                </div>
                                <div class="form-group form-show-validation">
                                    <label for="link">Link</label>
                                    <input type="link" class="form-control" style="height: 44px !important" name="link" id="link">
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
