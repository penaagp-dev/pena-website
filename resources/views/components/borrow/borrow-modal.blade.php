    {{-- modal updert data --}}
    <div class="modal fade" id="borrowModal" tabindex="-1" role="dialog" aria-labelledby="coreManagementLabel"
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
                                    <input type="hidden" id="id" name="id">
                                    <label>Nama Barang</label>
                                    <select name="id_inventaris" id="id_inventaris" class="form-control">
                                        <option value="" selected disabled hidden>Choose here</option>
                                    </select>
                                </div>

                                <div class="form-group form-show-validation">
                                    <label for="name_borrow">Nama Peminjam</label>
                                    <input type="text" class="form-control " name="name_borrow" id="name_borrow">
                                </div>

                                <div class="form-group form-show-validation">
                                    <label for="quantity">Jumlah</label>
                                    <input type="number" class="form-control" name="quantity" id="quantity">
                                </div>

                                <div class="form-group form-show-validation">
                                    <label for="description">Deskripsi</label>
                                    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
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
