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
                "kelas" => "XII RPL 1"
            ],
            [
                "kelas" => "XII RPL 2"
            ],
            [
                "kelas" => "XII TKR 1"
            ],
            [
                "kelas" => "XII TKR 2"
            ],
            [
                "kelas" => "XII TKR 3"
            ],
            [
                "kelas" => "XII TEI 1"
            ],
            [
                "kelas" => "XII TEI 2"
            ],
            [
                "kelas" => "XII TP 1"
            ],
            [
                "kelas" => "XII TP 2"
            ],
            [
                "kelas" => "XII TAV 1 "
            ],
            [
                "kelas" => "XII TAV 2 "
            ],
            [
                "kelas" => "XII TITL 1"
            ],
            [
                "kelas" => "XII TBSM 1"
            ],
            [
                "kelas" => "XII TBSM 2"
            ]


        ]);



    	DB::table('users')->insert([

    		

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

            ],
            [
                "name" => "user3",
                "password" => bcrypt('user3'),
                "role" => "user",
                "kelas_id" => 2

            ],
            [
                "name" => "user4",
                "password" => bcrypt('user4'),
                "role" => "user",
                "kelas_id" => 2

            ],
            [
                "name" => "admin",
                "password" => bcrypt('admin'),
                "role" => "admin",
                "kelas_id" => 1

            ],
            
            [
                "name" => "user5",
                "password" => bcrypt('user5'),
                "role" => "user",
                "kelas_id" => 2

            ],
            [
                "name" => "user6",
                "password" => bcrypt('user6'),
                "role" => "user",
                "kelas_id" => 2

            ],
            [
                "name" => "user7",
                "password" => bcrypt('user7'),
                "role" => "user",
                "kelas_id" => 2

            ],
            [
                "name" => "user8",
                "password" => bcrypt('user8'),
                "role" => "user",
                "kelas_id" => 2

            ],
            [
                "name" => "user9",
                "password" => bcrypt('user9'),
                "role" => "user",
                "kelas_id" => 2

            ],
            [
                "name" => "user10",
                "password" => bcrypt('user10'),
                "role" => "user",
                "kelas_id" => 2

            ]
            

        ]);

    }
}
