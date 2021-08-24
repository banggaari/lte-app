<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Drone;

class SatuanKerja extends Model
{
    use HasFactory;
    protected $table = 'satuan_kerjas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description'
    ];
    public function drones(){
        return $this->hasMany(Drone::class);
    }
}
