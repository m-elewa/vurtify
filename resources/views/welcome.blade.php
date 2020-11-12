<x-dynamic-component :component="'guest-layout'">
    <!-- Masthead-->
    <section class="masthead d-flex align-items-center justify-content-center">
        <div class="container col-md-6 align-items-center justify-content-center text-center">
            <h1 class="text-uppercase text-white font-weight-bold pb-3">Laravel PHP Framework</h1>
            <p class="text-white-75 font-weight-light mb-5">
                Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things
            </p>
            <a class="btn btn-primary btn-xl text-white" href="{{ route('register') }}">Learn more</a>
        </div>
    </section>
</x-dynamic-component>
