<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = App\User::create(['name' => "Administrator", 'email' => 'admin@ib.com', 'password' => 'pakistan']);
        $u1 = App\User::create(['name' => "User 1", 'email' => 'user1@ib.com', 'password' => 'pakistan']);
        $u2 = App\User::create(['name' => "User 2", 'email' => 'user2@ib.com', 'password' => 'pakistan']);
        $role_admin = App\Role::where('name', "administrator")->first();
        $role_user = App\Role::where('name', "user")->first();
        
        $admin->roles()->attach($role_admin);
        $u1->roles()->attach($role_user);
        $u2->roles()->attach($role_user);
        $admin->save();
    }
}
