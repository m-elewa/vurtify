<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Fortify\ProfileInformationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['middleware' => 'auth:sanctum'], function () {
    // User & Profile...
    Route::get('/user/profile', [UserProfileController::class, 'edit'])
                ->name('profile.edit');

    Route::delete('/user/profile/delete-profile-photo', [UserProfileController::class, 'deleteProfilePhoto'])
                ->name('profile.delete-profile-photo');

    Route::delete('/user/profile/delete-user', [UserProfileController::class, 'deleteUser'])
                ->name('profile.delete-user');

    Route::delete('/user/profile/logout-other-browser-sessions', [UserProfileController::class, 'logoutOtherBrowserSessions'])
                ->name('profile.logout-other-browser-sessions');
});

// Override Fortify route
Route::group(['middleware' => config('fortify.middleware', ['web'])], function () {
    // Profile Information...
    Route::put('/user/profile-information', [ProfileInformationController::class, 'update'])
        ->middleware(['auth'])
        ->name('user-profile-information.update');

    Route::put('/user/profile-photo', [ProfileInformationController::class, 'updateProfilePhoto'])
        ->middleware(['auth'])
        ->name('user-profile-photo.update');
});
