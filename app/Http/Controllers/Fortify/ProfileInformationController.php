<?php

namespace App\Http\Controllers\Fortify;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileInformationController extends Controller
{
    /**
     * Update the user's profile information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return new JsonResponse([
        //                 'status' => 'error',
        //             ]);

        if(isset($request->type) && $request->type == "photo"){
            // profile photo validator
            $validator = Validator::make($request->all(), [
                'photo' => ['required', 'image', 'max:1024'],
            ]);

            if(optional($validator)->fails()){
                return back()->with('status-fail-toast', 'Please select a valid image file!')
                    ->withErrors($validator, 'profilePhoto');
            }

        } else {
            // account info validator
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255', 'min:100'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($request->user()->id)],
            ]);

            if(optional($validator)->fails()){
                return $request->wantsJson()
                    ? new JsonResponse([
                        'status' => 'error',
                        'data' => $validator->errors(),
                    ])
                    : back()->withErrors($validator, 'profile');
            }
        }

        if (isset($request->photo)) {
            $request->user()->updateProfilePhoto($request->photo);
            return back()->with('status-success-toast', 'Profile photo Uploaded!');
        }

        if ($request->email !== $request->user()->email &&
        $request->user() instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($request->user(), $request->all());
        } else {
            $request->user()->forceFill([
                'name' => $request->name,
                'email' => $request->email,
            ])->save();
        }

        return $request->wantsJson()
            ? new JsonResponse([
                'status' => 'ok',
                'message' => 'Profile Updated!',
                'data' => $request->user()->only(['name', 'email'])
            ])
            : back()->with('status-success-toast', 'Profile Updated!');
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
