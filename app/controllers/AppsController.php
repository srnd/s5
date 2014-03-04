<?php

class AppsController extends BaseController {
    public function getIndex()
    {
        return View::make('apps/index');
    }

    public function getNew()
    {
        return View::make('apps/new');
    }

    public function postNew()
    {
        $app = new Application();
        $app->name = Input::get('name');
        $app->description = Input::get('description');
        $app->token = str_random(32);
        $app->secret = str_random(32);
        $app->save();

        $admin = new ApplicationAdmin();
        $admin->admin_userID = Auth::user()->userID;
        $admin->applicationID = $app->applicationID;
        $admin->save();

        return Redirect::to('/apps/'.$app->token);
    }

    public function getEdit()
    {
        $this->check_authorized();

        $app = Route::input('app');
        return View::make('apps/edit', ['app' => $app]);
    }

    public function postEdit()
    {
        $this->check_authorized();

        $app = Route::input('app');
        $app->name = Input::get('name');
        $app->description = Input::get('description');

        if (Auth::user()->is_admin) {
            $app->whitelist_login = Input::get('whitelist_login') !== NULL;
            $app->whitelist_extended = Input::get('whitelist_extended') !== NULL;
            $app->allow_internal = Input::get('allow_internal') !== NULL;
        }

        $app->save();
        return Redirect::to('/apps/'.$app->token);
    }

    private function check_authorized()
    {
        if (Auth::user()->is_admin) {
            return true;
        }

        $app = Route::input('app');
        foreach ($app->admins as $admin) {
            if ($admin->userID == Auth::user()->userID) return true;
        }

        App::abort(403);
    }
}