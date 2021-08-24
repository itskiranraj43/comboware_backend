<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('administrator');

        $user = User::create([
            'name' => 'Sub Admin',
            'email' => 'subadmin@subadmin.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('subadmin');

        $user = User::create([
            'name' => 'Type1',
            'email' => 'type1@gmail.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('type1');

        $user = User::create([
            'name' => 'Type2',
            'email' => 'type2@gmail.com',
            'password' => bcrypt('password')
        ]);
        $user->assignRole('type2');

    }
}
