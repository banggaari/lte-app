<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SatuanKerja;

class Drone extends Model
{
    use HasFactory;
    protected $table = 'drones';

    protected $fillable = [
        'jenis_pesawat',
        'merk',
        'keterangan',
        'tanda_pengenal',
    ];

    public function satuan_kerjas()
    {
        return $this->belongTo(SatuanKerja::class);
    }

}
