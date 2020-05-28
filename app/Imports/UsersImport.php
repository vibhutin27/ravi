<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithConditionalSheets;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UsersImport implements WithMultipleSheets, WithCalculatedFormulas {
    use Importable;
    use WithConditionalSheets;

    public function sheets(): array
    {
            return [
                'mydata' => new ThirdSheetImport(),
                'Sheet1-Tableau' => new FourthSheetImport(),
            ];

    }

    public function conditionalSheets(): array
    {
        return [
            'mydata' => new ThirdSheetImport(),
            'Sheet1-Tableau' => new FourthSheetImport(),
        ];
    }
}
