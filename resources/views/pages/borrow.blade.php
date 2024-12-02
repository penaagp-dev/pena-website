@extends('layout.base')
{{-- @section('title')
    Gallery
@endsection --}}
@section('content')
    <div class="card">
        <x-base-header headerTitle="Peminjaman Barang" buttonAdd="true" headerAddButton="Tambah Data"
            modalId="#borrowModal"  buttonExport="false"></x-base-header>
        <x-base-body>
            <x-base-table initId="dataTable">
                <x-slot name="thead">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Nama Peminjam</th>
                        <th>Jumlah</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </x-slot>
            </x-base-table>
        </x-base-body>
    </div>

    <x-borrow.borrow-modal></x-borrow.borrow-modal>
    <script type="module" src="{{ asset('js/borrow/borrow.controller.js') }}"></script>
@endsection
