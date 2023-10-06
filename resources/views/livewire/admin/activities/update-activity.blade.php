<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-3">
        <div class="card-header border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="fw-bold  mt-3"><span class="text-muted fw-light">{{ __('Update Activity') }} /</span> {{ $activity->name }}</h4>
            </div>
        </div>
        <form wire:submit.prevent="update" method="POST" class="mb-3" accept-charset="UTF-8">
            <div class="modal-body">
                <div class="row g-2">
                    <div class="col mb-0">
                        <x-input wire="activity.name" label="Title" name="title" autofocus/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    {{ __('Close') }}
                </button>
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
            </div>
        </form>
    </div>
</div>
