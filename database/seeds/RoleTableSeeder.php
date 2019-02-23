<?php
namespace database\seeds;

use Illuminate\Database\Seeder;
use \App\Roles as Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_manager = new Role();
        $role_manager->name = 'manager';
        $role_manager->description = 'A Manager (admin)';
        $role_manager->save();

        $role_users_manager = new Role();
        $role_users_manager->name = 'users_manager';
        $role_users_manager->description = 'A User\'s Manager User';
        $role_users_manager->save();

        $role_writer = new Role();
        $role_writer->name = 'writer';
        $role_writer->description = 'A Writer User';
        $role_writer->save();

        $role_user = new Role();
        $role_user->name = 'user';
        $role_user->description = 'A Normal User';
        $role_user->save();


    }
}
