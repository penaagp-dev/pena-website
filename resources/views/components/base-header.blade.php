<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold">{{ $headerTitle }}</h6>
    @if ($buttonAdd == 'true')
        <button type="button" class="btn btn-outline-primary ml-auto" data-toggle="modal" data-target="{{ $modalId }}">
            <i class="fas fa fa-plus"></i> {{ $headerAddButton }}
        </button>
    @endif
</div>
