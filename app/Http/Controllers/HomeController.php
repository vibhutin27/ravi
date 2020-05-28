<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToModel;
use DB;
use App\UserUpload;
use File;
use App\User;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use App\Imports\UsersImport;
use Excel;


class HomeController extends Controller
{
    //
    public function showForm()
    {
        return view('home');
    }

    public function excelUpload(Request $request)
      {
          if($request->hasFile('file'))
          {

            $extension = File::extension($request->file->getClientOriginalName());
                if ($extension == "xlsx" || $extension == "xls")
                {
                    $fileName = Storage::disk('public')->put('upload',$request->file('file'));
                    $import = new UsersImport();
                    $import->onlySheets('mydata','Sheet1-Tableau');
                   ($import)->import($fileName, 'public', \Maatwebsite\Excel\Excel::XLSX);
                  echo"File uploaded";
                  echo"<br>";

                }
                else
                {
                      echo"wrong format file";
                }
          }
          else
          {
            echo" select the file";
          }
        return view('home');
      }
}
