<?php

class InviteController extends BaseController {
    public function getIndex()
    {
        $invite = Route::input('invite_code');
        return View::make('invite_accept', ['invite' => $invite]);
    }

    public function postIndex()
    {
        $invite = Route::input('invite_code');

        if (Input::get('password') !== Input::get('password_confirm')) {
            return View::make('invite_accept', ['invite' => $invite, 'error' => 'Passwords did not match.']);
        }

        if (User::where('email', '=', Input::get('email'))->count() > 0) {
            return View::make('invite_accept', ['invite' => $invite, 'error' => 'You already have an account.']);
        }

        $user = new User();
        $user->username = Input::get('username');
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->email = Input::get('email');
        $user->setPassword(Input::get('password'));
        $user->save();

        foreach ($invite->groups as $group) {
            $user_group = new UserGroup();
            $user_group->userID = $user->userID;
            $user_group->groupID = $group->id;
            $user_group->save();
        }

        if($invite->gapps){
            Event::fire('User.Create', [['user' => $user]]);
            Event::fire('User.PasswordChange', [['user' => $user, 'password' => Input::get('password')]]);
        }

        Auth::login($user, true);
        return Redirect::to('/');
    }
}
