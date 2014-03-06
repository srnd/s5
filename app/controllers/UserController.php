<?php

class UserController extends BaseController {
    public function getIndex()
    {
        $user = Route::input('user');
        return View::make('user/view', ['user' => $user]);
    }

    public function getEdit()
    {
        $this->check_authorized();

        $success_from = null;
        if (Input::get('pw') !== null) {
            $success_from = 'changepassword';
        } else if (Input::get('save') !== null) {
            $success_from = 'edit';
        }

        $user = Route::input('user');
        return View::make('user/edit', ['user' => $user, 'success_from' => $success_from]);
    }

    public function postEdit()
    {
        $this->check_authorized();
        $user = Route::input('user');

        $oldUsername = $user->username;

        if (!Input::get('first_name') || !Input::get('last_name') || !Input::get('email')) {
            return View::make('user/edit', ['user' => $user, 'error' => 'required']);
        }

        if (Auth::user()->is_admin) {
            if (!Input::get('username')) {
                return View::make('user/edit', ['user' => $user, 'error' => 'required']);
            }

            $dupeuser = User::whereRaw('username = ? and userID != ?', [Input::get('username'), $user->userID])->first();
            if ($dupeuser !== null) {
                return View::make('user/edit', ['user' => $user, 'error' => 'dupeuser', 'dupeuser' => $dupeuser]);
            }

            $user->is_admin = Input::get('is_admin') !== null;

            $user->username = Input::get('username');
        }

        $dupeuser = User::whereRaw('email = ? and userID != ?', [Input::get('email'), $user->userID])->first();
        if ($dupeuser !== null) {
            return View::make('user/edit', ['user' => $user, 'error' => 'dupeemail', 'dupeuser' => $dupeuser]);
        }

        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->email = Input::get('email');
        $user->phone = Input::get('phone');
        $user->address_line_1 = Input::get('address_line_1');
        $user->address_line_2 = Input::get('address_line_2');
        $user->city = Input::get('city');
        $user->state = Input::get('state');
        $user->postal_code = Input::get('postal_code');
        $user->country = Input::get('country');
        $user->save();

        echo $oldUsername;
        echo $user->username;

        if ($oldUsername !== $user->username) {
            Event::fire('User.Rename', [['old_username' => $oldUsername, 'new_username' => $user->username]]);
        }

        Event::fire('User.Update', [['user' => $user]]);

        return Redirect::to('/user/'.$user->username.'/edit');
    }

    public function postUploadphoto()
    {
        $this->check_authorized();
        if (!Input::hasFile('photo')) {
            App::abort(400);
        }

        $file = Input::file('photo')->getRealPath();
        $image = new Image($file);
        $smallest_edge = ($image->getWidth() < $image->getHeight())? $image->getWidth() : $image->getHeight();

        if ($smallest_edge > 1000) {
            $smallest_edge = 1000;
        }

        $image->fill($smallest_edge, $smallest_edge);
        $image->save($file);

        $user = Route::input('user');
        $user->photo = file_get_contents($file);
        $user->save();
        unlink($file);
        return json_encode(['success' => true]);
    }

    public function getPassword()
    {
        $this->check_authorized();

        $user = Route::input('user');
        return View::make('user/password', ['user' => $user]);
    }

    public function postPassword()
    {
        $this->check_authorized();

        $user = Route::input('user');

        if (Input::get('new_password') !== Input::get('new_password_confirm')) {
            return View::make('user/password', ['user' => $user, 'error' => 'mismatch']);
        }

        if ($user->userID == Auth::user()->userID
            && !Hash::check(Input::get('old_password'), $user->password)) {
            return View::make('user/password', ['user' => $user, 'error' => 'oldpassword']);
        }

        $user->password = Hash::make(Input::get('new_password'));
        $user->save();

        Event::fire('User.PasswordChange', [['user' => $user, 'password' => Input::get('new_password')]]);

        return Redirect::to('/user/'.$user->username.'/edit?pw');
    }

    public function getDelete()
    {
        $user = Route::input('user');
        if (!Auth::user()->is_admin || Auth::user()->userID == $user->userID) {
            App::abort(403);
        }

        return View::make('user/delete', ['user' => $user]);
    }

    public function postDelete()
    {
        $user = Route::input('user');
        if (!Auth::user()->is_admin || Auth::user()->userID == $user->userID) {
            App::abort(403);
        }

        Event::fire('User.Delete', [['username' => $user->username]]);
        $user->delete();
        return Redirect::to('/admin/users');
    }

    private function check_authorized()
    {
        $user = Route::input('user');
        if ($user->userID !== Auth::user()->userID
            && !Auth::user()->is_admin) {
            App::abort(403);
        }
    }
}