<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SatKer;
use App\Models\User;


class Pilot extends Model
{
    use HasFactory;
    protected $table = 'pilots';

    protected $fillable = [
        'no_kontak',
        'no_license',
        'riwayat_training',
        'masa_berlaku',
        'user_id',
        'satker_id'
    ];
    public function satker()
    {
        return $this->belongsTo(SatKer::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
