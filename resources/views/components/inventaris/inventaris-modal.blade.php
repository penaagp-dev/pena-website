    {{-- modal updert data --}}
    <div class="modal fade" id="inventarisModal" tabindex="-1" role="dialog" aria-labelledby="inventarisModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 800px;">
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
                                    <label>Nama </label>
                                    <input id="name_inventaris" name="name_inventaris" type="text" class="form-control"
                                        placeholder="Nama Barang" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group fill form-show-validation">
                                    <label>Jumlah</label>
                                    <input id="stock" name="stock" type="number" class="form-control"
                                        placeholder="Jumlah Barang" autocomplete="off" min="1" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group fill form-show-validation">
                                    <label>Lokasi Barang</label>
                                    <input id="location_item" name="location_item" type="text" class="form-control"
                                        placeholder="Lokasi Barang" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group fill form-show-validation">
                                    <label>Kategori</label>
                                    <select name="id_category" id="id_category" class="form-control">
                                        <option value="" selected disabled hidden>Choose here</option>
                                        <!-- Kategori diambil dari tabel kategori -->
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group fill form-show-validation">
                                    <label>Kondisi</label>
                                    <select name="is_condition" id="is_condition" class="form-control">
                                        <option value="" selected disabled hidden>Choose here</option>
                                        <option value="Baik" {{ old('is_condition') == 'Baik' ? 'selected' : '' }}>Baik</option>
                                        <option value="Rusak" {{ old('is_condition') == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-show-validation">
                                    <label for="img_inventaris">Gambar</label>
                                    <input type="file" class="form-control " style="height: 44px !important" name="img_inventaris" id="img_inventaris">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <textarea placeholder="Deskripsi" class="form-control" name="description" id="description" rows="3"></textarea>
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
