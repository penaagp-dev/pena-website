@extends('layout.base')
@section('title')
    News
@endsection
@section('content')
      <div id="loading-overlay" class="loading-overlay" style="display: none;">
            <div id="loading" class="loading">
                  <img src="{{ asset('loading.gif') }}" alt="Loading..." />
            </div>
      </div>
      <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold ">Data</h6>
                  <button type="button" class="btn btn-outline-primary ml-auto" data-toggle="modal"
                        data-target="#NewsModel" id="#myBtn">
                        Tambah Data
                  </button>
            </div>
             <!-- /.card-header -->
            <div class="card-body">
                  <div class="table-responsive">
                        <table id="dataTable" class="table table-bordered table-striped">
                              <thead>
                                    <tr>
                                          <th>No</th>
                                          <th>Title</th>
                                          <th>Deskripsi</th>
                                          <th>Gambar</th>
                                          <th>Link</th>
                                          <th>Tangal Update</th>
                                    </tr>
                              </thead>
                              <tbody>

                              </tbody>
                        </table>
                  </div>
            </div>
      </div>
      {{-- modal updert data --}}
      <div class="modal fade" id="NewsModel" tabindex="-1" role="dialog" aria-labelledby="NewsModelLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                  <div class="modal-content">
                        <div class="modal-header">
                              <h5 class="modal-title" id="NewsModelLabel">Tambah Data</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                        <div class="modal-body">
                              <form id="UpsertData" method="POST" enctype="multipart/form-data">
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
                                                      <label>Title</label>
                                                      <input id="title" name="title" type="text" class="form-control"
                                                            placeholder="input here....." autocomplete="off">
                                                </div>
                                                <div class="form-group fill">
                                                      <input type="hidden" name="uuid" id="uuid" value="">
                                                      <label>Deskripsi</label>
                                                      <textarea id="deskripsi" name="deskripsi" class="form-control" rows="3"></textarea>
                                                </div>
                                                <div class="form-group">
                                                      <label for="gambar">Gambar</label>
                                                      <div class="custom-file">
                                                            <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                                            <label class="custom-file-label" for="gambar" id="gambar-label">Upload gambar</label>
                                                      </div>
                                                </div>
                                                <div class="form-group fill">
                                                      <input type="hidden" name="uuid" id="uuid" value="">
                                                      <label>Link</label>
                                                      <input id="link" name="link" type="link" class="form-control"
                                                            placeholder="input here....." autocomplete="off">
                                                </div>
                                                <div class="form-group fill">
                                                      <input type="hidden" name="uuid" id="uuid" value="">
                                                      <label>Tanggal Update</label>
                                                      <input id="tgl_update" name="tgl_update" type="date" class="form-control"
                                                            placeholder="input here...." autocomplete="off">
                                                </div>
                                          </div>
                                    </div>
                              </form>
                        </div>
                        <div class="modal-footer">
                              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
                              <button type="submit" form="UpsertData" class="btn btn-outline-primary">Submit Data</button>
                        </div>
                  </div>
            </div>
      </div>
        