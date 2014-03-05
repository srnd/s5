<?php

class ApiUserController extends BaseController {
    public function anyExists()
    {
        $user = User::whereRaw('username = ?', [Input::get('username')])->first();
        $exists = $user !== null;
        if ($exists) {
            return ['exists' => true, 'id' => $user->userID];
        } else {
            return ['exists' => false];
        }
    }

    public function anySuggest()
    {
        $search = '%'.Input::get('search').'%';
        $users = User::whereRaw('LOWER(username) LIKE ?'
                                .' OR LOWER(CONCAT(first_name, " ", last_name)) LIKE ?'
                                .' OR LOWER(first_name) LIKE ?'
                                .' OR LOWER(last_name) LIKE ?',
                                [$search, $search, $search, $search])->limit(10)->get();

        $users_promise = [];
        foreach ($users as $user) {
            $users_promise[] = [
                'username' => $user->username,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name
            ];
        }

        return $users_promise;
    }

    public function getIndex()
    {
        $user = User::whereRaw('username = ?', [Input::get('username')])->first();
        return $this->getPromisedUser($user, false);
    }

    public function getMe()
    {
        return $this->getPromisedUser(ApplicationUser::ApiUser(), ApplicationUser::IsAuthorized('extended'));
    }

    public function getPromisedUser($user, $extended = false)
    {
        $promise = [
            'id' => (int)$user->userID,
            'username' => $user->username,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'is_admin' => (bool)$user->is_admin,
            'groups' => []
        ];

        foreach ($user->groups as $group) {
            $promise['groups'][] = [
                'id' => (int)$group->id,
                'name' => $group->name,
                'description' => $group->description
            ];
        }

        if ($extended) {
            $promise['phone'] = $user->phone;
            $promise['address_line_1'] = $user->address_line_1;
            $promise['address_line_2'] = $user->address_line_2;
            $promise['city'] = $user->city;
            $promise['state'] = $user->state;
            $promise['postal_code'] = $user->postal_code;
            $promise['country'] = $user->country;
        }

        return $promise;
    }
}