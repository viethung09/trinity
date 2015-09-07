<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Hung',
            'last_name' => 'Do Viet',
            'email' => 'viethung097@gmail.com',
            'password' => bcrypt('123456'),
            'username' => 'Do Viet Hung',
            'username_slug' => 'do-viet-hung',
            'comfirmation_code' => md5(microtime() + env('APP_KEY')),
            'comfirmed' => 1,
            'settings' => [
                'gender' => 'Male',
                'mobile'   => '0974 382 452',
                'nationality'  => 'VN',
                'home_page'  => 'none',
                'opt_in_monthly'  => false,
                'opt_in_quarterly'  => false,
                'opt_in_yearly'  => true
            ]
        ]);
        User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johnDoe@gmail.com',
            'password' => bcrypt('123456'),
            'username' => 'John Doe',
            'username_slug' => 'john-doe',
            'comfirmation_code' => md5(microtime() + env('APP_KEY')),
            'comfirmed' => 1,
            'settings' => [
                'gender' => 'Male',
                'mobile'   => '555 755 83 98',
                'nationality'  => 'EN',
                'home_page'  => 'none',
                'opt_in_monthly'  => false,
                'opt_in_quarterly'  => false,
                'opt_in_yearly'  => true
            ]
        ]);
    }
}
