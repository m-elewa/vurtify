@if(session('status-success'))
    <div class="container pt-5 col-lg-5">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status-success') }}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@elseif(session('status-fail'))
    <div class="container pt-5 col-lg-5">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('status-fail') }}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@elseif(session('status'))
    <div class="container pt-5 col-lg-5">
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif
