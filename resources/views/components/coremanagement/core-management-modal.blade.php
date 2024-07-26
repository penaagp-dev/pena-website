    {{-- modal updert data --}}
    <div class="modal fade" id="coreManagementModal" tabindex="-1" role="dialog" aria-labelledby="coreManagementLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="coreManagementLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formTambah">
                        @csrf
                        <div class="row py-2">
                            <div class="col-md-12">
                                <div class="text-center">
                                    <img src="" alt="" id="preview" class="mx-auto d-block pb-2"
                                        style="max-width: 200px; padding-top: 23px">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group fill">
                                    <input type="hidden" name="uuid" id="uuid" value="">
                                    <label>Nama</label>
                                    <input id="nama" name="nama" type="text" class="form-control"
                                        placeholder="input here..." autocomplete="off">
                                </div>
                                <div class="form-group fill">
                                    <label>Jabatan</label>
                                    <select name="jabatan" id="jabatan" class="form-control" >
                                        <option value="" selected disabled hidden>Choose here</option>
                                        <option value="ketua_umum">Ketua Umum</option>
                                        <option value="pembina">Pembina</option>
                                        <option value="bendahara">Bendahara</option>
                                        <option value="seketaris">Seketaris</option>
                                        <option value="waketum">Wakil Ketua Umum</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                        <label class="custom-file-label" for="gambar" id="gambar-label">Upload
                                            gambar</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Submit Data</button>
                </div>
            </div>
        </div>
    </div>
