<?php

class AdminUsersController extends BaseController {
    public function getIndex()
    {
        if (Input::get('trashed') !== null) {
            return View::make('admin/users/index', ['users' => User::withTrashed()->get(), 'show_trashed' => true]);
        } else {
            return View::make('admin/users/index', ['users' => User::all()]);
        }
    }

    public function getRestore($username)
    {
        $user = User::onlyTrashed()->where('username', $username)->first();

        if ($user === null) {
            App::abort(404);
        }

        return View::make('admin/users/restore', ['user' => $user]);
    }

    public function postRestore($username)
    {
        $user = User::onlyTrashed()->where('username', $username)->first();

        if ($user === null) {
            App::abort(404);
        }

        $user->restore();


        Event::fire('User.Restore', [['user' => $user]]);

        return Redirect::to('/user/'.$user->username);
    }

    public function getNew()
    {
        return View::make('admin/users/new');
    }

    public function postNew()
    {
        $password_random = Input::get('password_type') === 'generate';
        if (!$password_random) {
            $password = Input::get('password');
        } else {
            $password_random = true;
            $password = str_random(15);
        }

        $user = new User();
        $user->username = Input::get('username');
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->email = Input::get('email');
        $user->password = Hash::make($password);
        $user->save();

        Event::fire('User.Create', [['user' => $user]]);

        $email_data = ['user' => $user, 'link' => url('')];

        if ($password_random) {
            $email_data['password'] = $password;
        }

        Mailgun::send('emails/new_account', $email_data, function($message) use ($user)
        {
            $message->to($user->email, $user->name)->subject('Welcome to s5!');
        });

        return Redirect::to('/user/'.$user->username.'/edit');
    }
}