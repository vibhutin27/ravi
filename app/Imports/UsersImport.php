<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Concerns\WithCalculatedFormula;

class UsersImport implements ToCollection {
    use Importable;

  
    public function collection( $row)
    {
        return [ 
            'number' => $row['QNo'],
            'text' => $row['QText'],
            'value' => $row['QValue'],
        ];
    }
}
