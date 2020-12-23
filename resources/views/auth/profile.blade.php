<x-app-layout>
    <div class="container my-auto py-5">
        <div class="row justify-content-center">

            {{-- Profile Photo --}}
            <div class="text-center mb-5 col-md-12">

                <update-profile-photo submit-route="{{ route('user-profile-photo.update') }}"></update-profile-photo>
                <p>
                    <form action="{{ route('profile.delete-profile-photo') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-secondary text-white px-4">
                            {{ __('Delete Profile Photo') }}
                        </button>
                    </form>
                </p>
            </div> {{-- / Profile Photo --}}

            <div class="col-md-6">
                <!-- Profile Information -->
                <update-profile :init-user='@json($user)' submit-route="{{ route('user-profile-information.update') }}"></update-profile>
                <!-- / Profile Information -->

                {{-- Browser Sessions --}}
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="card-title py-1">
                            {{ __('Browser Sessions') }}
                        </h6>

                        <p>
                            {{ __('If necessary, you may logout of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.') }}
                        </p>

                        @if(count($sessions) > 0)
                            <div class="mt-3 py-3">
                                <!-- Other Browser Sessions -->
                                @foreach($sessions as $session)
                                    <div class="d-flex py-2 align-content-center">
                                        @if($session->agent->isDesktop())
                                            <span class="d-flex justify-content-center align-items-center" style="width: 50px">
                                                <i class="fas fa-desktop text-black-50 fs-2"></i>
                                            </span>
                                        @else
                                            <span class="d-flex justify-content-center align-items-center" style="width: 50px">
                                                <i class="fas fa-mobile-alt text-black-50 fs-2"></i>
                                            </span>
                                        @endif

                                        <div class="ms-3">
                                            <div class="text-small muted">
                                                {{ $session->agent->platform() }} -
                                                {{ $session->agent->browser() }}
                                            </div>

                                            <div>
                                                <div class="text-small text-muted">
                                                    {{ $session->ip_address }},
                                                    @if($session->is_current_device)
                                                        <span
                                                            class="font-weight-bold text-primary">{{ __('This device') }}</span>
                                                    @else
                                                        {{ __('Last active') }}
                                                        {{ $session->last_active }}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <div class="form-group mb-0 mt-2">
                            <button class="btn btn-secondary text-white px-4" data-bs-toggle="modal"
                                data-bs-target="#logout-other-browser-sessions">
                                {{ __('Logout Other Browser Sessions') }}
                            </button>
                        </div>
                    </div>
                </div> {{-- / Browser Sessions --}}
            </div>

            <div class="col-md-6">

                {{-- Update Password --}}
                <div class="card mb-4">
                    <div class="card-body">
                        <h6 class="card-title py-1">
                            {{ __('Update Password') }}
                        </h6>
                        <form method="POST" action="{{ route('user-password.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="custom-form-floating">
                                <input placeholder="{{ __('Current Password') }}"
                                    id="current_password" type="password"
                                    class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                                    name="current_password" required>
                                <label for="current_password">{{ __('Current Password') }}</label>

                                @error('current_password', 'updatePassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="custom-form-floating">
                                <input placeholder="Password" id="password" type="password"
                                    class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                                    name="password" required autocomplete="new-password">
                                <label for="password">{{ __('Password') }}</label>

                                @error('password', 'updatePassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="custom-form-floating">
                                <input placeholder="Confirm Password" id="password-confirm" type="password"
                                    class="form-control" name="password_confirmation" required
                                    autocomplete="new-password">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                            </div>

                            <div class="form-group mb-0 mt-2">
                                <button type="submit" class="btn btn-primary text-white px-4">
                                    {{ __('Save') }}
                                </button>
                            </div>

                        </form>
                    </div>

                </div> {{-- / Update Password --}}

                {{-- Delete Account --}}
                <div class="card border-danger mb-4">
                    <div class="card-body text-danger">
                        <h6 class="card-title py-1">
                            {{ __('Delete Account') }}
                        </h6>
                        <p>
                            {{ __('Once you delete a repository, there is no going back. Please be certain.') }}
                        </p>
                        <button class="btn btn-danger text-white px-4" data-bs-toggle="modal"
                            data-bs-target="#delete-account">
                            {{ __('Delete Account') }}
                        </button>
                    </div>
                </div> {{-- / Delete Account --}}

            </div>
        </div>
    </div>


    {{-- Modals --}}
    {{-- delete account modal --}}
    <x-modal>
        <x-slot name="modalId">
            delete-account
        </x-slot>
        <x-slot name="modalTitle">
            delete account
        </x-slot>
        <x-slot name="modalFooter">
            <div class="d-grid gap-2 col-4 mx-auto">
                <button type="button" class="btn btn-danger text-white fw-bold fs-5"
                    onclick="document.getElementById('delete-account-form').submit();">Delete</button>
            </div>
        </x-slot>

        <form id="delete-account-form" action="{{ route('profile.delete-user') }}" method="POST">
            @csrf
            @method('DELETE')
            <p class="mb-4 fw-bold text-muted">
                Please enter your password.
            </p>
            <div class="custom-form-floating">
                <input placeholder="{{ __('Password') }}" id="delete-acount-password" type="password"
                    class="form-control" name="password" required>
                <label for="delete-acount-password">{{ __('Current Password') }}</label>
            </div>
        </form>
    </x-modal> {{-- / delete account modal --}}

    {{-- logout other browser sessions model --}}
    <x-modal>
        <x-slot name="modalId">
            logout-other-browser-sessions
        </x-slot>
        <x-slot name="modalTitle">
            logout other browser sessions
        </x-slot>
        <x-slot name="modalFooter">
            <div class="d-grid gap-2 col-4 mx-auto">
                <button type="button" class="btn btn-primary text-white fw-bold fs-5"
                    onclick="document.getElementById('logout-other-browser-sessions-form').submit();">Submit</button>
            </div>
        </x-slot>

        <form id="logout-other-browser-sessions-form"
            action="{{ route('profile.logout-other-browser-sessions') }}" method="POST">
            @csrf
            @method('DELETE')
            <p class="mb-4 fw-bold text-muted">
                Please enter your password.
            </p>
            <div class="custom-form-floating">
                <input placeholder="{{ __('Password') }}" id="logout-acount-password" type="password"
                    class="form-control" name="password" required>
                <label for="logout-acount-password">{{ __('Current Password') }}</label>
            </div>
        </form>
    </x-modal> {{-- / logout other browser sessions model --}}
</x-app-layout>
