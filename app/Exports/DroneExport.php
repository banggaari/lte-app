<?php

namespace App\Exports;

use App\Models\Drone;
use Maatwebsite\Excel\Concerns\FromCollection;

class DroneExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Drone::all();
    }
}
