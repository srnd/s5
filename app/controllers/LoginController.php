<?php

class LoginController extends BaseController {
    public function getIndex()
    {
        if (Auth::check()) {
            return $this->auto_redirect();
        }

        // Check if the user just logged out
        if (Request::header('referer')
            && parse_url(Request::header('referer'), PHP_URL_PATH) === '/login/logout') {
            $logged_out = true;
        } else {
            $logged_out = false;
        }

        return View::make('login/index', ['logged_out' => $logged_out]);
    }

    public function postIndex()
    {
        if (Auth::check()) {
            return $this->auto_redirect();
        }

        $ajax = (Request::header('X-Requested-With') == "XMLHttpRequest");

        $user = User::where('username', '=', Input::get('username'))->first();

        if (count($user->second_factors) === 0) {
          return $this->doLogin($ajax);
        } elseif (\Input::get('code')) {
            if ($user->validate2fa(\Input::get('code'))) {
              return $this->doLogin($ajax);
            } else {
              if($ajax){
                return json_encode(['success' => false]);
              }else{
                return View::make('login/index', ['invalid_login' => true]);
              }
            }
        } else {
          if($ajax){
            return json_encode(['success' => true, 'second_factor' => true]);
          }else{
            return View::make('login/2fa', ['username' => \Input::get('username'), 'password' => \Input::get('password')]);
          }
        }
    }

    private function doLogin($ajax = false)
    {
        $user = User::where('username', '=', Input::get('username'))->first();

        // Check if password matches using current or old system
        $password_matches = false;
        if ($user !== null) {
            if ($user->checkPassword(Input::get('password'))) {
                $password_matches = true;
            } else if ($this->check_old_password_formats(Input::get('password'), $user)) {
                // Update the password
                $user->setPassword(Input::get('password'));
                $user->save();
                $password_matches = true;
            }
        }

        if ($password_matches) {
            Auth::login($user, !$user->is_admin);
            if($ajax){
              return json_encode(['success' => true]);
            }else{
              return $this->auto_redirect();
            }
        } else {
          if($ajax){
            return json_encode(['success' => false]);
          }else{
            return View::make('login/index', ['invalid_login' => true]);
          }
        }
    }

    public function getLogout()
    {
        if (!Auth::check()) {
            App::abort(403);
        }

        return View::make('login/logout_post_redirector');
    }

    public function postLogout()
    {
        if (!Auth::check()) {
            App::abort(403);
        }

        Auth::logout();

        return Redirect::to('/login');
    }

    private function auto_redirect()
    {
        $redirect = Input::get('after');
        if ($redirect) {
            if (substr($redirect,0,2) === '//') {
                $redirect = '/'.ltrim($redirect, '/');
            }

            if (strpos($redirect, '://') !== false) {
                return Redirect::to('/');
            } else {
                return Redirect::to($redirect);
            }
        }

        return Redirect::to('/');
    }

    private function check_old_password_formats($password, User $user)
    {
        // Check if the password is stored in the really old format
        if (strpos($user->password, '$') === false) {
            // Validate the oldstyle password, and if it matches, force an update
            if (md5($password) === $user->password) {
                return true;
            } else {
                return false;
            }
        } else { // Maybe it's a newer password
            $password_parts = explode('$', $user->password);
            if (count($password_parts) !== 2) {
                return false;
            } else {
                $correct_password = $password_parts[0];
                $salt = $password_parts[1];
                return (hash("whirlpool", $password . $salt) === $correct_password);
            }
        }
    }
}
