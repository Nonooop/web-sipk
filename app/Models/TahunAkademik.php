<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    use HasFactory;
    protected $table = "tahun_akademik";
    protected $primaryKey = "kd_TA";
    protected $fillable = ["kd_TA", "tahun_akademik", "semester", "status"];
    public $timestamps = false;
    public $incrementing = false;
}
