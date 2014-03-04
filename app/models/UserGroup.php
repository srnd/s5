<?php

class UserGroup extends Eloquent {
    protected $table = 'users_groups';
    protected $primaryKey = 'id';
    protected $guarded = ['*'];

    public function user()
    {
        return $this->hasOne('User', 'userID');
    }

    public function group()
    {
        return $this->hasOne('Group', 'groupID');
    }
}