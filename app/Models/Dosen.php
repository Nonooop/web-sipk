<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = "dosen";
    protected $primaryKey = "nidn";
    protected $fillable = ["nidn", "nama_dosen","alamat_dosen","noHp_dosen", "email_dosen", "foto_dosen"];
    public $timestamps = false;
    public $incrementing = false;

    public function jadwalDosen(){
        return $this->hasMany('App\Models\Jadwal');
    }
}
