<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB:: table('employees')->insert([
            'first_name' => 'Nasuha',
            'last_name' => 'Asri',
            'email' => 'nasuhasri00@gmail.com',
            'phone' => '1234',
            'comp_id' => '1'
        ]);
    }
}
