<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Admin Nasuha Asri',
                'email' => 'nasuha@admin.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'password' => bcrypt('password'),
            ]
        ];

        DB::table('users')->insert($data);
    }
}
