<x-app-layout>
    <div class="container my-auto pb-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Confirm Password') }}</div>

                    <div class="card-body">
                        <div class="card-title">
                            {{ __('For your security, please confirm your password to continue.') }}
                        </div>
                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div class="form-label-group">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password" placeholder="{{ __('Password') }}">
                                <label for="password">{{ __('Password') }}</label>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-0 mt-2">
                                <button type="submit" class="btn btn-primary text-white">
                                    {{ __('Confirm') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('welcome') }}">
                                    {{ __('Nevermind') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
