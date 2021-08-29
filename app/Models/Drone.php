<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Satker;

class Drone extends Model
{
    use HasFactory;
    protected $table = 'drones';

    protected $fillable = [
        'jenis_pesawat',
        'merk',
        'keterangan',
        'tanda_pengenal',
        'satkers_id'
    ];

    public function satker()
    {
        return $this->belongsTo(Satker::class);
    }

}
