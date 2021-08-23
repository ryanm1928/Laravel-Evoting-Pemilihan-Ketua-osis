<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       return new User([
        'name' => $row['id'],
        'username' => $row['username'],
        'password' => bcrypt($row['password']),
        'role' => 'user',
        'kelas_id' => $row['kelas_id'],
    ]);

   }
}
