@if (Session::has('success'))
    <div id="success-toast" class="bs-toast toast toast-placement-ex m-2 fade bg-success top-2 end-0 show" >
        <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-semibold">Success</div>
            <small>Now</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">{{ Session::get('success') }}</div>
    </div>
@endif
