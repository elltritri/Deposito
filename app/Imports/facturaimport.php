<?php

namespace App\Imports;

use App\Models\Listadofactura;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class facturaimport implements ToModel, WithStartRow
{   
    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {
        return new Listadofactura([
            'partCode'=> $row[1],
            'codigoAlternativo'=> $row[2],
            'partName' => $row[3],
            'descripcion' => $row[4],
            'cantidad' => $row[5],
            'origen' => $row[6],
        ]);
    }
}
