<x-dynamic-component :component="Auth::check() ? 'app-layout' : 'guest-layout'">
    <x-slot name="header">
        <h2 class="text-xl text-gray-800">
            {{ __('Welcome') }}, {{ optional(auth()->user())->name }}
        </h2>
    </x-slot>
    <div class="container d-flex justify-content-center">
        <div class="col-md-6 text-center py-5">
            <h1>Cover your page.</h1>
            <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit
                the text, and add your own fullscreen background photo to make it your own.</p>
            <p class="lead">
                <a href="#" class="btn btn-lg btn-secondary font-weight-bold border-white">Learn more</a>
            </p>
        </div>
    </div>
</x-dynamic-component>
