<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        if(isset($input['type']) && $input['type'] == "photo"){
            // profile photo validator
            $validator = Validator::make($input, [
                'photo' => ['required', 'image', 'max:1024'],
            ]);

            if(optional($validator)->fails()){
                return back()->with('status-fail-toast', 'Please select a valid image file!')
                    ->withErrors($validator, 'profilePhoto');
            }

        } else {
            // account info validator
            $validator = Validator::make($input, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            ]);

            if(optional($validator)->fails()){
                return back()->withErrors($validator. 'profile');
            }
        }

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
            return back()->with('status-success-toast', 'Profile photo Uploaded!');
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
            ])->save();
        }

        return back()->with('status-success-toast', 'Profile Updated!');
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
