<?php

class LogEntry extends Eloquent {
    protected $table = 'logs';
    protected $primaryKey = 'logID';
    protected $guarded = ['*'];

    public function application()
    {
        return $this->hasOne('Application', 'applicationID');
    }

    public function actor()
    {
        return $this->hasOne('User', 'actor_userID');
    }

    public function target()
    {
        return $this->hasOne('User', 'target_userID');
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