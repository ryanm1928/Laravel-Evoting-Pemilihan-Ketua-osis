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
                "name" => "admin",
                'username' =>"MOHAMAD RIYAN",
                "password" => bcrypt('evotingqwerty123456'),
                "role" => "admin",
                "kelas_id" => 1

            ],
            [
                "name" => "195648",
                'username' =>"KURNIA ARDIANSYAH",
                "password" => bcrypt('12345'),
                "role" => "user",
                "kelas_id" => 1

            ]

        ]);

    }
}
