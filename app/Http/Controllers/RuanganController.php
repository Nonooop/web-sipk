<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Ruangan;

class RuanganController extends Controller
{
    public function index()
    {
        $dataRuang = ruangan::paginate();
        return view('ruangan',['viewRuang'=>$dataRuang]);
    }

    public function tambahRuang(Request $a){
        $a->validate([
            'kd_ruangan'=>'required|unique:ruangan,kd_ruangan',
            'nama_ruangan'=>'required|unique:ruangan,nama_ruangan'
        ]);

        $kode = DB::table('ruangan')->max('kd_ruangan');
    	$addNol = '';
    	$kode = str_replace("R", "", $kode);
    	$kode = (int) $kode + 1;
        $incrementKode = $kode;

    	if (strlen($kode) == 1) {
    		$addNol = "00";
    	} elseif (strlen($kode) == 2) {
    		$addNol = "0";
    	}
    	$kodeBaru = "R".$addNol.$incrementKode;

        DB::table('ruangan')->insert([
            'kd_ruangan' =>$kodeBaru,
            'nama_ruangan' =>$a->nama_ruangan,
            'kapasitas' =>$a->kapasitas,
            'keterangan'=>$a->keterangan
        ]);
        return redirect('/viewRuang')->with('toast_success', 'Data Berhasil Tersimpan!');
    }

    public function ubahRuang(Request $a, $x){
        DB::table('ruangan')->where("kd_ruangan", $x)->update([
            'kd_ruangan' =>$a->kd_ruangan,
            'nama_ruangan' =>$a->nama_ruangan,
            'kapasitas' =>$a->kapasitas,
            'keterangan'=>$a->keterangan
        ]);
        return redirect('/viewRuang')->with('toast_success', 'Data Berhasil Diperbarui!');
    }

    public function hapusRuang($kd_ruangan){
        DB::table('ruangan')->where('kd_ruangan',$kd_ruangan)->delete();
        return redirect('/viewRuang')->with('toast_info', 'Data Terhapus!');;
    }
}
