<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Jenssegers\Agent\Agent;

class UserProfileController extends Controller
{
    /**
     * Show the user profile screen.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function edit(Request $request)
    {
        return view('auth.profile', [
            'request' => $request,
            'user' => $request->user(),
            'sessions' => $this->getSessionsProperty(),
        ]);
    }

    /**
     * Delete user's profile photo.
     *
     * @return void
     */
    public function deleteProfilePhoto()
    {
        Auth::user()->deleteProfilePhoto();

        return back()->with('status-success', 'Profile Photo Deleted!');
    }

    /**
     * Delete the current user.
     */
    public function deleteUser(Request $request, StatefulGuard $auth)
    {
        if (! Hash::check($request->password, Auth::user()->password)) {
            return back()->with('status-fail', 'This password does not match our records.');
        }

        $request->user()->deleteProfilePhoto();
        $request->user()->delete();
        $auth->logout();

        return redirect()->route('welcome');
    }

    /**
     * Logout from other browser sessions.
     *
     * @param  \Illuminate\Contracts\Auth\StatefulGuard  $guard
     * @return void
     */
    public function logoutOtherBrowserSessions(Request $request, StatefulGuard $guard)
    {
        if (! Hash::check($request->password, Auth::user()->password)) {
            return back()->with('status-fail', 'This password does not match our records.');
        }

        if (config('session.driver') !== 'database') {
            return back()->with('status-fail', 'This feature doesn\'t supported!');
        }

        DB::table(config('session.table', 'sessions'))
            ->where('user_id', Auth::user()->getAuthIdentifier())
            ->where('id', '!=', request()->session()->getId())
            ->delete();

        return back()->with('status-success', 'Logged out from other browser sessions!');
    }

    /**
     * Get the current sessions.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getSessionsProperty()
    {
        if (config('session.driver') !== 'database') {
            return collect();
        }

        return collect(
            DB::table(config('session.table', 'sessions'))
                    ->where('user_id', Auth::user()->getAuthIdentifier())
                    ->orderBy('last_activity', 'desc')
                    ->get()
        )->map(function ($session) {
            return (object) [
                'agent' => $this->createAgent($session),
                'ip_address' => $session->ip_address,
                'is_current_device' => $session->id === request()->session()->getId(),
                'last_active' => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
            ];
        });
    }

    /**
     * Create a new agent instance from the given session.
     *
     * @param  mixed  $session
     * @return \Jenssegers\Agent\Agent
     */
    protected function createAgent($session)
    {
        return tap(new Agent, function ($agent) use ($session) {
            $agent->setUserAgent($session->user_agent);
        });
    }
}
