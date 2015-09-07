<?php

use App\Models\AssignedRole;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = new Role();
        $adminRole->name = 'admin';
        $adminRole->display_name = 'Admin';
        $adminRole->description = 'Admin for backend';
        $adminRole->is_admin = 1;
        $adminRole->save();

        $userRole = new Role();
        $userRole->name = 'user';
        $userRole->display_name = 'User';
        $userRole->description = 'user for backend';
        $userRole->is_admin = 0;
        $userRole->save();

        $admin = User::where('email', 'viethung097@gmail.com')->first();
        $assRoleAdmin = new AssignedRole();
        $assRoleAdmin->user_id = $admin->id;
        $assRoleAdmin->role_id = $adminRole->id;
        $assRoleAdmin->save();

        $user = User::where('email', 'johnDoe@gmail.com')->first();
        $assRoleUser = new AssignedRole;
        $assRoleUser->user_id = $user->id;
        $assRoleUser->role_id = $userRole->id;
        $assRoleAdmin->save();
    }
}
