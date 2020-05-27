<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use DB;
use App\UserUpload;
use File;
use App\User;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use App\Imports\UsersImport;


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
                  $path = $request->file('file')->getRealPath();

                  $name = $request->file->getClientOriginalName();

                  $data = (new UsersImport)->toCollection($request->file('file'));

                  //dd($data);
                  dd($data[2][1][2]);

                  echo"File uploaded";
                  //$data = Excel::toCollection(new User(),$request->file('file'));
                  echo"<br>";
                 // dd($data);


                  //$array = Excel::toArray(new User(),$request->file('file'));
                  //dd($array);  
                  try
                  { 
                      $sheetNo=0;
                      foreach ( $data as $d) 
                      {
                        $i=1;
                        if($sheetNo==2)
                        {
                        for($i=1; $i<count($d); $i++)
                        {
                            $user=new UserUpload();       
                            $user->QNo =$d[$i][0];
                            $user->QText = $d[$i][1];
                            $user->QValue = $d[$i][2];
 
                            $user->save();
                        }
                        echo "Records Saved".($i-1);
                      }
                      else{
 
                      }
                         $sheetNo++;
                      }
                  }
                  catch(Exception $ex)
                  {
                    echo $ex;  
                  }
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
