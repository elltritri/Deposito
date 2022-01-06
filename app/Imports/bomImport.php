<?php

namespace App\Imports;

use App\Models\bom;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class bomImport implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {
        return new bom([
            'partCode'=> $row['1'],
            'codigoAlternativo'=> $row['2'],
            'partName' => $row['3'],
            'descripcion' => $row['4'],
            'cantidad' => $row['5'],
            'origen' => $row['6'],
        ]);
    }

}   
