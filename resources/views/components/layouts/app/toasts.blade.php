<div class="toast-absolute toast-container" style="min-width: 350px;">
    @if(session('status-success-toast'))
        <div class="toast d-flex align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive"
            aria-atomic="true" data-autohide="true" data-delay="10000" data-animation="true">
            <div class="toast-body">
                {{ session('status-success-toast') }}
            </div>
            <button type="button" class="btn-close btn-close-white ms-auto me-2" data-dismiss="toast"
                aria-label="Close"></button>
        </div>

    @elseif(session('status-fail-toast'))
        <div class="toast d-flex align-items-center text-white bg-danger border-0" role="alert" aria-live="assertive"
            aria-atomic="true" data-autohide="false">
            <div class="toast-body">
                {{ session('status-fail-toast') }}
            </div>
            <button type="button" class="btn-close btn-close-white ms-auto me-2" data-dismiss="toast"
                aria-label="Close"></button>
        </div>

    @elseif(session('status-toast'))
        <div class="toast d-flex align-items-center text-white bg-primary border-0" role="alert" aria-live="assertive"
            aria-atomic="true" data-autohide="false">
            <div class="toast-body">
                {{ session('status-toast') }}
            </div>
            <button type="button" class="btn-close btn-close-white ms-auto me-2" data-dismiss="toast"
                aria-label="Close"></button>
        </div>
    @endif
</div>
