@extends('layout.base')
{{-- @section('title')
    Gallery
@endsection --}}
@section('content')
    <div class="card">
        <x-base-header headerTitle="Data calon anggota" buttonAdd="true" headerAddButton="Tambah Data"
            modalId="#registerCaModal" buttonExport="true" exportId="export"></x-base-header>
        <x-base-body>
            <x-base-table initId="dataTable">
                <x-slot name="thead">
                    <tr>
                        <th>Info umum</th>
                        <th>Info kampus</th>
                        <th>Alasan bergabung</th>
                        <th>Agama</th>
                        <th>Gambar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </x-slot>
            </x-base-table>
        </x-base-body>
    </div>

    <x-registerca.registerca-modal></x-registerca.registerca-modal>
    <script type="module" src="{{ asset('js/registerca/registerca.controller.js') }}"></script>
@endsection
