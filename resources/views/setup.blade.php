@extends('layout.base')
@section('title')
    Setup
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
                data-target="#SetupModel" id="#myBtn">
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            function getDataSetup(){
                let dataTable = $("#dataTable").DataTable({
                    "responsive": true,
                    "lengthChange": true,
                    "autoWidth": false
                });

                $.ajax({
                   url : "{{ url('api/v2/dd0af7cb-a745-4810-a12c-cefa8a4b24d8/setup') }}",
                   method : "GET",
                   dataType : "json",
                   success : function(response){
                        let tableBody = "";
                        $.each(response.data, function (index, item) {
                            tableBody += `
                            <tr>
                                <td>${index + 1}</td>
                                <td>${item.title}</td>
                                <td>${item.deskripsi}</td>
                                <td>${item.gambar}</td>
                                <td>
                                    <button type='button' class='btn btn-primary edit-modal' data-toggle='modal' data-target='#EditModal' data-uuid='${item.uuid}'>
                                        <i class='fa fa-edit'></i>
                                    </button>
                                    <button type='button' class='btn btn-danger delete-confirm' data-uuid='${item.uuid}'>
                                        <i class='fa fa-trash'></i>
                                    </button>
                                </td>
                            </tr>`;
                        });
                        let table = $("#dataTable").DataTable();
                        table.clear().draw();
                        table.row.add($(tableBody)).draw();
                   },
                   error:function(){
                    console.log("Failed to get data from server ");
                   }
                })
            }
            getDataSetup();
        })
    </script>
@endsection
