<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        User::truncate();
        Role::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(RolesTableSeeder::class);

        Model::reguard();
    }
}
