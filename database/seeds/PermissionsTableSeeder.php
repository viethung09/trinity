<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            array(//1
                'name' => 'manage_user',
                'display_name' => 'Manage Users',
                'is_admin' => 1
            ),
            array(//1
                'name' => 'manage_roles',
                'display_name' => 'Manage Users',
                'is_admin' => 1
            ),
            array(//1
                'name' => 'manage_categories',
                'display_name' => 'Manage Categories',
                'is_admin' => 1
            ),
            array(//1
                'name' => 'manage_menus',
                'display_name' => 'Manage Menus',
                'is_admin' => 1
            ),
            array(//1
                'name' => 'manage_photos',
                'display_name' => 'Manage Photos',
                'is_admin' => 1
            ),
        ];

        foreach ($permission as $row) {
            $row = array_merge($row, ['created_at' => new DateTime, 'updated_at' => new DateTime]);
            DB::table('permissions')->insert($row);
        }

        $role_id_admin = \App\Models\Role::where('name', 'admin')->first()->id;
        $perm_base = (int)DB::table('permissions')->first()->id-1;
        $perms = [
            array(
                'role_id'  => $role_id_admin,
                'permission_id'  => $perm_base + 1
            ),
            array(
                'role_id'  => $role_id_admin,
                'permission_id'  => $perm_base + 2
            ),
            array(
                'role_id'  => $role_id_admin,
                'permission_id'  => $perm_base + 3
            ),
            array(
                'role_id'  => $role_id_admin,
                'permission_id'  => $perm_base + 4
            ),
            array(
                'role_id'  => $role_id_admin,
                'permission_id'  => $perm_base + 5
            )
        ];

        DB::table('permission_role')->delete();

        foreach ($perms as $row) {
            $row = array_merge($row, ['created_at' => new DateTime, 'updated_at' => new DateTime]);
            DB::table('permission_role')->insert($row);
        }

    }
}
