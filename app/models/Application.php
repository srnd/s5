<?php

class Application extends Eloquent {
    protected $table = 'applications';
    protected $primaryKey = 'applicationID';
    protected $guarded = ['*'];

    public function admins()
    {
        return $this->hasManyThrough('User', 'ApplicationAdmin', 'admin_userID', 'userID');
    }

    public function users()
    {
        return $this->hasManyThrough('User', 'ApplicationUser', 'userID', 'userID');
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
}