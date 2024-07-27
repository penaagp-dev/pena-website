@extends('layout.base')
{{-- @section('title')
    Gallery
@endsection --}}
@section('content')
    <div class="card">
        <x-base-header headerTitle="Pengurus Inti" buttonAdd="true" headerAddButton="Tambah Data"
            modalId="#coreManagementModal"></x-base-header>
        <x-base-body>
            <x-base-table initId="dataTable">
                <x-slot name="thead">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </x-slot>
            </x-base-table>
        </x-base-body>
    </div>

    <x-coremanagement.core-management-modal></x-coremanagement.core-management-modal>
    <script type="module" src="{{ asset('js/coremanagement/coremanagement.controller.js') }}"></script>
@endsection
