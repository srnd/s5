<?php

Route::filter('check_user', function() {
    if (!Auth::check()) {
        $after = '/'.Request::server('REQUEST_URI');
        return Redirect::to('/login?after='.urlencode($after), 307);
    }
});

Route::filter('check_not_user', function(){
    if (Auth::check()) {
        return Redirect::to('/', 307);
    }
});

Route::filter('check_admin', function() {
    if (!Auth::check() || !Auth::user()->is_admin) {
        Auth::logout();
        $after = '/'.Request::server('REQUEST_URI');
        return Redirect::to('/login?after='.urlencode($after), 307);
    }
});

Route::bind('user', function($value, $route) {
    $user = User::where('username', $value)->first();
    if ($user === null) {
        App::abort(404);
    }

    return $user;
});

Route::bind('app', function($value, $route) {
    $app = Application::where('token', $value)->first();
    if ($app === null) {
        App::abort(404);
    }

    return $app;
});

Route::bind('group', function($value, $route) {
    $group = Group::where('id', $value)->first();
    if ($group === null) {
        App::abort(404);
    }

    return $group;
});

Route::bind('invite', function($value, $route) {
    $invite = Invite::where('id', $value)->first();
    if ($invite === null) {
        App::abort(404);
    }

    return $invite;
});

Route::bind('invite_code', function($value, $route) {
    $invite = Invite::where('code', $value)->first();
    if ($invite === null) {
        App::abort(404);
    }

    return $invite;
});

Route::bind('second_factor', function($value, $route) {
    $factor = SecondFactor::where('id', $value)->first();
    if ($factor === null) {
        App::abort(404);
    }

    return $factor;
});

Route::when('*', 'csrf', ['post']);

Route::group([ 'before' => 'check_user' ], function() {
    Route::any('/me/{page?}', function($page = '') {
        return Redirect::to('/user/'.Auth::user()->username.'/'.$page, 307);
    });

    Route::get('/user/{user}/2fa', 'UserController@getSecondFactors');
    Route::get('/user/{user}/2fa/new/totp', 'UserController@getNewSecondFactorTotp');
    Route::post('/user/{user}/2fa/new/totp', 'UserController@postNewSecondFactorTotp');
    Route::get('/user/{user}/2fa/new/yubikey', 'UserController@getNewSecondFactorYubikey');
    Route::post('/user/{user}/2fa/new/yubikey', 'UserController@postNewSecondFactorYubikey');
    Route::get('/user/{user}/2fa/delete/{second_factor}', 'UserController@getDeleteSecondFactor');
    Route::post('/user/{user}/2fa/delete/{second_factor}', 'UserController@postDeleteSecondFactor');

    Route::controller('/user/{user}', 'UserController');

    Route::get('/apps', 'AppsController@getIndex');
    Route::get('/apps/new', 'AppsController@getNew');
    Route::post('/apps/new', 'AppsController@postNew');
    Route::get('/apps/{app}', 'AppsController@getEdit');
    Route::post('/apps/{app}', 'AppsController@postEdit');
    Route::post('/apps/{app}/addwebhook', 'AppsController@postAddwebhook');
    Route::post('/apps/{app}/deletewebhook/{hookID}', 'AppsController@postDeletewebhook');

    Route::controller('/oauth/{app}', 'OauthController');
});

Route::group(['prefix' => 'admin', 'before' => 'check_admin'], function() {
    Route::controller('/users', 'AdminUsersController');

    Route::post('/groups/{group}/addmember', 'AdminGroupsController@postAddmember');
    Route::post('/groups/{group}/removemember', 'AdminGroupsController@postRemovemember');
    Route::get('/groups/{group}/edit', 'AdminGroupsController@getEdit');
    Route::post('/groups/{group}/edit', 'AdminGroupsController@postEdit');
    Route::get('/groups/{group}/delete', 'AdminGroupsController@getDelete');
    Route::post('/groups/{group}/delete', 'AdminGroupsController@postDelete');
    Route::controller('/groups', 'AdminGroupsController');

    Route::post('/invites/{invite}/addgroup', 'AdminInvitesController@postAddgroup');
    Route::post('/invites/{invite}/removegroup', 'AdminInvitesController@postRemovegroup');
    Route::get('/invites/{invite}/edit', 'AdminInvitesController@getEdit');
    Route::post('/invites/{invite}/edit', 'AdminInvitesController@postEdit');
    Route::get('/invites/{invite}/delete', 'AdminInvitesController@getDelete');
    Route::post('/invites/{invite}/delete', 'AdminInvitesController@postDelete');
    Route::controller('/invites', 'AdminInvitesController');

    Route::controller('/', 'AdminController');
});

Route::group(['prefix' => 'api'], function() {
    Route::controller('/user', 'ApiUserController');
    Route::controller('/oauth', 'ApiOauthController');
});

Route::get('/', function()
{
    return View::make('index');
});

Route::controller('/login', 'LoginController');
Route::get('/invite/{invite_code}', [
    'before' => 'check_not_user',
    'uses' => 'InviteController@getIndex'
]);
Route::post('/invite/{invite_code}', [
    'before' => 'check_not_user',
    'uses' => 'InviteController@postIndex'
]);

Route::pattern('photosize', '[0-9]{2,3}|1000');
Route::pattern('imageformat', 'png|jpg|gif');
Route::get('/photo/{user}_{photosize}.{imageformat}', 'ProfilePhotoController@redirect_photo');
Route::get('/photo/{user}_{photosize}/{flastmod}.{imageformat}', 'ProfilePhotoController@show_photo');