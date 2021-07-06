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
    			"kelas" => "RPL1"
    		],
    		[
    			"kelas" => "RPL2"
    		]


        ]);



    	DB::table('users')->insert([

    		[
    			"name" => "admin",
    			"password" => bcrypt('admin'),
    			"role" => "admin",
    			"kelas_id" => 1

    		],

    		[
    			"name" => "user",
    			"password" => bcrypt('user'),
    			"role" => "user",
    			"kelas_id" => 2

    		],
            [
                "name" => "user2",
                "password" => bcrypt('user2'),
                "role" => "user",
                "kelas_id" => 2

            ]

        ]);

    }
}
