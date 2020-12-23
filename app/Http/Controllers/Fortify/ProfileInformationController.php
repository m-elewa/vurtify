<?php

namespace App\Http\Controllers\Fortify;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
        if(isset($request->type) && $request->type == "photo"){
            // profile photo validator
            $validator = Validator::make($request->all(), [
                'photo' => ['required', 'image', 'max:1024'],
            ]);

            if(optional($validator)->fails()){
                return response()->json([
                    'status' => 'error',
                    'data' => $validator->errors(),
                ], 422);
            }

        } else {
            // account info validator
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($request->user()->id)],
            ]);

            if(optional($validator)->fails()){
                return response()->json([
                        'status' => 'error',
                        'data' => $validator->errors(),
                ], 422);
            }
        }

        if (isset($request->photo)) {
            $request->user()->updateProfilePhoto($request->photo);

            return response()->json([
                'status' => 'ok',
                'message' => 'Profile photo Uploaded!',
                'data' => $request->user()
            ]);
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

        return response()->json([
                'status' => 'ok',
                'message' => 'Profile Updated!',
                'data' => $request->user()
            ]);
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
