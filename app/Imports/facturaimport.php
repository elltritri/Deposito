<?php

namespace App\Imports;

use App\Models\Listadofactura;
use Maatwebsite\Excel\Concerns\ToModel;

class facturaimport implements ToModel
{
    public function model(array $row)
    {
        return new Listadofactura([
            'partCode'=> $row[0],
            'codigoAlternativo'=> $row[1],
            'partName' => $row[2],
            'cantidad' => $row[4],
            'origen' => $row[5],
        ]);
    }
}
