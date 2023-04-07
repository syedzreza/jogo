<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'f_name' => $row[0],
            'l_name' => $row[1],
            'phone' => $row[2],
            'email ' => $row[3],
            'password' => Hash::make('123456'),
            'user_type ' => $row[5],
            'status  ' => $row[6],
        ]);
    }
}
