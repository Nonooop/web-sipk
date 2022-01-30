<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    protected $table = "ruangan";
    protected $primaryKey = "kd_ruangan";
    protected $fillable = ["no","kd_ruangan", "nama_ruangan", "kapasitas", "keterangan"];
    public $timestamps = false;
    public $incrementing = false;

    public function jadwalRuang(){
        return $this->hasMany('App\Models\Jadwal');
    }
}
