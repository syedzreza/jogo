<?php

namespace App\Imports;

use App\NewUser;
use Maatwebsite\Excel\Concerns\ToModel;

class NewUsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new NewUser([
            'name' => $row[0],
            'course' => $row[1],
        ]);
    }
}
