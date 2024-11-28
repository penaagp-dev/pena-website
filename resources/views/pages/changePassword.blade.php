@extends('layout.base')
{{-- @section('title')
    Gallery
@endsection --}}
@section('content')
    <div class="card">
        <x-base-header headerTitle="Ganti password" buttonAdd="false" headerAddButton="Tambah Data"
            modalId="#coreManagementModal"  buttonExport="false"></x-base-header>
        <x-base-body>
            <x-base-table initId="dataTable">
                <x-slot name="thead">
                    <form id="formTambah">
                        <div class="modal-body">
                            @csrf
                            <div class="row py-2">
                                <div class="col-md-12" id="form-preview">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group fill form-show-validation">
                                        <input type="hidden" name="id" id="id" value="">
                                        <label>Password lama</label>
                                        <input id="name" name="name" type="text" class="form-control"
                                            placeholder="Nama anda" autocomplete="off">
                                    </div>
                                    <div class="form-group fill form-show-validation">
                                        <input type="hidden" name="id" id="id" value="">
                                        <label>Password baru</label>
                                        <input id="name" name="name" type="text" class="form-control"
                                            placeholder="Nama anda" autocomplete="off">
                                    </div>
                                    <div class="form-group fill form-show-validation">
                                        <input type="hidden" name="id" id="id" value="">
                                        <label>Konfirmasi password</label>
                                        <input id="name" name="name" type="text" class="form-control"
                                            placeholder="Nama anda" autocomplete="off">
                                    </div>
                                </div>
                            </div>
    
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-primary">Simpan Data</button>
                        </div>
                    </form>
                </x-slot>
            </x-base-table>
        </x-base-body>
    </div>

    <x-coremanagement.core-management-modal></x-coremanagement.core-management-modal>
    <script type="module" src="{{ asset('js/coremanagement/coremanagement.controller.js') }}"></script>
@endsection
