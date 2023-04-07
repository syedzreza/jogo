<?php

namespace App\Http\Controllers;

use App\Exports\NewUsersExport;
use App\Imports\NewUsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MyController extends Controller
{
//    public function importExportView()
//    {
//        return view('import');
//    }
//
//    public function import()
//    {
//        Excel::import(new NewUsersImport(),request()->file('file'));
//
//        return back();
//    }
//
//    public function export()
//    {
//        return Excel::download(new NewUsersExport(), 'users.xlsx');
//    }
}
