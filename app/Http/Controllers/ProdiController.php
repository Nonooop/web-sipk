<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Prodi;

class ProdiController extends Controller
{
    public function index()
    {
        $dataProdi = prodi::paginate();
        return view('prodi',['viewProdi'=>$dataProdi]);
    }

    public function tambahProdi(Request $a){
    $a->validate([
        'nama_prodi'=>'required|unique:prodi,nama_prodi'
    ]);

    $kode = DB::table('prodi')->max('kd_prodi');
    $addNol = '';
    $kode = str_replace("PRD", "", $kode);
    $kode = (int) $kode + 1;
    $incrementKode = $kode;

    if (strlen($kode) == 1) {
    $addNol = "00";
    } elseif (strlen($kode) == 2) {
    $addNol = "0";
    }
    $kodeBaru = "PRD".$addNol.$incrementKode;
    DB::table('prodi')->insert([
        'kd_prodi' =>$kodeBaru,
        'nama_prodi' =>$a->nama_prodi,
        'keterangan' =>$a->keterangan
    ]);
    return redirect('/viewProdi')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    public function ubahProdi(Request $a, $x){
    DB::table('prodi')->where("kd_prodi", $x)->update([
    'kd_prodi' =>$a->kd_prodi,
    'nama_prodi' =>$a->nama_prodi,
    'keterangan' =>$a->keterangan
    ]);
    return redirect('/viewProdi')->with('toast_success', 'Data Berhasil Diperbarui!');
    }

    public function hapusProdi($kd_prodi){
    DB::table('prodi')->where('kd_prodi',$kd_prodi)->delete();
    return redirect('/viewProdi')->with('toast_info', 'Data Terhapus!');;
    }
}