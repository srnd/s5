<?php

class Application extends Eloquent {
    protected $table = 'applications';
    protected $primaryKey = 'applicationID';
    protected $guarded = ['*'];

    public function admins()
    {
        return $this->belongsToMany('User', 'applications_admins', 'applicationID', 'admin_userID');
    }

    public function users()
    {
        return $this->belongsToMany('User', 'applications_users', 'applicationID', 'userID');
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