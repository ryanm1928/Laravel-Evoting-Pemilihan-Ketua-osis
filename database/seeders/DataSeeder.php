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
                "kelas" => "X TITL 1"
            ],
            [
                "kelas" => "X TITL 2"
            ],
            [
                "kelas" => "X TP 1"
            ],
            [
                "kelas" => "X TP 2"
            ],
            [
                "kelas" => "X TKRO 1"
            ],
            [
                "kelas" => "X TKRO 2"
            ],
            [
                "kelas" => "X TKRO 3"
            ],
            [
                "kelas" => "X TBSM 1"
            ],
            [
                "kelas" => "X TBSM 2"
            ],
            [
                "kelas" => "X TAV 1 "
            ],
            [
                "kelas" => "X TAV 2 "
            ],
            [
                "kelas" => "X TEI 1"
            ],
            [
                "kelas" => "X TEI 2"
            ],
            [
                "kelas" => "X RPL 1"
            ],
            [
                "kelas" => "X RPL 2"
            ],
            [
                "kelas" => "XI TITL 1"
            ],
            [
                "kelas" => "XI TITL 2"
            ],
            [
                "kelas" => "XI TP 1"
            ],
            [
                "kelas" => "XI TP 2"
            ],
            [
                "kelas" => "XI TKRO 1"
            ],
            [
                "kelas" => "XI TKRO 2"
            ],
            [
                "kelas" => "XI TKRO 3"
            ],
            [
                "kelas" => "XI TBSM 1"
            ],
            [
                "kelas" => "XI TBSM 2"
            ],
            [
                "kelas" => "XI TAV 1 "
            ],
            [
                "kelas" => "XI TAV 2 "
            ],
            [
                "kelas" => "XI TEI 1"
            ],
            [
                "kelas" => "XI TEI 2"
            ],
            [
                "kelas" => "XI RPL 1"
            ],
            [
                "kelas" => "XI RPL 2"
            ],

            [
                "kelas" => "XII TITL 1"
            ],
            [
                "kelas" => "XII TP 1"
            ],
            [
                "kelas" => "XII TP 2"
            ],
            [
                "kelas" => "XII TKRO 1"
            ],
            [
                "kelas" => "XII TKRO 2"
            ],
            [
                "kelas" => "XII TKRO 3"
            ],
            [
                "kelas" => "XII TBSM 1"
            ],
            [
                "kelas" => "XII TBSM 2"
            ],
            [
                "kelas" => "XII TAV 1 "
            ],
            [
                "kelas" => "XII TAV 2 "
            ],
            [
                "kelas" => "XII TEI 1"
            ],
            [
                "kelas" => "XII TEI 2"
            ],
            [
                "kelas" => "XII RPL 1"
            ],
            [
                "kelas" => "XII RPL 2"
            ]


        ]);


    	DB::table('users')->insert([

            [
                "name" => "admin",
                'username' =>"ADMIN E-VOTING",
                "password" => bcrypt('evotingqwerty'),
                "role" => "admin",
                "kelas_id" => 43

            ]

        ]);

    }
}
