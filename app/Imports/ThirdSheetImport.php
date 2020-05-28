<?php


namespace App\Imports;


use App\UserUpload;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ThirdSheetImport implements  ToCollection,WithCalculatedFormulas,WithHeadingRow
{

    public function collection(Collection $myDataRows)
    {
        foreach ($myDataRows as $dataRow){
            $user   =  new UserUpload();
            $user->QNo =    $dataRow['qno'];
            $user->QText =  $dataRow['qtext'];
            $user->QValue = $dataRow['qvalue'];
            $user->save();
        }
    }
}
