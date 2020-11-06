<x-dynamic-component :component="Auth::check() ? 'app-layout' : 'guest-layout'">
    <x-slot name="header">
        <h2 class="text-xl text-gray-800">
            {{ __('Welcome') }}, {{ optional(auth()->user())->name }}
        </h2>
    </x-slot>
    <div class="container d-flex justify-content-center">
        <div class="col-md-6 text-center py-5">
            <h1>Laravel PHP Framework</h1>
            <p class="lead">Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.</p>
            <p class="lead">
                <a href="{{ route('register') }}" class="btn btn-lg btn-secondary font-weight-bold border-white">Learn more</a>
            </p>
        </div>
    </div>
</x-dynamic-component>
