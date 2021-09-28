<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('kelas')->insert([
            [
                "kelas" => "admin"
            ]
        ]);


    	DB::table('users')->insert([

            [
                "name" => "admin",
                'username' =>"ADMIN E-VOTING",
                "password" => bcrypt('evotingqwerty'),
                "role" => "admin",
                "kelas_id" => 1

            ]

        ]);

    }
}
