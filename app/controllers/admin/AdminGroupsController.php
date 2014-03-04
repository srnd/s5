<?php

class AdminGroupsController extends BaseController {
    public function getIndex()
    {
        return View::make('admin/groups/index', ['groups' => Group::all()]);
    }

    public function getEdit()
    {
        $group = Route::input('group');
        return View::make('admin/groups/edit', ['group' => $group]);
    }

    public function postEdit()
    {
        $group = Route::input('group');
        $group->name = Input::get('name');
        $group->description = Input::get('description');
        $group->save();

        return Redirect::to('/admin/groups/'.$group->id.'/edit');
    }

    public function getDelete()
    {
        $group = Route::input('group');
        return View::make('admin/groups/delete', ['group' => $group]);
    }

    public function postDelete()
    {
        $group = Route::input('group');
        $group->delete();

        return Redirect::to('/admin/groups');
    }

    public function getNew()
    {
        return View::make('admin/groups/new');
    }

    public function postNew()
    {
        $group = new Group();
        $group->name = Input::get('name');
        $group->description = Input::get('description');
        $group->save();

        return Redirect::to('/admin/groups/'.$group->id.'/edit');
    }

    public function postRemovemember()
    {
        $group = Route::input('group');
        UserGroup::where('groupID', '=', $group->id)->where('userID', '=', Input::get('userID'))->first()->delete();

        return Redirect::to('/admin/groups/'.$group->id.'/edit');
    }

    public function postAddmember()
    {
        $user = User::where('username', '=', Input::get('username'))->first();
        $group = Route::input('group');
        if ($user && UserGroup::where('groupID', '=', $group->id)->where('userID', '=', $user->userID)->count() == 0) {
            $user_group = new UserGroup();
            $user_group->userID = $user->userID;
            $user_group->groupID = $group->id;
            $user_group->save();
        }

        return Redirect::to('/admin/groups/'.$group->id.'/edit');
    }
}