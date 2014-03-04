<?php

Route::filter('check_user', function() {
    if (!Auth::check()) {
        $after = '/'.Request::path();
        return Redirect::to('/login?after='.urlencode($after), 307);
    }
});

Route::filter('check_admin', function() {
    if (!Auth::check() || !Auth::user()->is_admin) {
        Auth::logout();
        $after = '/'.Request::path();
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

Route::group([ 'before' => 'check_user' ], function() {
    Route::any('/me', function() {
        return Redirect::to('/user/'.Auth::user()->username, 307);
    });

    Route::controller('/user/{user}', 'UserController');

    Route::get('/apps', 'AppsController@getIndex');
    Route::get('/apps/new', 'AppsController@getNew');
    Route::post('/apps/new', 'AppsController@postNew');
    Route::get('/apps/{app}', 'AppsController@getEdit');
    Route::post('/apps/{app}', 'AppsController@postEdit');

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
    Route::controller('/', 'AdminController');
});

Route::group(['prefix' => 'api'], function() {
    Route::controller('/user', 'ApiUserController');
    Route::controller('/oauth', 'ApiOauthController');
});

Route::get('/', function()
{
    return Redirect::to('/me');
});

Route::controller('/login', 'LoginController');
Route::controller('/about', 'AboutController');

Route::pattern('photosize', '[0-9]{2,3}|1000');
Route::pattern('imageformat', 'png|jpg|gif');
Route::get('/photo/{user}_{photosize}.{imageformat}', 'ProfilePhotoController@redirect_photo');
Route::get('/photo/{user}_{photosize}/{flastmod}.{imageformat}', 'ProfilePhotoController@show_photo');