<?php

class OauthController extends BaseController {
    public function getIndex()
    {
        if ($this->should_autoauth()) {
            return $this->mint_auth();
        }

        $app = Route::input('app');
        return View::make('auth', ['app' => $app, 'extended' => Input::get('scope') == 'extended']);
    }

    public function postIndex()
    {
        return $this->mint_auth();
    }

    private function mint_auth()
    {
        $app = Route::input('app');

        $auth = new ApplicationUser();
        $auth->applicationID = $app->applicationID;
        $auth->userID = Auth::user()->userID;
        $auth->code = str_random(32);
        $auth->allow_extended = Input::get('scope') == 'extended';
        $auth->save();

        $state = Input::get('state');
        $return = Input::get('return');
        $sep = strpos($return, '?') !== false ? '&' : '?';
        $state_fragment = $state !== null ? '&state='.urlencode($state) : '';
        $url = $return.$sep.'code='.$auth->code.$state_fragment;

        return Redirect::to($url);
    }

    private function should_autoauth()
    {
        $app = Route::input('app');

        if ($app->whitelist_login) {
            if (Input::get('scope') == 'extended' && !$app->whitelist_extended) {
                return false;
            }

            return true;
        }

        $prev_auth = ApplicationUser::where('userID', '=', Auth::user()->userID)
                                    ->where('applicationID', '=', $app->applicationID)
                                    ->first();

        if ($prev_auth !== null) {
            $prev_auths_with_perm = ApplicationUser::where('userID', '=', Auth::user()->userID)
                                         ->where('applicationID', '=', $app->applicationID)
                                         ->where('allow_extended', '=', '1')
                                         ->count() > 0;
            if (Input::get('scope') == 'extended' && !$prev_auths_with_perm) {
                return false;
            }

            return true;
        }

        return false;
    }
}