<?php

namespace App\Exports;

use App\NewUser;
use Maatwebsite\Excel\Concerns\FromCollection;

class NewUsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return NewUser::all();
    }
}
