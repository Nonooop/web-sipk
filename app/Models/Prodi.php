<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $table = "prodi";
    protected $primaryKey = "kd_prodi";
    protected $fillable = ["kd_prodi","nama_prodi"];
    public $timestamps = false;
    public $incrementing = false;

    public function jadwalProdi(){
        return $this->hasMany('App\Models\Jadwal');
    }
}
