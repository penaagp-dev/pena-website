@extends('layout.base')

@section('content')
    <x-category.category-modal></x-category.category-modal>
    <script type="module" src="{{ asset('js/category/category.controller.js') }}"></script>
    <div class="card">
        <x-base-header headerTitle="Inventaris Barang" buttonAdd="true" headerAddButton="Tambah Data" 
            modalId="#inventarisModal" buttonExport="false" exportId="exportInventaris">
        </x-base-header>
        <x-base-body>
            <x-base-table initId="dataTable">
                <x-slot name="thead">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Lokasi Barang</th>
                        <th>Kategory</th>
                        <th>Status</th>
                        <th>Kondisi</th>
                        <th>Deskripsi</th>
                        <th>Foto Barang</th>
                        <th>Aksi</th>
                    </tr>
                </x-slot>
            </x-base-table>
        </x-base-body>
    </div>
    <x-inventaris.inventaris-modal></x-inventaris.inventaris-modal>
    <script type="module" src="{{ asset('js/inventaris/inventaris.controller.js') }}"></script>

@endsection