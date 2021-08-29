<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Drone;

class Satker extends Model
{
    use HasFactory;
    public $table = "satkers";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description'
    ];
    public function drone(){
        return $this->hasMany(Drone::class);
    }
    public function pilot(){
        return $this->hasOne(Pilot::class);
    }

}
