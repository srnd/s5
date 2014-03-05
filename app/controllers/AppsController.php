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
        return View::make('apps/edit', ['app' => $app, 'webhook_events' => Webhook::$AllEvents]);
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

    public function postAddwebhook()
    {
        $this->check_authorized();

        $app = Route::input('app');
        if (!$app->allow_internal) {
            App::abort(401);
        }

        if (!in_array(Input::get('event'), Webhook::$AllEvents)) {
            App::abort(403);
        }

        $webhook = new Webhook();
        $webhook->applicationID = $app->applicationID;
        $webhook->name = Input::get('name');
        $webhook->event = Input::get('event');
        $webhook->url = Input::get('url');
        $webhook->save();

        return Redirect::to('/apps/'.$app->token);
    }

    public function postDeletewebhook()
    {
        $this->check_authorized();

        $app = Route::input('app');
        $hookID = Route::input('hookID');
        if (!$app->allow_internal) {
            App::abort(404);
        }

        $webhook = Webhook::where('id', '=', $hookID)->first();

        if ($webhook->application->applicationID !== $app->applicationID) {
            App::abort(404);
        }

        $webhook->delete();

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