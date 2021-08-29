<?php

namespace App\Exports;

use App\Models\Satker;
use Maatwebsite\Excel\Concerns\FromCollection;

class SatuanKerjaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Satker::all();
    }
}
