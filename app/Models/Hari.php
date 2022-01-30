<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hari extends Model
{
    use HasFactory;
    protected $table = "hari";
    protected $primaryKey = "kd_hari";
    protected $fillable = ["kd_hari","nama_hari"];
    public $timestamps = false;
    public $incrementing = false;

    public function jadwalHari(){
        return $this->hasMany('App\Models\Jadwal');
    }
}
