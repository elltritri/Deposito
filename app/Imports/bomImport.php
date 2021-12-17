<?php

namespace App\Imports;

use App\Models\bom;
use Maatwebsite\Excel\Concerns\ToModel;

class bomImport implements ToModel
{
    
    public function model(array $row)
    {
        return new bom([
            
            'partCode'=> $row[0],
            'codigoAlternativo'=> $row[1],
            'partName' => $row[2],
            
            'cantidad' => $row[4],
            'origen' => $row[5],
        ]);
    }
}
