<?php

use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface {
    protected $table = 'users';
    protected $primaryKey = 'userID';
    protected $guarded = ['*'];
    protected $hidden = ['password'];
    protected $softDelete = true;

    public function checkPassword($password)
    {
        if (\Hash::check($password, $this->password)) {
            $this->setPassword($password);
            $this->save();
            return true;
        } else {
            $salt = substr(base64_decode($this->password),-4);
            $expected = base64_encode(sha1( $password.$salt, true ). $salt);
            return $this->password === $expected;
        }
    }

    public function setPassword($password)
    {
        $salt = substr(sha1(str_random(), true), -4);
        $this->password = base64_encode(sha1( $password.$salt, true). $salt);
        return $this;
    }

    public function validate2fa($response)
    {
        if (count($this->second_factors) === 0) return true; // No second factor

        // Check all second factors to see if one of them matched the response
        foreach ($this->second_factors as $secondFactor) {
            if ($secondFactor->verify($response)) return true;
        }

        // No match
        return false;
    }

    public function secondFactors()
    {
        return $this->hasMany('SecondFactor', 'userID', 'userID');
    }

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
