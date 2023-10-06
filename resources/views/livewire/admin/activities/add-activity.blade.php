<form wire:submit.prevent="store" method="POST" class="mb-3" accept-charset="UTF-8">
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
