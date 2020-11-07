<x-app-layout>
    <x-slot name="header">
        {{ __('Profile') }}
    </x-slot>

    <div class="container my-auto pb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

            <!-- Current Profile Photo -->
            <div class="mt-2 text-center">
                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="rounded-circle img-thumbnail" style="width: 200px;height:200px">
                <p>
                    <form action="{{ route('profile.delete-profile-photo') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary text-white">
                            {{ __('Delete Profile Photo') }}
                        </button>
                    </form>
            </p>
            </div>



            {{-- Profile Information --}}
            <div class="card mt-3">
                <div class="card-header">{{ __('Profile Information') }}</div>

                <div class="card-body">
                <div class="card-title">
                    {{ __('Update your account\'s profile information and email address.') }}
                </div>
                    <form method="POST" action="{{ route('user-profile-information.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-label-group">
                            <input placeholder="{{ __('Photo') }}" id="photo" type="file" class="form-control @error('photo', 'profile') is-invalid @enderror" name="photo">
                            <label for="photo">{{ __('Photo') }}</label>

                            @error('photo', 'profile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                        <div class="form-label-group">
                                <input  value="{{ old('name', $user->name) }}" placeholder="Name" id="name" type="text" class="form-control @error('name', 'profile') is-invalid @enderror" name="name" autocomplete="name">
                                <label for="name">{{ __('Name') }}</label>

                                @error('name', 'profile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-label-group">
                                <input required value="{{ old('email', $user->email) }}" placeholder="Email" id="email" type="email" class="form-control @error('email', 'profile') is-invalid @enderror" name="email" autocomplete="email">
                                <label for="password-confirm">{{ __('Email') }}</label>
                        </div>

                        @error('email', 'profile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        <div class="form-group mb-0 mt-2">
                                <button type="submit" class="btn btn-primary text-white">
                                    {{ __('Save') }}
                                </button>

                                <button type="button" class="btn btn-danger text-white" data-toggle="modal" data-target="#delete-account">
                                    {{ __('Delete Account') }}
                                  </button>

                        </div>

                    </form>
                </div>
                </div>
{{-- / Profile Information --}}




                {{-- Update Password --}}
            <div class="card mt-3">
                <div class="card-header">{{ __('Update Password') }}</div>

                <div class="card-body">
                <div class="card-title">
                    {{ __('Ensure your account is using a long, random password to stay secure.') }}
                </div>
                    <form method="POST" action="{{ route('user-password.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="form-label-group">
                            <input placeholder="{{ __('Current Password') }}" id="current_password" type="password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" name="current_password" required>
                            <label for="current_password">{{ __('Current Password') }}</label>

                            @error('current_password', 'updatePassword')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-label-group">
                                <input placeholder="Password" id="password" type="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <label for="password">{{ __('Password') }}</label>

                                @error('password', 'updatePassword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-label-group">
                                <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        </div>

                        <div class="form-group mb-0 mt-2">
                                <button type="submit" class="btn btn-primary text-white">
                                    {{ __('Save') }}
                                </button>
                        </div>

                    </form>
                </div>

            </div>
{{-- / Update Password --}}



            {{-- Browser Sessions --}}
            <div class="card mt-3">
                <div class="card-header">{{ __('Browser Sessions') }}</div>

                <div class="card-body">
                <div class="card-title">
                    {{ __('Manage and logout your active sessions on other browsers and devices.') }}
                </div>

                <p>
                    {{ __('If necessary, you may logout of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.') }}
                </p>



                @if (count($sessions) > 0)
            <div class="mt-5 space-y-6">
                <!-- Other Browser Sessions -->
                @foreach ($sessions as $session)
                    <div class="flex items-center">
                        <div>
                            @if ($session->agent->isDesktop())
                                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                    <path d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8 text-gray-500">
                                    <path d="M0 0h24v24H0z" stroke="none"></path><rect x="7" y="4" width="10" height="16" rx="1"></rect><path d="M11 5h2M12 17v.01"></path>
                                </svg>
                            @endif
                        </div>

                        <div class="ml-3">
                            <div class="text-sm text-gray-600">
                                {{ $session->agent->platform() }} - {{ $session->agent->browser() }}
                            </div>

                            <div>
                                <div class="text-xs text-gray-500">
                                    {{ $session->ip_address }},

                                    @if ($session->is_current_device)
                                        <span class="text-green-500 font-semibold">{{ __('This device') }}</span>
                                    @else
                                        {{ __('Last active') }} {{ $session->last_active }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif




                        <div class="form-group mb-0 mt-2">
                                <button type="submit" class="btn btn-primary text-white" data-toggle="modal" data-target="#logout-other-browser-sessions">
                                     {{ __('Logout Other Browser Sessions') }}
                                </button>
                        </div>
                </div>

            </div>
{{-- / Browser Sessions --}}




        </div>
    </div>

    {{-- delete account modal --}}
    <x-modal>
        <x-slot name="modalId">
            delete-account
        </x-slot>
        <x-slot name="modalTitle">
            delete account
        </x-slot>
        <x-slot name="modalFooter">
            <button type="button" class="btn btn-primary text-white" onclick="document.getElementById('delete-account-form').submit();">Delete</button>
        </x-slot>

        <form id="delete-account-form" action="{{ route('profile.delete-user') }}" method="POST">
            @csrf
            @method('DELETE')
            <p>
                Please enter your password.
            </p>
            <div class="form-label-group">
                <input placeholder="{{ __('Password') }}" id="delete-acount-password" type="password" class="form-control" name="password" required>
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
            logout other browser sessions model
        </x-slot>
        <x-slot name="modalFooter">
            <button type="button" class="btn btn-primary text-white" onclick="document.getElementById('logout-other-browser-sessions-form').submit();">Submit</button>
        </x-slot>

        <form id="logout-other-browser-sessions-form" action="{{ route('profile.logout-other-browser-sessions') }}" method="POST">
            @csrf
            @method('DELETE')
            <p>
                Please enter your password.
            </p>
            <div class="form-label-group">
                <input placeholder="{{ __('Password') }}" id="delete-acount-password" type="password" class="form-control" name="password" required>
                <label for="delete-acount-password">{{ __('Current Password') }}</label>
            </div>

        </form>
    </x-modal> {{-- / logout other browser sessions model --}}
</x-app-layout>
