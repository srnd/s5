<?php

class DatabaseSeeder extends Seeder {

    public function run()
    {
        if (!User::first()) {
            $user = new User();
            $user->username = 'admin';
            $user->first_name = 'Admin';
            $user->last_name = 'Admin';
            $user->email = 'root@localhost';
            $user->setPassword('password');
            $user->is_admin = true;
            $user->save();
        }
    }

}
