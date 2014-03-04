<?php

class ApiOauthController extends BaseController {
    public function anyExchange()
    {
        $code = Input::get('code');
        $secret = Input::get('secret');

        $auth = ApplicationUser::where('code', '=', $code)->first();

        if ($auth === null) {
            App::abort(404);
        }

        if ($auth->application->secret !== $secret) {
            App::abort(401);
        }

        $auth->code = null;
        $auth->access_token = str_random(32);
        $auth->save();

        return $auth->access_token;
    }
}