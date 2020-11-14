<x-guest-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card pb-3">
                    <div class="card-body">
                        <h2 class="card-title text-center py-4">{{ __('Reset Password') }}</h2>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="custom-form-floating">
                                <input placeholder="{{ __('E-Mail Address') }}" id="email"
                                    type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <label for="email">{{ __('E-Mail Address') }}</label>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mt-2 mb-0">
                                <button type="submit" class="btn btn-primary text-white">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
