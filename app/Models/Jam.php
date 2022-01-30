<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jam extends Model
{
    use HasFactory;
    protected $table = "jam";
    protected $primaryKey = "kd_jam";
    protected $fillable = ["kd_jam","jam"];
    public $timestamps = false;
    public $incrementing = false;

    public function jadwalJam(){
        return $this->hasMany('App\Models\Jadwal');
    }
}
