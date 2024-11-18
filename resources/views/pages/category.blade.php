@extends('layout.base')
@section('content')
    <div class="card">
        <x-base-header headerTitle="Kategori Barang" buttonAdd="true" headerAddButton="Tambah Data" 
            modalId="#categoryModal" buttonExport="false" exportId="exportCategory">
        </x-base-header>
        <x-base-body>
            <x-base-table initId="dataTable">
                <x-slot name="thead">
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </x-slot>
            </x-base-table>
        </x-base-body>  
    </div>
    <x-category.category-modal></x-category.category-modal>
    <script type="module" src="{{ asset('js/category/category.controller.js') }}"></script>
@endsection
