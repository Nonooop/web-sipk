<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;
    protected $table = "matakuliah";
    protected $primaryKey = "kd_matakuliah";
    protected $fillable = [" kd_matakuliah", "nama_matakuliah","sks","semester"];
    public $timestamps = false;
    public $incrementing = false;

    public function jadwalMk(){
        return $this->hasMany('App\Models\Jadwal');
    }
}
