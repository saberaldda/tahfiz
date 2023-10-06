
@if (isset($label))
    <label for="{{ $id ?? $name }}" class="form-label">{{ __($label) }}</label>
@endif

<input 
    @if (isset($wire)) wire:model.lazy="{{ $wire }}" @endif
    type="{{ $type ?? 'text' }}"
    id="{{ $id ?? $name }}" 
    class="form-control"
    placeholder="{{ __(@$placeholder) }}"
    @if (isset($value)) value="{{ $value }}" @endif
    @if (isset($disabled)) disabled  @endif
    @if (isset($autofocus)) autofocus  @endif
    @if (isset($autocomplete)) autocomplete="{{ $autocomplete }}"  @endif/>

@error($wire ?? $name) <span class="text-danger error">{{ $message }}</span>@enderror
