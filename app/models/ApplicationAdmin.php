<?php

class ApplicationAdmin extends Eloquent {
    protected $table = 'applications_admins';
    protected $primaryKey = 'id';
    protected $guarded = ['*'];

    public function application()
    {
        return $this->hasOne('Application', 'applicationID');
    }

    public function admin()
    {
        return $this->hasOne('User', 'admin_userID');
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