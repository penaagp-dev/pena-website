@props(['headerTitle', 'headerAddButton', 'buttonAdd', 'modalId', 'buttonExport', 'exportId'])

<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold">{{ $headerTitle }}</h6>
    <div class="ml-auto">
        @if ($buttonExport == 'true')
            <i class="fas fa-file-excel fa-2xl pr-3 text-success" style="cursor: pointer;" id="{{ $exportId }}"></i>
        @endif
        @if ($buttonAdd == 'true')
            <button type="button" class="btn btn-outline-primary ml-auto" data-toggle="modal"
                data-target="{{ $modalId }}">
                <i class="fas fa fa-plus"></i> {{ $headerAddButton }}
            </button>
        @endif
    </div>
</div>
