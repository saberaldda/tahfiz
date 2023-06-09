<form wire:submit.prevent="updateUser" method="POST" class="mb-3">
    <div class="modal-body">
        <div class="row g-2">
            <div class="col mb-0">
            @if ($photo)
                <img src="{{ $photo->temporaryUrl() }}" alt="" class="w-px-150 h-px-150 rounded-circle">
            @elseif ($user->photo)
                <img src="{{ $user->fullPhotoPath }}" alt="" class="w-px-150 h-px-150 rounded-circle">
            @else
                <img src="https://via.placeholder.com/400x400.png/89edff?text=Placeholder" alt="" class="w-px-150 h-px-150 rounded-circle">
            @endif
            <div wire:loading wire:target="photo"> {{ __('Uploading...') }} </div>
            </div>
            <div class="col mb-0">
                <label for="photoWithTitle" class="form-label">{{ __('Photo') }}</label>
                <input wire:model="photo" type="file" id="photoWithTitle" class="form-control" />
                @error('photo') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="row g-2">
            <div class="col mb-0">
                <label for="nameWithTitle" class="form-label">{{ __('Name') }}</label>
                <input wire:model='user.name' type="text" id="nameWithTitle" class="form-control"
                    placeholder="{{ __('Enter Name') }}" />
                @error('user.name') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="col mb-0">
                <label for="emailWithTitle" class="form-label">{{ __('Email') }}</label>
                <input wire:model='user.email' type="text" id="emailWithTitle" class="form-control"
                    placeholder="xxxx@xxx.xx" />
                @error('user.email') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="col mb-0">
                <label for="statusWithTitle" class="form-label">{{ __('Status') }}</label>
                <select wire:model="user.status" id="statusWithTitle" class="form-select text-capitalize">
                    <option value="1">{{ __('Active') }}</option>
                    <option value="0">{{ __('Inactive') }}</option>
                </select>
                @error('user.status') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="row g-2">
            <div class="col mb-0">
                <label for="DOBWithTitle" class="form-label">{{ __('Birth date') }}</label>
                <input wire:model="user.date_of_birth" type="date" id="DOBWithTitle" class="form-control" placeholder=".." />
                @error('user.date_of_birth') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            {{-- <div class="col mb-0">
                <label for="genderWithTitle" class="form-label">{{ __('Gender') }}</label>
                <select wire:model="user.gender" id="genderWithTitle" class="form-select text-capitalize">
                    <option value="">{{ __('Select Gender') }}</option>
                    <option value="male">{{ __('Male') }}</option>
                    <option value="female">{{ __('Female') }}</option>
                </select>
                @error('user.gender') <span class="text-danger error">{{ $message }}</span>@enderror
            </div> --}}
            <div class="col mb-0">
                <label for="typeWithTitle" class="form-label">{{ __('User Type') }}</label>
                <select wire:model="user.type" id="typeWithTitle" class="form-select text-capitalize">
                    <option value="">{{ __('Select User Type') }}</option>
                    <option value="student">{{ __('Student') }}</option>
                    <option value="teacher">{{ __('Teacher') }}</option>
                </select>
                @error('user.type') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
        {{-- <div class="row g-2">
            <div class="col mb-0">
                <label for="mobileWithTitle" class="form-label">{{ __('Mobile Number') }}</label>
                <input wire:model="user.mobile_number" type="text" id="mobileWithTitle" class="form-control"
                    placeholder="{{ __('Add full mobile number') }}: 00966" />
                @error('user.mobile_number') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div> --}}
        <div class="row g-2">
            <div class="col mb-0">
                <label for="passwordWithTitle" class="form-label">{{ __('Password') }}</label>
                <input wire:model="password" type="text" id="passwordWithTitle" class="form-control"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
            <div class="col mb-0">
                <label for="passwordConWithTitle" class="form-label">{{ __('Password') }}</label>
                <input wire:model="password_confirmation" type="text" id="passwordWithTitle" class="form-control"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                @error('password_confirmation') <span class="text-danger error">{{ $message }}</span>@enderror
            </div>
        </div>
        <div class="row g-2">
            <div class="col mb-0">
                <label for="noteWithTitle" class="form-label">{{ __('Notes') }}</label>
                <textarea wire:model="user.note" class="form-control" rows="3"></textarea>
                @error('user.note') <span class="text-danger error">{{ $message }}</span>@enderror
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
