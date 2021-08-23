<?php

namespace App\Imports;

use App\Models\SatuanKerja;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SatuanKerjaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SatuanKerja([
            'name'     => $row['name'],
            'description'    => $row['description'],
        ]);
    }
}
