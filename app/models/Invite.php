<?php

class Invite extends Eloquent {
    protected $table = 'invites';
    protected $primaryKey = 'id';
    protected $guarded = ['*'];

    public function groups()
    {
        return $this->belongsToMany('Group', 'invites_groups', 'inviteID', 'groupID');
    }
}