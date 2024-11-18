@extends('layout.base')
@section('content')
<div class="card">
    <x-base-header headerTitle="Manajemen User" buttonAdd="true" headerAddButton="Tambah Data"
        modalId="#userManagementModal"  buttonExport="false"></x-base-header>
    <x-base-body>
        <x-base-table initId="dataTable">
            <x-slot name="thead">
                <tr>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </x-slot>
        </x-base-table>
    </x-base-body>
</div>

<x-usermanagement.user-management-modal></x-usermanagement.user-management-modal>
<script type="module" src="{{ asset('js/usermanagement/usermanagement.controller.js') }}"></script>
@endsection
