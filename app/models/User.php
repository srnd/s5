<?php

use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface {
    protected $table = 'users';
    protected $primaryKey = 'userID';
    protected $guarded = ['*'];
    protected $hidden = ['password'];
    protected $softDelete = true;

    public function getNameAttribute()
    {
        return sprintf('%s %s', $this->first_name, $this->last_name);
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getReminderEmailAttribute()
    {
        return $this->email;
    }

    public function groups()
    {
        return $this->belongsToMany('Group', 'users_groups', 'userID', 'groupID');
    }

    public function createdApplications()
    {
        return $this->hasManyThrough('Application', 'ApplicationAdmin', 'admin_userID', 'applicationID');
    }

    public function authorizedApplications()
    {
        return $this->hasManyThrough('Application', 'ApplicationUser', 'userID', 'applicationID');
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
