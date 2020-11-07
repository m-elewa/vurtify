<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="jumbotron">
            <h5>Welcome, {{ auth()->user()->email }}</h5>
            <h1 class="display-3">Bootstrap 5 Laravel Fortify Authentication</h1>
            <p class="lead">This is a simple auth starter setup for laravel 8 projects</p>
            <hr class="my-4">
            <h2>Features:</h2>
            <ul>
                <li>User Login</li>
                <li>User Registration</li>
                <li>Email Verification</li>
                <li>Forget Password</li>
                <li>Reset Password</li>
            </ul>
            <p class="lead">
                <a class="btn btn-primary text-white" href="" target="_blank" role="button">Github Source Code</a>
            </p>
        </div>
    </div>
</x-app-layout>
