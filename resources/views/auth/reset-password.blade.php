<x-guest-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="card pb-3">
                    <div class="card-body">
                        <h2 class="card-title text-center py-4">{{ __('Reset Password') }}</h2>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token"
                                value="{{ $request->route('token') }}">

                            <div class="custom-form-floating">

                                <input placeholder="{{ __('E-Mail Address') }}" id="email"
                                    type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email', $request->email) }}" required
                                    autocomplete="email" autofocus>
                                <label for="email">{{ __('E-Mail Address') }}</label>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="custom-form-floating">
                                <input placeholder="{{ __('Password') }}" id="password"
                                    type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password">
                                <label for="password">{{ __('Password') }}</label>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="custom-form-floating">
                                <input placeholder="{{ __('Confirm Password') }}"
                                    id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            </div>

                            <div class="form-group mt-2 mb-0">
                                <button type="submit" class="btn btn-primary text-white">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
