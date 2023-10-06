<form wire:submit.prevent="updateProfile" method="POST">
    <div class="row">
        <div class="mb-3">
            <x-input wire="user.name" label="Name" name="name"/>
        </div>
        <div class="mb-3 col-md-6">
            <x-input wire="password" label="Password" type="password" name="password"/>
        </div>
        <div class="mb-3 col-md-6">
            <x-input wire="password_confirmation" label="Password Confirmation" type="password" name="password_confirmation"/>
        </div>
    </div>
    <div class="mt-2">
        <a href="{{ route('dashboard') }}">
            <button type="button" class="btn btn-outline-secondary">{{ __('Close') }}</button>
        </a>
        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
    </div>
</form>
