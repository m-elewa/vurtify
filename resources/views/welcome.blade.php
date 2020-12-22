<x-dynamic-component :component="'guest-layout'">
    <!-- Masthead-->
    <section class="masthead d-flex align-items-center justify-content-center">
        <div class="container col-md-6 align-items-center justify-content-center text-center">
            <h1 class="text-uppercase text-white font-weight-bold pb-3">Vurtify - Boilerplate Project</h1>
            <p class="text-white-75 font-weight-light mb-5">
                Get the best out of Laravel 8 - without dealing with the complexity of Jetstream and Tailwind. Instead, we are using Bootstrap 5 and Vue 3
            </p>
            <a class="btn btn-primary btn-xl text-white" href="{{ route('register') }}">Learn more</a>
        </div>
    </section>
</x-dynamic-component>
