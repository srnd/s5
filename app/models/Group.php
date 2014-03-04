<?php

class Group extends Eloquent {
    protected $table = 'groups';
    protected $primaryKey = 'id';
    protected $guarded = ['*'];

    public function users()
    {
        return $this->belongsToMany('User', 'users_groups', 'groupID', 'userID');
    }
}