<form wire:submit.prevent="updateSetting" class="mb-3">
    <x-toast/>
    <div class="modal-body">
        @foreach ($settings as $key => $value)
            <div class="row g-2">
                <div class="col mb-0">
                    <label for="{{ $key }}" class="form-label form-label-lg">{{ $key }}</label>
                    <input wire:model.lazy="settings.{{$key}}" type="text" id="{{ $value }}" value="{{ $value }}" class="form-control" 
                        style="font-size: 1.4em; font-weight: bold;" />
                    @error("settings.{$key}") 
                    <span class="text-danger error">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <hr>
        @endforeach
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            <a href="{{ route('settings.index') }}">{{ __('Close') }}</a>
        </button>
        <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
    </div>
</form>
