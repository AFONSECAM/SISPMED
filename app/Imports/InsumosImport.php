<?php

namespace App\Imports;

use App\Models\Insumos;
use Maatwebsite\Excel\Concerns\ToModel;

class InsumosImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Insumos([
            'codIns'  => $row[0],
            'nomIns'  => $row[1],
            'labora'  => $row[2],
            'concen'  => $row[3],
            'pres'    => $row[4],
            'unid'    => $row[5],
            'precioU' => $row[6],
            'fecVen'  => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[7]),
            'nomCate' => $row[8],
            
        ]);
    }
}
