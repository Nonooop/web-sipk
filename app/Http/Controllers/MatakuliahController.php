<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Matakuliah;

class MatakuliahController extends Controller
{
    public function index()
    {
        $dataMk = matakuliah::paginate(1000);
        return view('matakuliah',['viewMk'=>$dataMk]);
    }

    public function tambahMk(Request $a){
        $a->validate([
            'kd_matakuliah'=>'required|unique:matakuliah,kd_matakuliah',
            'nama_matakuliah'=>'required|unique:matakuliah,nama_matakuliah'
        ]);
        DB::table('matakuliah')->insert([
            'kd_matakuliah' =>$a->kd_matakuliah,
            'nama_matakuliah' =>$a->nama_matakuliah,
            'sks'=>$a->sks,
            'semester'=>$a->semester
        ]);
        return redirect('/viewMk')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    public function ubahMk(Request $a, $x){
        DB::table('matakuliah')->where("kd_matakuliah", $x)->update([
            'kd_matakuliah' =>$a->kd_matakuliah,
            'nama_matakuliah' =>$a->nama_matakuliah,
            'sks'=>$a->sks,
            'semester'=>$a->semester
        ]);
        return redirect('/viewMk')->with('toast_success', 'Data Berhasil Diperbarui!');
    }

    public function hapusMk($kd_matakuliah){
        DB::table('matakuliah')->where('kd_matakuliah',$kd_matakuliah)->delete();
        return redirect('/viewMk')->with('toast_info', 'Data Terhapus!');;
    }
}
