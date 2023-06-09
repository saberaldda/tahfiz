@if (Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ Session::get('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has('warning'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        {{ Session::get('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has('info'))
    <div class="alert alert-info alert-dismissible" role="alert">
        {{ Session::get('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has('primary'))
    <div class="alert alert-primary alert-dismissible" role="alert">
        {{ Session::get('primary') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (Session::has('warning'))
    <div class="alert alert-warning alert-dismissible" role="alert">
        {{ Session::get('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

