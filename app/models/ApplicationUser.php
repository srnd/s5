<?php

class ApplicationUser extends Eloquent {
    protected $table = 'applications_users';
    protected $primaryKey = 'id';
    protected $guarded = ['*'];

    public function application()
    {
        return $this->hasOne('Application', 'applicationID', 'applicationID');
    }

    public function user()
    {
        return $this->hasOne('User', 'userID', 'userID');
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getReminderEmail()
    {
        return $this->email;
    }

    public static function ApiUser()
    {
        $access_token = Input::get('access_token');
        $auth = ApplicationUser::where('access_token', '=', $access_token)->first();

        if ($auth === null) {
            App::abort(401);
        }

        return $auth->user;
    }

    public static function IsAuthorized($scope = '')
    {
        $access_token = Input::get('access_token');
        $auth = ApplicationUser::where('access_token', '=', $access_token)->first();

        if ($auth === null) {
            return false;
        }

        if ($scope == 'extended' && !$auth->allow_extended) {
            return false;
        }

        return true;
    }
}