<?php

namespace App\Imports;

use App\Models\Drone;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class DroneImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Drone([
            'jenis_pesawat'     => $row['jenis_pesawat'],
            'merk'    => $row['merk'],
            'tanda_pengenal'    => $row['tanda_pengenal'],
            'keterangan'    => $row['keterangan'],
        ]);
    }
}
