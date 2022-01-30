<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table ="jadwal_kuliah";
    protected$primaryKey = "kd_jadwal";
    protected $fillable = ["kd_jadwal","kd_hari","kd_jam","kd_matakuliah","nidn","kd_ruangan","kd_prodi"];
    public $timestamps = false;
    public $incrementing = false;

    public function hari(){
        return $this->belongsTo('App\Models\Hari','kd_hari');
    }

    public function jam(){
        return $this->belongsTo('App\Models\Jam','kd_jam');
    }

    public function matakuliah(){
        return $this->belongsTo('App\Models\Matakuliah','kd_matakuliah');
    }

    public function dosen(){
        return $this->belongsTo('App\Models\Dosen','nidn');
    }

    public function ruangan(){
        return $this->belongsTo('App\Models\Ruangan','kd_ruangan');
    }

    public function prodi(){
        return $this->belongsTo('App\Models\Prodi','kd_prodi');
    }
}
