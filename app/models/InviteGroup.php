<?php

class InviteGroup extends Eloquent {
    protected $table = 'invites_groups';
    protected $primaryKey = 'id';
    protected $guarded = ['*'];

    public $timestamps = false;

    public function invite()
    {
        return $this->hasOne('invite', 'inviteID');
    }

    public function group()
    {
        return $this->hasOne('Group', 'groupID');
    }
}