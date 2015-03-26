<?php

class AdminInvitesController extends BaseController {
    public function getIndex()
    {
        return View::make('admin/invites/index', ['invites' => Invite::all()]);
    }

    public function getNew()
    {
        return View::make('admin/invites/new');
    }

    public function postNew()
    {
        $invite = new Invite();
        $invite->code = str_random(32);
        $invite->only_for_description = Input::get('only_for_description');
        $invite->save();

        return Redirect::to('/admin/invites/'.$invite->id.'/edit');
    }

    public function getEdit()
    {
        $invite = Route::input('invite');

        return View::make('admin/invites/edit', [
            'invite' => $invite,
            'all_unadded_groups' => Group::all()
        ]);
    }

    public function postEdit()
    {
        $invite = Route::input('invite');
        $invite->only_for_description = Input::get('only_for_description');
        $invite->save();

        return Redirect::to('/admin/invites/'.$invite->id.'/edit');
    }

    public function getDelete()
    {
        $invite = Route::input('invite');
        return View::make('admin/invites/delete', ['invite' => $invite]);
    }

    public function postDelete()
    {
        $invite = Route::input('invite');
        $invite->delete();

        return Redirect::to('/admin/invites');
    }

    public function postRemovegroup()
    {
        $invite = Route::input('invite');
        $group = Group::where('id', '=', Input::get('groupID'))->first();

        InviteGroup::where('groupID', '=', $group->id)->where('inviteID', '=', $invite->id)->first()->delete();

        return Redirect::to('/admin/invites/'.$invite->id.'/edit');
    }

    public function postAddgroup()
    {
        $invite = Route::input('invite');
        $group = Group::where('id', '=', Input::get('groupID'))->first();

        if ($group && InviteGroup::where('groupID', '=', $group->id)->where('inviteID', '=', $invite->id)->count() == 0) {
            $invite_group = new InviteGroup();
            $invite_group->inviteID = $invite->id;
            $invite_group->groupID = $group->id;
            $invite_group->save();
        }

        return Redirect::to('/admin/invites/'.$invite->id.'/edit');
    }
}
