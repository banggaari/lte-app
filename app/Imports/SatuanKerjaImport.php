<?php

namespace App\Imports;

use App\Models\Satker;
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
        return new Satker([
            'name'     => $row['name'],
            'description'    => $row['description'],
        ]);
    }
}
