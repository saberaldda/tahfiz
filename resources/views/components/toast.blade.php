@if (Session::has('success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toastElement = document.getElementById('success-toast');
        var toast = new bootstrap.Toast(toastElement);

        toast.show();

        setTimeout(function () {
            toast.hide();
        }, 5000); // Hide the toast after 5 seconds (5000 milliseconds)

        setTimeout(function () {
            toast.dispose();
        }, 6000); // Remove the toast from the DOM after 6 seconds (6000 milliseconds)
    });
</script>

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
