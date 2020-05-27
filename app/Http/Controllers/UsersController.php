<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersController extends Controller
{
    //

    public function showForm()
    {
        return view('upload');
    }

    public function import()
    {
        //Excel::import(new UserImport, 'users.xls');
        //return redirect('/')->with('sucess', 'All good');
        $upload = Excel::import(new UsersImport, request()->file('upload-file'));
        dd($data);
    }
}
