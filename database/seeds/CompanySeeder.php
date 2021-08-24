<?php

use App\Company;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            'name' => 'Nasuha Asri Company',
            'email' => 'nasuhasri00@gmail.com',
            'logo' => 'images/b9NtzuEAD0yAH2h8GkBzpeyztnxek9cpoe8Yy78t.jpg',
            'website' => 'nasuhasri.herokuapp.com'
        ]);
    }
}
