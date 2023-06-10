<form wire:submit.prevent="addEvaluation" method="POST" class="mb-3">
    <x-toast/>
    <div class="modal-body">
        <div class="row g-2">
            <div class="col mb-0">
                <label for="user" class="form-label">{{ __('الطالب') }}</label>
                <select wire:model="user" id="user" class="form-select text-capitalize" required>
                    <option value=""> اختر </option>
                    @foreach ($usersList as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                @error('user') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="row g-2">
            <div class="col mb-0">
                <label for="Date" class="form-label">{{ __('Birth date') }}</label>
                <input wire:model="date" type="date" id="Date" class="form-control" placeholder=".." required/>
                @error('date') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="row g-2">
            <div class="col mb-0">
            @foreach ($activities as $activity)
                <label for="activity{{ $activity->id }}" class="form-label">{{ $activity->name }}</label>
                <select wire:model="activityOptions.{{ $activity->id }}" id="activity{{ $activity->id }}" class="form-select text-capitalize" required>
                    <option value=""> اختر </option>
                    @foreach ($activity->options as $option)
                        <option value="{{ $option->id }}">{{ $option->name }} : {{ $option->points }} نقاط</option>
                    @endforeach
                </select>
                @if ($loop->iteration == 5)
                </div>
                <div class="col mb-0">
                @endif
                @error('user.status') <span class="text-danger error">{{ $message }}</span>@enderror
            @endforeach
            </div>
            <div class="col mb-0">
            </div>
        </div>


    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            <a href="{{ route('users.index') }}">{{ __('Close') }}</a>
        </button>
        <button type="submit" class="btn btn-primary">{{ __('Save changes') }}</button>
    </div>
</form>
